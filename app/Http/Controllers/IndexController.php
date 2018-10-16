<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutTranslate;
use App\Models\Category;
use App\Models\CategoryPlace;
use App\Models\Language;
use App\Models\Menu;
use App\Models\Place;
use App\Models\Slider;
use App\Models\State;
use App\Models\UserTranslate;
use App\User;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{

    public function index($__category = null, $__state = null)
    {

        $languageActiv = Language::where('status', 1)->get();
        $languageID = $languageActiv[0]->id;
        $lang = Language::all();

        $menu = Menu::with(['menu_parents' => function ($date) use ($languageID) {
            $date->where('translate_id', $languageID);
        }])->get();

        $slider = Slider::with(['slider_translates' => function ($date) use ($languageID) {
            $date->where('lenguage_id', $languageID);
        }])->with('images')->get();

        $states = State::with(['state_translates' => function ($d) use ($languageID) {
            $d->where('language_id', $languageID);
        }])->get();
        $category = Category::with(['category_translates' => function ($lang) use ($languageID) {
            $lang->where('translate_id', $languageID);
        }])->get();
        $about = AboutTranslate::where('language_id', $languageID)->where('type', "about")->with(['about' => function ($img) {
            $img->with('images');
        }])->first();
        $guide = AboutTranslate::where('language_id', $languageID)->where('type', "guide")->first();
        $categoryPlace = CategoryPlace::with(['category' => function ($categoryPlaces) use ($languageID) {
            $categoryPlaces->with(['category_translates' => function ($categoryTrans) use ($languageID) {
                $categoryTrans->where('translate_id', $languageID);
            }]);
        }])->with(['place' => function ($placeCat) use ($languageID) {
            $placeCat->with(['images' =>function($imageMain){
                $imageMain->where('type',0);
            }]);
            $placeCat->with(['place_translates' => function ($actLanguage) use ($languageID) {
                $actLanguage->where('language_id', $languageID);
            }]);
        }])->get();
        $usersGuid = User::with('images')->with(['user_translates' =>  function ($translate)  use ($languageID){
            $translate->where('language_id', $languageID);
        }])->whereHas('role', function($role){
                $role->where('name','guide');})->get();

        $categoryArray = [];
        foreach ($categoryPlace as $datePlace) {
            $categoryArray[$datePlace->category->category_translates[0]->name][] = $datePlace->place;
        }

        $placeALl = Place::with(['place_translates' => function ($placeLang) use($languageID){
            $placeLang->where('language_id', $languageID);
        }])->with(['images' =>function($placeMain){
            $placeMain->where('type', 0 );
        }])->paginate(30);

        if (session()->exists('hhh')){
            session()->remove('hhh');
        }

        if($__category || $__state) {
            if ($__category === "All" ){

                $placeALl = Place::whereHas('state',   function($stateSelect) use($__state){
                    $stateSelect->where('state_id',  $__state);
                })->with(['place_translates' => function ($placeLang) use($languageID){
                $placeLang->where('language_id', $languageID);
            }])->with(['images' =>function($placeMain){
                $placeMain->where('type', 0 );
            }])->paginate(30);
                return response()->json(['html' => View::make('/placeSlider', ['placeALl' =>$placeALl])->render()], 200);

            }elseif($__state === "All" ){
                $placeALl = CategoryPlace::where('category_id', $__category)->with(['place'=> function($placeDateCat) use($languageID){
                    $placeDateCat->with(['images' =>function($placeCateMain){
                        $placeCateMain->where('type', 0 );
                    }]);
                    $placeDateCat->with(['place_translates'=>function($placeCatLang) use($languageID){
                        $placeCatLang->where('language_id',$languageID);
                    }]);
                }])->get();
                return response()->json(['html' => View::make('/placeSlider', ['placeALl' =>$placeALl])->render()], 200);

            }elseif($__state !== "All" && $__category !== "All"){
                $placeALl =  CategoryPlace::where('category_id', $__category)->whereHas('place',  function($placeDateCat) use($languageID, $__state ){
                    $placeDateCat->where('state_id',$__state);
                    $placeDateCat->whereHas('images' ,function($placeCateMain){
                        $placeCateMain->where('type', 0 );
                    });
                    $placeDateCat->with(['place_translates'=>function($placeCatLang) use($languageID){
                        $placeCatLang->where('language_id',$languageID);
                    }]);
                })->get();
                return response()->json(['html' => View::make('/placeSlider', ['placeALl' =>$placeALl])->render()], 200);
            }

            session()->put('hhh', ['category'=>$__category, 'state'=>$__state]);
        }


        return view('test', ['lang' => $lang, 'menu' => $menu, 'slider' => $slider,
            'states' => $states, 'category' => $category,
            'about' => $about, 'guide'=>$guide,'categoryArray' => $categoryArray, 'usersGuid' => $usersGuid, 'placeALl' =>$placeALl, ]);
    }

}

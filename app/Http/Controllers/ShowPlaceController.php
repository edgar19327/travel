<?php

namespace App\Http\Controllers;

use App\Models\AboutTranslate;
use App\Models\Language;
use App\Models\Menu;
use App\Models\Place;
use Illuminate\Http\Request;

class ShowPlaceController extends Controller
{
    public function index($id)
    {
        $languageActiv = Language::where('status', 1)->get();
        $languageID = $languageActiv[0]->id;
        $lang = Language::all();


        $place = Place::where('id',$id)->with(['place_translates' => function($placeDate) use($languageID){
            $placeDate->where('language_id', $languageID);
        }])->with('images')->with(['categories' => function($categoryDate) use($languageID){
            $categoryDate->with(['category_translates' => function($categoryDateLang) use($languageID){
                $categoryDateLang->where('translate_id', $languageID);
            }]);
        }])->get();
        $menu = Menu::with(['menu_parents' => function ($date) use ($languageID) {
            $date->where('translate_id', $languageID);
        }])->get();
        $about = AboutTranslate::where('language_id', $languageID)->where('type', "about")->with(['about' => function ($img) {
            $img->with('images');
        }])->first();
        return view('place', ['place'=>$place, 'about'=>$about, 'menu'=>$menu, 'lang'=>$lang ]);
    }
}

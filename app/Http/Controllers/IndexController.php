<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\State;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
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
        return view('test', ['lang' => $lang, 'menu' => $menu, 'slider' => $slider, 'states' => $states, 'category' =>$category]);
    }
//    public function men()
//    {
//        $lop=['home','about','content','soledat'];
//        return view('layouts.app', ['lop'=> $lop] );
//    }

}

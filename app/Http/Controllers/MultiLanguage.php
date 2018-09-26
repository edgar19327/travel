<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class MultiLanguage extends Controller
{

    public  function  language(Request $request){

        Language::where('status', "1")->update(['status'=>0]);
        Language::where('id', $request->languageSelect)->update(['status'=>1]);




            return redirect()->back();


    }
}

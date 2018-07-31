<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();

        return view('/admin/languageCrud/language', ['languages' => $languages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/languageCrud/createModal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'codeLang' => 'required',
            'translationLang' => 'required',
        ]);
        if ($validator->fails()) {
            return 333;

        } else {
            $language = new  Language();
            $language->code = "$request->codeLang";
            $language->translation = "$request->translationLang";
            $language->save();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showLang = Language::where('id', $id)->get();
        return view('/admin/languageCrud/viewLang', ['showLang' => $showLang]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editLang = Language::where('id', $id)->get();
        return view('/admin/languageCrud/editLang', ['editLang' => $editLang]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $val = Validator::make($request->all(), [
            'lang_code' => 'required|min:1|max:5',
            'lang_translation' => 'required'
        ]);

        if ($val->fails()) {
            return redirect()->back();
        } else {

            $updateLang = Language::where('id', $id)->get();
            $updateLang = $updateLang->first();
            $updateLang->code = $request->lang_code;
            $updateLang->translation = $request->lang_translation;

            $updateLang->save();
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Language::destroy($id);
        return redirect()->back();

    }
}

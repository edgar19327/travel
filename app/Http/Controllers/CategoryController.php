<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryPlace;
use App\Models\CategoryTranslate;
use App\Models\Language;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::with(['category_translates' => function ($date) {
            $date->where('translate_id', 1);
        }])->get();
        return view('/admin/categoryCrud/category', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = Language::all();
        return view('/admin/categoryCrud/createCategory', ['language' => $language]);

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
            'title.*' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect('/admin/categoryCrud')
                ->withInput()
                ->withErrors($validator);
        } else {

            $category = new Category();
            if ($category->save()) {
                $titles = $request->title;
                foreach ($titles as $key => $value) {
                    $categoryTrans = new CategoryTranslate();
                    $categoryTrans->name = $value;
                    $categoryTrans->translate_id = $key;
                    $categoryTrans->category_id = $category->id;
                    $categoryTrans->save();
                }
                return redirect()->back();

            }
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

        $view = Category::where('id', $id)->with(['category_translates' => function ($data) {
            $data->with('language');
        }])->get();
        return view('admin/categoryCrud/viewCategory', ['view' => $view]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $editDate = Category::where('id', $id)->with(['category_translates' => function ($data) {
            $data->with('language');
        }])->get();
        return view('admin/categoryCrud/editCategory', ['editDate' => $editDate]);
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
        $validator = Validator::make($request->all(), [
            'title.*' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect('/admin/categoryCrud')
                ->withInput()
                ->withErrors($validator);
        } else {
            $title = $request->title;
            foreach ($title as $key => $value) {
                $editCategory = CategoryTranslate::where('category_id', $id)->where('translate_id', $key)->first();
                $editCategory->name = $value;
                $editCategory->save();
            }
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
$place = CategoryPlace::where('category_id',$id)->get();
//return $place;
if(sizeof($place) >= 1){
    return Redirect::back()->withErrors(['No Permission']);
}else{
    $category= Category::destroy($id);
    return redirect()->back();}

    }
}

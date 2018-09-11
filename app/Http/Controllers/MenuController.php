<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Menu;
use App\Models\MenuParent;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::with(['menu_parents' => function ($parent) {
            $parent->where('translate_id', 1);
            $parent->with(['menu' => function ($date) {
                $date->with(['menu_parents' => function ($lang) {
                    $lang->where('translate_id', 1);
                }]);

            }]);
        }])->get();
//        dd();
//        return $menu;
        return view('/admin/menuCrud/menu', ['menu' => $menu]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = Language::all();
        $menu = Menu::with(['menu_parents' => function ($menuLeng) {
            $menuLeng->where('translate_id', 1);
        }])->get();
        return view('/admin/menuCrud/menuCreate', ['language' => $language, 'menu' => $menu]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $massage = [
            'menuNameTrans.*.required' => 'The Name translation field is required.',
            'url.required' => 'The Url field is required.',

        ];

        $validator = Validator::make($request->all(), [
            'menuNameTrans.*' => 'required',
            'url' => 'required',
        ], $massage);
        if ($validator->fails()) {
            return redirect('/admin/menuCrud')
                ->withInput()
                ->withErrors($validator);
        } else {
            $parentId = $request->menuOption;
            $menuNameTrans = $request->menuNameTrans;
            $menu = new  Menu();
            $menu->status = '1';
            if ($menu->save()) {

                foreach ($menuNameTrans as $key => $value) {
                    $menuParent = new MenuParent();

                    $menuParent->name = $value;
                    $menuParent->translate_id = $key;
                    $menuParent->menu_id = $menu->id;
                    $menuParent->url = $request->url;
                    if (!empty($parentId)) {
                        $menuParent->parent_id = $parentId;
                    }
                    $menuParent->save();

                }
            }


//            if ($menuSelect) {
//                $menuParent = new MenuParent();
//                $menuParent->parent_id = $menuSelect;
//                $menuParent->menu_id = $menu->id;
//                $menuParent->save();
//            }
            return redirect()->back();

        }
//        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menuview = Menu::with(['menu_parents' => function ($parent) {
            $parent->with('language');
            $parent->with(['menu' => function ($date) {
                $date->with(['menu_parents' => function ($lang) {
                    $lang->where('translate_id', 1);
                }]);

            }]);
        }])->where('id', $id)->get();
        return view('/admin/menuCrud/viewMenuModal', ['menuview' => $menuview]);
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::where('id', '!=', $id)->with(['menu_parents' => function ($menu) use ($id){
            $menu->where('translate_id', 1);

        }])->get();
        $menuEdit = Menu::with(['menu_parents' => function ($parent) {
            $parent->with('language');
            $parent->with(['menu' => function ($date) {
                $date->with(['menu_parents' => function ($lang) {
                    $lang->where('translate_id', 1);
                }]);

            }]);
        }])->where('id', $id)->get();
        return view('/admin/menuCrud/editMenu', ['menu' => $menu, 'menuEdit' => $menuEdit]);
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
        $massage = [
            'menu_name.*.required' => 'The Name translation field is required.',
            'url.required' => 'The Url field is required.',

        ];

        $validator = Validator::make($request->all(), [
            'menu_name.*' => 'required',
            'url' => 'required',
        ], $massage);
        if ($validator->fails()) {
            return redirect('/admin/menuCrud')
                ->withInput()
                ->withErrors($validator);
        } else {
            $menu_name = $request->menu_name;
            foreach ($menu_name as $key => $value) {
                $menuParent = MenuParent::where('menu_id', $id)->where('translate_id', $key)->first();
                $menuParent->name = $value;
                $menuParent->url = $request->url;
                $menuParent->parent_id = $request->menuOption;
                $menuParent->save();
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
        $menuParent  = MenuParent::where('parent_id', $id)->get();
        if (sizeof($menuParent) > 0 ){
            return Redirect::back()->withErrors(['No Permission']);
        }
        Menu::destroy($id);
        return redirect()->back();
    }
}

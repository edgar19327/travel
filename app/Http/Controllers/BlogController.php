<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogTranslate;
use App\Models\Language;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with(['blog_translates' => function ($lang) {
            $lang->where('lenguage_id', 1);
            $lang->with(['place' => function ($date) {
                $date->with(['place_translates' => function ($place) {
                    $place->where('language_id', 1);
                }]);
            }]);
        }])->paginate(5);
        return view('/admin/blogCrud/blog', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Language::all();
        $places = Place::with(['place_translates' => function ($en) {
            $en->where('language_id', 1);
        }])->get();
        return view('/admin/blogCrud/createBlogModal', ['lang' => $lang, 'places' => $places]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'title.*' => 'required',
            'description.*' => 'required',

        ]);
        if ($validator->fails()){
            return redirect('/admin/blogCrud')
                ->withInput()
                ->withErrors($validator);
        }else {
            $title = $request->get('title');
            $descriptions = $request->get('description_user');

            $blog = new  Blog();
            if ($blog->save()) {

                foreach ($title as $key => $value) {
                    $blogTranslate = new BlogTranslate();
//
                    $blogTranslate->title = $value;
                    $blogTranslate->description = $descriptions[$key];;
                    $blogTranslate->lenguage_id = $key;
                    $blogTranslate->blog_id = $blog->id;
                    $blogTranslate->place_id = $request->placeOption;
                    $blogTranslate->save();
                }
            }
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::where('id', $id)->with(['blog_translates' => function ($lang) {
            $lang->with('language');
            $lang->with(['place' => function ($placeTrans) {
                $placeTrans->with(['place_translates' => function ($code) {
                    $code->where('language_id', 1);
                }]);
            }]);

        }])->get();
        return view('/admin/blogCrud/blogViewModal', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

            $place = Place::with('place_translates')->get();
            $blogId = Blog::where('id', $id)->with(['blog_translates' => function ($lang) {
                $lang->with('language');
                $lang->with(['place' => function ($placeTrans) {
                    $placeTrans->with(['place_translates' => function ($code) {
                        $code->where('language_id', 1);
                    }]);
                }]);

            }])->get();

        return view('/admin/blogCrud/editBlog', ['blogId' => $blogId, 'place' =>$place]);
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
        $titles = $request->get('title');
        $descriptions = $request->get('description');
        $validator  = Validator::make($request->all(), [
            'title.*' => 'required',
            'description.*' => 'required',
        ]);
        if ($validator->fails()){
            return redirect('/admin/blogCrud')
                ->withInput()
                ->withErrors($validator);
        }else {


            foreach ($titles as $key => $value) {
                $blogTranslate = BlogTranslate::where('blog_id', $id)->where('lenguage_id', $key)->first();
                $blogTranslate->title = $value;
                $blogTranslate->description = $descriptions[$key];
                $blogTranslate->place_id = $request->placeOption;
                $blogTranslate->save();
            }

        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);

        return redirect()->back();
    }
}

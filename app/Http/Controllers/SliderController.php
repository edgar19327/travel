<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Language;
use App\Models\Slider;
use App\Models\SliderTranslate;
use Illuminate\Http\Request;
use App\AddonLib;
use Illuminate\Support\Facades\Validator;


class SliderController extends Controller
{
    public $addon;

    public function __construct(Request $request)
    {

        $this->addon = new AddonLib();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::with('images')->with('slider_translates')->get();
        return view('/admin/sliderCrud/slider', ['slider' => $slider]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = Language::all();
        return view('/admin/sliderCrud/createSliderModal', ['language' => $language]);

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
            'title.*.required'=>'The Title translation field is required.',
            'description.*.required'=>'The Description translation Link field is required.',
            'image4.required'=>'The Image Link field is required.',
        ];

        $validator = Validator::make($request->all(), [
            'title.*' => 'required',
            'description.*' => 'required',
            'image4' => 'required|mimes:jpeg,png,jpg'
        ],$massage);
        if ($validator->fails()) {
            return redirect('/admin/sliderCrud')
                ->withInput()
                ->withErrors($validator);
        }
        $slider = new Slider();
        $slider->status = "1";

        if ($slider->save()) {
            $slider_id = $slider->id;
            $titles = $request->get('title');
            $descriptions = $request->get('description');
            foreach ($titles as $key => $value) {
                if ($value) {
                    $placeTranslation = new SliderTranslate();
                    $placeTranslation->title = $value;
                    $placeTranslation->slider_id = $slider_id;
                    $placeTranslation->lenguage_id = $key;
                    $placeTranslation->description = $descriptions[$key];
                    $placeTranslation->save();
                }

            }
        }
        if ($request->hasFile('image4')) {
            $imageSave = $this->addon->file_upload($request->file('image4'), '2', $slider_id);
            if (isset($imageSave['message'])) {
                return response()->json($imageSave, 400);
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
        $sliderView = Slider::with(['slider_translates' => function ($lang) {
            $lang->with('language');
        }])->where('id', $id)->with('images')->get();
        return view('/admin/sliderCrud/viewSliderModal', ['sliderView' => $sliderView]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imgPath = Image::select('path')->where('slider_id', $id)->get();
        @unlink($imgPath[0]->path);
        Slider::destroy($id);
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Language;
use App\Models\Place;
use App\Models\PlaceTranslate;
use App\Models\SliderTranslate;
use App\Models\StateTranslate;
use Illuminate\Http\Request;
use App\AddonLib;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;

class PlaceController extends Controller
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
$test = PlaceTranslate::with(['place'=>function($test){
    $test->with('images');
}])->where('language_id', 3)->get();
        return view('/admin/placeCrud/place');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = Language::all();
        $states = StateTranslate::where('language_id', 1)->get();
        return view('/admin/placeCrud/placeCreateModal', ['language' => $language, 'states' => $states]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'title.*' => 'required',
            'description.*' => 'required',
            'map_link' => 'required|unique'
        ]);

        if ($valid->fails()) {
            return redirect()->back()->withErrors('error', 'Empty Field');
        } else {
            $titles = $request->get('title');
            $descriptions = $request->get('description');
            $Place = new Place();
            $Place->state_id = \request()->stateOption;
            $Place->location = \request()->map_link;
            if ($Place->save()) {
                $id = $Place->id;
                foreach ($titles as $key => $value) {
                    if ($value) {
                        $placeTranslation = new PlaceTranslate();
                        $placeTranslation->title = $value;
                        $placeTranslation->place_id = $id;
                        $placeTranslation->language_id = $key;
                        $placeTranslation->description = $descriptions[$key];
                        $placeTranslation->save();
                    }

                }
            }

            if ($request->hasFile('image_mane')) {
                $imageSave = $this->addon->file_upload($request->file('image_mane'), '0', $id);
                if (isset($imageSave['message'])) {
                    return response()->json($imageSave, 400);
                }
            }
            if ($request->hasFile('image1')) {
                $imageSave = $this->addon->file_upload($request->file('image1'), '1', $id);
                if (isset($imageSave['message'])) {
                    return response()->json($imageSave, 400);
                }
            }
            if ($request->hasFile('image2')) {
                $imageSave = $this->addon->file_upload($request->file('image2'), '1', $id);
                if (isset($imageSave['message'])) {
                    return response()->json($imageSave, 400);
                }
            }
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
        //
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
        //
    }
}

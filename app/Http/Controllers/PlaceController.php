<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryPlace;
use App\Models\Image;
use App\Models\Language;
use App\Models\Place;
use App\Models\PlaceTranslate;
use App\Models\RatingPlace;
use App\Models\SliderTranslate;
use App\Models\State;
use App\Models\StateTranslate;
use http\Env\Response;
use Illuminate\Queue\Failed;
use Illuminate\Http\Request;
use App\AddonLib;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;
use Illuminate\Support\Facades\DB;

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
        $placeAll = PlaceTranslate::with('place')->where('language_id', 1)->paginate(10);
        return view('/admin/placeCrud/place', ['placeAll' => $placeAll]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = Language::all();
        $category = Category::with(['category_translates' => function ($date) {
            $date->where('translate_id', 1);
        }])->get();
        $states = StateTranslate::where('language_id', 1)->get();
        return view('/admin/placeCrud/placeCreateModal', ['language' => $language, 'states' => $states, 'category' => $category]);

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
            'title.*.required' => 'The Title translation field is required.',
            'description.*.required' => 'The Description translation Link field is required.',
            'map_link.required' => 'The Map Link field is required.',
            'image_mane.required' => 'The main Image field is required.',
            'image1.required' => 'The Image Secondary field is required.',
            'image2.required' => 'The Image Secondary field is required.',

        ];
        $valid = Validator::make($request->all(), [
            'title.*' => 'required',
            'description.*' => 'required',
            'map_link' => 'required',
            'image_mane' => 'required',
            'image1' => 'required',
            'image2' => 'required'
        ], $massage);

        if ($valid->fails()) {
            return redirect('/admin/placeCrud')
                ->withInput()
                ->withErrors($valid);
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
                $category_place = new CategoryPlace;
                $category_place->category_id = $request->catOption;
                $category_place->place_id = $id;
                $category_place->save();
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

        $place = Place::with([
            'place_translates' => function ($leng) {
                $leng->with('language');
            },
            'images',
            'state' => function ($t) {
                $t->with(['state_translates' => function ($state) {
                    $state->where('language_id', 1);
                }]);
            },
            'rating_places' => function ($query) {
                $query->select('place_id', DB::raw('SUM(rating) as total_sales'))->groupBy('place_id');
            }
        ])->where('id', $id)->get();
        $categoryPLace = CategoryPlace::with(['category' => function($data){
            $data->with(['category_translates' => function($cat){
                $cat->where('translate_id',1);
            }]);
        }])->get();
        $test = RatingPlace::where('place_id', $id)->avg('rating');
        return view('/admin/placeCrud/placeViewsModal', ['place' => $place, 'ret' => $test, 'categoryPLace' => $categoryPLace]);
        return \response()->json(['place' => $place, 'ret' => $test], 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::with(['category_translates' => function ($date) {
            $date->where('translate_id', 1);
        }])->get();

        $stats = State::with(['state_translates' => function ($stateTrans) {
            $stateTrans->where('language_id', 1);
        }])->get();

        $place = Place::with([
            'place_translates' => function ($leng) {
                $leng->with('language');
            },
            'images',


        ])->where('id', $id)->get();
        return view('/admin/placeCrud/placeEdit', ['place' => $place, 'stats' => $stats, 'category' => $category]);

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
            'title.*.required' => 'The Title translation field is required.',
            'description.*.required' => 'The Description translation Link field is required.',
            'map_link.required' => 'The Map Link field is required.',
//            'image_mane.required' => 'The main Image field is required.',
//            'image1.required' => 'The Secondary  Image  field is required.',
//            'image2.required' => 'The Secondary  Image  field is required.',


        ];
        $validate = Validator::make($request->all(), [
            'title.*' => 'required',
            'description.*' => 'required',
            'map_link' => 'required',
//            'image_mane' => 'required',
//            'image1' => 'required',
//            'image2' => 'required',
        ], $massage);
        if ($validate->fails()) {
            return redirect('/admin/placeCrud')
                ->withInput()
                ->withErrors($validate);
        } else {
            $titles = $request->get('title');
            $descriptions = $request->get('description');
            $mapLink = $request->get('map_link');
            $state_id = $request->get('stateOption');
            $place = Place::where('id', $id)->first();
            $place->location = "$mapLink";
            $place->state_id = "$state_id";

            $place->save();

            foreach ($titles as $key => $value) {
                $placeTranslate = PlaceTranslate::where('place_id', $id)->where('language_id', $key)->first();
                $placeTranslate->title = $value;
                $placeTranslate->description = $descriptions[$key];

                $placeTranslate->save();
            }
            $editCategoryPlace = CategoryPlace::where('place_id', $id)->first();
            $editCategoryPlace->category_id = $request->catOption;
            $editCategoryPlace->save();

            if ($request->hasFile('image_0')) {
                foreach ($request->file('image_0') as $img_id => $file) {
                    $imageSave = $this->addon->fileUploader($file, 'main', true, $img_id);
                    if (isset($imageSave['message'])) {
                        return response()->json($imageSave, 400);
                    }
                }
            }

            if ($request->hasFile('image_1')) {
                foreach ($request->file('image_1') as $img_id => $file) {
                    $imageSave = $this->addon->fileUploader($file, 'image', true, $img_id);
                    if (isset($imageSave['message'])) {
                        return response()->json($imageSave, 400);
                    }
                }
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
        $imgPath = Image::select('path')->where('place_id', $id)->get();

        foreach ($imgPath as $key => $value) {
            @unlink($value->path);

        }
//
        Place::destroy($id);
        return redirect()->back();
    }
}

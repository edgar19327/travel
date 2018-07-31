<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Place;
use App\Models\PlaceTranslate;
use App\Models\SliderTranslate;
use App\Models\StateTranslate;
use Illuminate\Http\Request;
use App\AddonLib;
use Illuminate\Contracts\Validation\Validator;
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
        return view('/admin/placeCrud/placeCreateModal', ['language' => $language, 'states' =>$states]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'translation.*' => 'required',
        ]);
        if ($valid->fails()) {
            return redirect()->back()->withErrors('error', 'Empty Field');
        } else {

            $query = new Place();
            $query->status = '1';
            if ($query->save()) {
                $state_id = $query->id;
                $date = $request->translation;

                foreach ($date as $key => $value) {
                    $transStateCreate = new  PlaceTranslate();

                    $transStateCreate->name = "$value";
                    $transStateCreate->language_id = "$key";
                    $transStateCreate->place_id = "$state_id";
                    $transStateCreate->save();

                }

            }
        }
        if ($request->has('image_mane')) {
            $imageSave = $this->addon->fileUploader($request->file('image'), 'main', true, $query->image_id);
            if (isset($imageSave['message'])) {
                return response()->json($imageSave, 400);
            }
            $query->image_id = $imageSave;
        }
        if ($request->has('image1')) {
            $imageSave = $this->addon->fileUploader($request->file('image'), 'profile', true, $query->image_id);
            if (isset($imageSave['message'])) {
                return response()->json($imageSave, 400);
            }
            $query->image_id = $imageSave;
        }
        if ($request->has('image2')) {
            $imageSave = $this->addon->fileUploader($request->file('image'), 'profile', true, $query->image_id);
            if (isset($imageSave['message'])) {
                return response()->json($imageSave, 400);
            }
            $query->image_id = $imageSave;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

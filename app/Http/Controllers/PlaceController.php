<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Place;
use App\Models\PlaceTranslate;
use App\Models\SliderTranslate;
use App\Models\StateTranslate;
use Illuminate\Http\Request;
use App\AddonLib;
use Illuminate\Support\Facades\Validator;

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
       // return $request->all();
$titles = $request->get('title');
$descriptions = $request->get('description');
$Place = new Place();
$Place->state_id=\request()->stateOption;
$Place->location=\request()->map_link;
if ($Place->save()){
    $id = $Place->id;
    foreach ($titles as $key=>$value){
        if($value){
           $placeTranslation = new PlaceTranslate();
            $placeTranslation->title = $value;
            $placeTranslation->place_id = $id;
            $placeTranslation->language_id = $key;
            $placeTranslation->description = $descriptions[$key];
            $placeTranslation->save();
        }

    }
}
//$request
//        $valid = Validator::make($request->all(), [
//        ]);
//        if ($valid->fails()) {
//            return redirect()->back()->withErrors('error', 'Empty Field');
//        } else {
//        $stateOption = $request->stateOption;
//        $state = StateTranslate::where('name', $stateOption)->get(['state_id']);
//        $state_id = $state[0]->state_id;
//        $query = new Place();
//        $query->location = $request->map_link;
//        $query->state_id = $state_id;
//        if ($query->save()) {
//            $place_id = $query->id;
//            $title = $request->title;
//            $descriptions = $request->description;

//            foreach ($request->get('transletion') as $key => $value) {
//                foreach ($value as $ke => $ite) {
//                        $transStateCreate = new  PlaceTranslate();
//                        $transStateCreate->title =$ite['title'];
//                        $transStateCreate->description = $ite['description'];
//                        $transStateCreate->language_id = $ke;
//                        $transStateCreate->place_id = "$place_id";
//                        $transStateCreate->save();
//                }
//            }

//        }
//        }
//        if ($request->has('image_mane')) {
//            $imageSave = $this->addon->fileUploader($request->file('image'), 'main', true, $query->image_id);
//            if (isset($imageSave['message'])) {
//                return response()->json($imageSave, 400);
//            }
//            $query->image_id = $imageSave;
//        }
//        if ($request->has('image1')) {
//            $imageSave = $this->addon->fileUploader($request->file('image'), 'profile', true, $query->image_id);
//            if (isset($imageSave['message'])) {
//                return response()->json($imageSave, 400);
//            }
//            $query->image_id = $imageSave;
//        }
//        if ($request->has('image2')) {
//            $imageSave = $this->addon->fileUploader($request->file('image'), 'profile', true, $query->image_id);
//            if (isset($imageSave['message'])) {
//                return response()->json($imageSave, 400);
//            }
//            $query->image_id = $imageSave;
//        }
//        }

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

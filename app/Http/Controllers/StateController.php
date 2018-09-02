<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Place;
use App\Models\State;
use App\Models\StateTranslate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $lang = 'en';

    public function index()
    {

        $leng_id = 1;

        $state_id = StateTranslate::with('state')->where('language_id', $leng_id)->paginate(5);

        return view('/admin/stateCrud/state', ['name' => $state_id]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leng = Language::all();
        return view('admin/stateCrud/createModal', ['leng' => $leng]);
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

            'translation.*.required' => 'The Title translate field is required.',

        ];

        $valid = Validator::make($request->all(), [
            'translation.*' => 'required',
        ],$massage);
        if ($valid->fails()) {

            return redirect('/admin/state')
                ->withInput()
                ->withErrors($valid);
//
            } else {

            $query = new State();
            $query->status = '1';
            if ($query->save()) {
                $state_id = $query->id;
                $date = $request->translation;

                foreach ($date as $key => $value) {
                    $transStateCreate = new  StateTranslate();

                    $transStateCreate->name = $value;
                    $transStateCreate->language_id = $key;
                    $transStateCreate->state_id = $state_id;
                    $transStateCreate->save();

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

        $stateShow = StateTranslate::where('state_id', $id)->with('language')->get();
        return view('/admin/stateCrud/view', ['stateShow' => $stateShow]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stateShow = StateTranslate::where('state_id', $id)->with('language')->get();
        return view('/admin/stateCrud/edit', ['stateShow' => $stateShow]);

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
            'translation.*.required' => 'The Title translate field is required.',

        ];
        $validate = Validator::make($request->all(), [
            'id' => 'required',
            'translation.*' => 'required',
        ], $massage);
        if ($validate->fails()) {
            return redirect('/admin/state')
                ->withInput()
                ->withErrors($validate);
        } else {
            $translations = $request->translation;
            foreach ($translations as $kay => $value) {
                $stateUpdate = StateTranslate::where("state_id", $id)->where('language_id', $kay);
                $stateUpdate = $stateUpdate->first();


                $stateUpdate->name = "$value";
                $stateUpdate->save();

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
        $place = Place::where('state_id', $id)->first();
        if (!empty($place)) {

            return "error";

        } else {
            $stateTranslate = StateTranslate::where('state_id', $id);
            if ($stateTranslate->delete()) {
                State::destroy($id);
                return redirect()->back();

            }
        }
    }
}

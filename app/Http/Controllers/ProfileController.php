<?php

namespace App\Http\Controllers;

use App\AddonLib;
use App\Models\Language;
use App\Models\Menu;
use App\Models\UserTranslate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    public $addon;

    public function __construct(Request $request)
    {

        $this->addon = new AddonLib();
    }

    public function views($id)
    {

        $languageActiv = Language::where('status', 1)->get();
        $languageID = $languageActiv[0]->id;
        $lang = Language::all();

        $menu = Menu::with(['menu_parents' => function ($date) use ($languageID) {
            $date->where('translate_id', $languageID);
        }])->get();

        $profile = User::where('id', $id)->with('images')->with(['user_translates' => function ($userTranslate) {
            $userTranslate->with('language');
        }])->get();
        return view('/profile', ['profile' => $profile, 'lang' => $lang, 'menu' => $menu]);
    }

    public function guideView($id)
    {
        $languageActiv = Language::where('status', 1)->get();
        $languageID = $languageActiv[0]->id;
        $lang = Language::all();

        $menu = Menu::with(['menu_parents' => function ($date) use ($languageID) {
            $date->where('translate_id', $languageID);
        }])->get();
        $guide = User::where('id', $id)->with('images')->with(['user_translates' => function ($userTranslate)use($languageID) {
            $userTranslate->where('language_id',$languageID);
        }])->get();
//        return $id;


        return view('/guide', [ 'guide'=>$guide,'menu' => $menu, 'lang'=>$lang] );
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'first_name.required' => 'The name field is required.',
            'last_name.required' => 'The surname field is required.',
            'phone.required' => 'The phone field is required.',
            'email.required' => 'The email field is required.',
        ];
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'regex:(\(?\+[0-9]{1,3}\)? ?-?[0-9]{1,3} ?-?[0-9]{3,5} ?-?[0-9]{4}( ?-?[0-9]{3})?)',
            'email' => 'required|email',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $user = User::where('id', $id)->first();

            $user->name = $request->get('first_name');
            $user->surname = $request->get('last_name');
            $user->numbere = $request->get('phone');
            $user->email = $request->get('email');


            if ($user->save()) {
                if ($request->get('desc')) {
                    $descriptions = $request->get('desc');

                    foreach ($descriptions as $key => $value) {
                        $userTranslate = UserTranslate::findOrFail($key);
                        $userTranslate->description = $value;

                        $userTranslate->save();

                    }
                }
                if ($request->hasFile('image4')) {
                    foreach ($request->file('image4') as $img_id => $file) {
                        $imageSave = $this->addon->fileUploader($file, 'image', true, $img_id);
                        if (isset($imageSave['message'])) {
                            return response()->json($imageSave, 400);
                        }
                    }


                }
                return redirect()->back();
            }
        }
    }
}

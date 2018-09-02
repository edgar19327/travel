<?php

namespace App\Http\Controllers;

use App\AddonLib;
use App\Models\Language;
use App\Models\Role;
use App\Models\UserTranslate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
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
        $users = User::with('user_translates')->with('role')->with('images')->paginate(5);
        return view('/admin/userControl/users', ['users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $lang = Language::all();
        $role = Role::all();
        return view('/admin/userControl/createUser', ['lang' => $lang, 'role' => $role]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name_user.required' => 'The name field is required.',
            'surname_user.required'=>'The surname field is required.',
            'phone_user.required' => 'The phone field is required.',
            'gmail_user.required' => 'The email field is required.',
            'description_user.*.required' => 'The description field is required.',
            'image4.required' => 'The image field is required.',
            'pass_user.required' => 'The Password field is required.',
        ];
        $validator  = Validator::make($request->all(), [
            'name_user' => 'required',
            'surname_user' => 'required',
            'phone_user' => 'regex:(\(?\+[0-9]{1,3}\)? ?-?[0-9]{1,3} ?-?[0-9]{3,5} ?-?[0-9]{4}( ?-?[0-9]{3})?)',
            'gmail_user' => 'required|email',
            'description_user.*' => 'required',
            'image4' => 'required|mimes:jpeg,png,jpg',
            'pass_user' => 'required'
        ],$messages);

        if ($validator->fails()){
            return redirect('/admin/userControl')
                ->withInput()
                ->withErrors($validator);
        }
            $user = new User();
            $user->name = $request->name_user;
            $user->surname = $request->surname_user;
            $user->numbere = $request->phone_user;
            $user->email = $request->gmail_user;
            $user->password = Hash::make($request['pass_user']);
            $user->role_id = $request->role_id;

            if ($user->save()) {
                $descriptions = $request->description_user;
                foreach ($descriptions as $key => $value){
                    $userTranslate = new UserTranslate();
                    $userTranslate->description = $value;
                    $userTranslate->language_id = $key;
                    $userTranslate->user_id = $user->id;
                    $userTranslate->save();

                }
                if ($request->hasFile('image4')) {
                    $imageSave = $this->addon->file_upload($request->file('image4'), '3', $user->id);
                    if (isset($imageSave['message'])) {
                        return response()->json($imageSave, 400);
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
        $user = User::with('user_translates')->with('role')->with('images')->with('user_ratings')->where('id', $id)->get();


        return view('/admin/userControl/viewUserModal', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('images')->with(['user_translates' => function($lang){
            $lang->with('language');
        }])->with('user_ratings')->where('id', $id)->get();
        $role = Role::all();

        return view('/admin/userControl/editUser',['user' => $user ,'role'=>$role] );
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
        $messages = [
            'name_user.required' => 'The name field is required.',
            'surname_user.required'=>'The surname field is required.',
            'phone_user.required' => 'The phone field is required.',
            'gmail_user.required' => 'The email field is required.',
            'description_user.*.required' => 'The description field is required.',
            'image4.required' => 'The image field is required.',
        ];
        $validator  = Validator::make($request->all(), [
            'name_user' => 'required',
            'surname_user' => 'required',
            'phone_user' => 'regex:(\(?\+[0-9]{1,3}\)? ?-?[0-9]{1,3} ?-?[0-9]{3,5} ?-?[0-9]{4}( ?-?[0-9]{3})?)',
            'gmail_user' => 'required|email',
            'description_user.*' => 'required',
            'image4' => 'required',
        ],$messages);

        if ($validator->fails()){
            return redirect('/admin/userControl')
                ->withInput()
                ->withErrors($validator);
        }else {
            $user = User::findOrFail($id);
            $user->name = $request->get('name_user');
            $user->surname = $request->get('surname_user');
            $user->numbere = $request->get('phone_user');
            $user->email = $request->get('gmail_user');
            if (!empty($request->get('pass_user'))){
                $user->password = Hash::make($request->get('pass_user'));

            }
            $user->role_id = $request->get('roleOption');
            if ($user->save()) {

                $descriptions = $request->description_user;
                foreach ($descriptions as $key => $value) {
                    $userTranslate = UserTranslate::findOrFail($key);
                    $userTranslate->description = $value;

                    $userTranslate->save();

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->with('role')->get();
        $userRole = $user[0]->role->name;
        if ($userRole === "admin") {
            return Redirect::back()->withErrors(['No Permission']);
        } else {
            User::destroy($id);
            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\AddonLib;
use App\Models\Image;
use App\Models\Language;
use App\Models\Role;
use App\Models\State;
use App\Models\UserTranslate;
use App\Models\WorksGuide;
use App\User;
use function foo\func;
//use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;


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

//        $lang = Language::all();
        $role = Role::all();

        return view('/admin/userControl/createUser', ['role' => $role]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        var_dump($request->image4);
        $messages = [
            'name_user.required' => 'The name field is required.',
            'surname_user.required' => 'The surname field is required.',
            'phone_user.required' => 'The phone field is required.',
            'gmail_user.required' => 'The email field is required.',
//            'image4.required' => 'The image field is required.',
            'pass_user.required' => 'The Password field is required.',
        ];
        $validator = Validator::make($request->all(), [
            'name_user' => 'required',
            'surname_user' => 'required',
            'phone_user' => 'regex:(\(?\+[0-9]{1,3}\)? ?-?[0-9]{1,3} ?-?[0-9]{3,5} ?-?[0-9]{4}( ?-?[0-9]{3})?)',
            'gmail_user' => 'required|email',
//            'image4' => 'required|mimes:jpeg,png,jpg',
            'pass_user' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect('/admin-panel/userControl')
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
            if ($request->role_id == 4) {
                $descriptions = $request->description_user;
                foreach ($descriptions as $key => $value) {
                    $userTranslate = new UserTranslate();
                    $userTranslate->description = $value;
                    $userTranslate->language_id = $key;
                    $userTranslate->user_id = $user->id;
                    $userTranslate->save();

                }
                $state = $request->states;
                foreach ($state as $keys => $values) {
                    $work = new  WorksGuide();
                    $work->state_id = $keys;
                    $work->user_id = $user->id;
                    $work->save();
                }
            }
            if (empty($request->image4)){
                $image =  new Image();
                $imgPath = "img/1535719958.png";
                $imgName ="1535719958.png";
                $image->name = $imgName;
                $image->path = $imgPath;
                $image->type = 1;
                $image->user_id = $user->id;
                $image->save();
            }else {
                if ($request->hasFile('image4')) {
                    $imageSave = $this->addon->file_upload($request->file('image4'), '3', $user->id);
                    if (isset($imageSave['message'])) {
                        return response()->json($imageSave, 400);
                    }
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
        $user = User::with(['images', 'user_translates' => function ($lang) {
            $lang->with('language');
        }, 'user_ratings'])->where('id', $id)->get();
        $role = Role::all();
        $states = State::with(['state_translates' => function ($allState) {
            $allState->where('language_id', 1);
        }])->get();
        return view('/admin/userControl/editUser', ['user' => $user, 'role' => $role, 'states' => $states]);
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
            'surname_user.required' => 'The surname field is required.',
            'phone_user.required' => 'The phone field is required.',
            'gmail_user.required' => 'The email field is required.',
            'description_user.*.required' => 'The description field is required.',
//            'image4.required' => 'The image field is required.',
            'roleOption.required' => 'The status  is required'
        ];
        $validator = Validator::make($request->all(), [
            'name_user' => 'required',
            'surname_user' => 'required',
            'phone_user' => 'regex:(\(?\+[0-9]{1,3}\)? ?-?[0-9]{1,3} ?-?[0-9]{3,5} ?-?[0-9]{4}( ?-?[0-9]{3})?)',
            'gmail_user' => 'required|email',
            'description_user.*' => 'required',
//            'image4' => 'required',
            'roleOption' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect('/admin-panel/userControl')
                ->withInput()
                ->withErrors($validator);
        } else {
            $user = User::where('id', $id)->first();

            $user->name = $request->get('name_user');
            $user->surname = $request->get('surname_user');
            $user->numbere = $request->get('phone_user');
            $user->email = $request->get('gmail_user');
            if (!empty($request->get('pass_user'))) {
                $user->password = Hash::make($request->get('pass_user'));

            }

            $user->role_id = $request->get('roleOption');
            if ($user->save()) {

                if ($request->roleOption === "4") {

                    $descriptions = $request->get('description_user');
                    foreach ($descriptions as $key => $value) {
//
                        $userTranslate = UserTranslate::firstOrCreate(['language_id' => $key,'user_id'=> $user->id ]);
                        $userTranslate->description = $value;
                        $userTranslate->user_id = $user->id;
                        $userTranslate->language_id = $key;
                        $userTranslate->save();

                    }
                    $state = $request->states;
//$work->save();
                    $work = WorksGuide::where('user_id', $user->id)->delete();

                    foreach ($state as $keys => $values) {


                        $addWork = new WorksGuide();
                        $addWork->user_id = $user->id;
                        $addWork->state_id = $keys;

                        $addWork->save();
                    }
                } else {
                    $userID = $user->id;
                    $workDel = WorksGuide::where('user_id', $userID)->delete();
                    $transDel = UserTranslate::where('user_id', $userID)->delete();

                }
                if (empty($request->image4)){

                }else{


                    if ($request->hasFile('image4')) {
                        foreach ($request->file('image4') as $img_id => $file) {
                            $imageSave = $this->addon->fileUploader($file, 'image', true, $img_id);
                            if (isset($imageSave['message'])) {
                                return response()->json($imageSave, 400);
                            }
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

    public function guideSettings()
    {

        $lang = Language::all();
        $states = State::with(['state_translates' => function ($stateLang) {
            $stateLang->where('language_id', 1);
        }])->get();
        return \view('admin.userControl.userDescription')->with(['lang' => $lang, 'states' => $states]);
//         return view('/admin/userControl/viewUserModal', ['user' => $user]);

//         return response()->json(['html' => View::make('admin/userControl/userDescription', ['lang' =>$lang, 'states'=>$states])->render()], 200);

    }
}

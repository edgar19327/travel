<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutTranslate;
use App\Models\Button;
use App\Models\ButtoneTranslate;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\AddonLib;

use function PHPSTORM_META\type;

class InfoController extends Controller
{
    public $addon;

    public function __construct(Request $request)
    {

        $this->addon = new AddonLib();
    }

    public function about()
    {

//        $about = About::with(['about_translates' => function ($date) {
//            $date->where('type', 'about');
//            $date->with('language');
//        }])->first();
        $about = AboutTranslate::where('type', "about")->with('language')->with(['about' => function ($data) {
            $data->with('images');
        }])->get();
        if (sizeof($about) == 0) {
            $language = Language::all();
            return view('admin/infoCrud/about', ['language' => $language]);

        } elseif (sizeof($about) > 0) {
            return view('admin/infoCrud/about', ['about' => $about]);

        }

    }

    public function storeAbout(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title.*' => 'required',
            'description.*' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $about = new About();
            if ($about->save()) {
                $title = $request->title;
                $description = $request->description;
                $type = "about";
                foreach ($title as $key => $value) {
                    $aboutTranslate = new AboutTranslate();
                    $aboutTranslate->about_id = $about->id;
                    $aboutTranslate->title = $value;
                    $aboutTranslate->description = $description[$key];
                    $aboutTranslate->language_id = $key;
                    $aboutTranslate->type = $type;
                    $aboutTranslate->save();

                }
                $id = $about->id;

            }

            if ($request->hasFile('image_about')) {

                $imageSave = $this->addon->file_upload($request->file('image_about'), 4, $id);
                if (isset($imageSave['message'])) {
                    return response()->json($imageSave, 400);
                }
            }
            return redirect()->back();
        }
    }


    public function updateAbout(Request $request, $id)
    {
//        return $request->all();
        $validator = Validator::make($request->all(), [
            'title.*' => 'required',
            'description.*' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $title = $request->title;
            $description = $request->desc;
            foreach ($title as $key => $value) {
                $updateGuide = AboutTranslate::where('about_id', $id)->where('language_id', $key)->first();
                $updateGuide->title = $value;
                $updateGuide->description = $description[$key];
                $updateGuide->save();

            }
            if ($request->hasFile('image_about')) {
                foreach ($request->file('image_about') as $img_id => $file) {
                    $imageSave = $this->addon->fileUploader($file, 4, true, $img_id);
                    if (isset($imageSave['message'])) {
                        return response()->json($imageSave, 400);
                    }
                }
            }
            return redirect()->back();
        }
    }


    public function buttons()
    {
        $button = Button::with(['buttone_translates' => function ($date) {
            $date->where('language_id', 1);
        }])->get();
        return view('admin/infoCrud/buttons', ['button' => $button]);
    }

    public function buttonEdit($id)
    {
        $languages = Language::all();
        $buttons = Button::where('id', $id)->with('buttone_translates')->get();
        return view('admin/infoCrud/buttonModal', ['languages' => $languages, 'buttons' => $buttons]);
    }


    public function buttonUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title.*' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $title = $request->title;
            foreach ($title as $key => $value) {
//            var_dump($button) ;
                $button = ButtoneTranslate::where('button_id', $id)->where('language_id', $key)->first();

                if (!empty($button)) {

                    $buttonTrans = ButtoneTranslate::where('button_id', $id)->where('language_id', $key)->first();

                    $buttonTrans->name = $value;
                    $buttonTrans->save();
                } else {

                    $createButton = new  ButtoneTranslate();
                    $createButton->name = $value;
                    $createButton->language_id = $key;
                    $createButton->button_id = $id;
                    $createButton->save();
                }
            }
            return redirect()->back();
        }

//        $languages = Language::all();
//        $buttons = Button::where('id', $id)->with('buttone_translates')->get();
//        return view('admin/infoCrud/buttonModal', ['languages' => $languages, 'buttons'=>$buttons ]);
    }


    public function guide()
    {
        $guide = AboutTranslate::where('type', "guide")->with('language')->with('about')->get();

        if ($guide === null) {
            $language = Language::all();
            return view('admin/infoCrud/guide', ['language' => $language]);

        } else {
            return view('admin/infoCrud/guide', ['guide' => $guide]);

        }

    }


    public function storeGuide(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title.*' => 'required',
            'description.*' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $guide = new About();
            if ($guide->save()) {
                $title = $request->title;
                $description = $request->description;
                $type = "guide";
                foreach ($title as $key => $value) {
                    $guideTranslate = new AboutTranslate();
                    $guideTranslate->about_id = $guide->id;
                    $guideTranslate->title = $value;
                    $guideTranslate->description = $description[$key];
                    $guideTranslate->language_id = $key;
                    $guideTranslate->type = $type;
                    $guideTranslate->save();

                }
                return redirect()->back();

            }
        }
    }

    public function updateGuide(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title.*' => 'required',
            'description.*' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $title = $request->title;
            $description = $request->desc;
            foreach ($title as $key => $value) {
                $updateGuide = AboutTranslate::where('about_id', $id)->where('language_id', $key)->first();
                $updateGuide->title = $value;
                $updateGuide->description = $description[$key];
                $updateGuide->save();

            }
            return redirect()->back();
        }
    }
}

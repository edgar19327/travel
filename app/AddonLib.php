<?php

namespace App;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use Illuminate\Support\Facades\File;

use App\ImageTypes;
use Illuminate\Support\Facades\Storage;

/**
 *
 */
class AddonLib
{
    use ImageTypes;

    /**
     * checkUriParameter
     * @param mixed $request
     * @param mixed $field
     * @param mixed $count
     * @return mixed
     */
    public function checkUriParameter($request, $field, $count = 3)
    {
        return ($request->has($field) && strlen($request->get($field)) >= $count);
    }

    /**
     * checkRole
     * @param mixed $role_name
     * @return mixed
     */
//    public function checkRole($role_name)
//    {
//        $role = Role::where("id", Auth::user()->role_id);
//        if ($role->exists()) {
//            if (strcasecmp($role->value("name"), $role_name) == 0) {
//                return true;
//            }
//        }
//        return false;
//    }

    public function file_upload($request, $type_name, $file_delete = false, $id = null)
    {
        // request fields
        $file = $request->file($request);
        $extension = $file->getClientOriginalExtension();

        // generate and move files
        $generatedName = $file->getFilename() . time() . '.' . $extension;

        $path = env('UPLOAD_IMAGE_PATH');
        if (!File::exists(public_path($path))) {
            File::makeDirectory(public_path($path), $mode = 0777, true, true);
        }

        if ($file_delete) {
            // find by id movie object
            $image = Image::findOrFail($id);
            // remove files
            if($image->id != 1){
            if (file_exists(public_path($image->uri))) {
                unlink(public_path($image->uri));
              }
            }
        } else {
            // create new movie object
            $image = new Image();
        }

        $image->name = $generatedName;
        $image->uri = $path . '/' . $generatedName;
        $image->file_size = filesize($request);
        $image->status = 1;
        $image->type = $this->image_types[$type_name];
        if (!$file->move(public_path($path), $generatedName)) {
            return ['message' => 'File upload error.'];
        }
        // save movie object
        if (!$image->save()) {
            return ['message' => 'Error saved images.'];
        }
        return $image->id;
    }

    public function fileUploader($image_data, $by_type, $file_delete = false, $id = null)
    {
        $file = $image_data;
        $size = filesize($file);
        $path = env('UPLOAD_IMAGE_PATH');
        $extension=$file->getClientOriginalExtension();
        $uploadedFile =   time().'.'.$extension;

        $destinationPath=public_path($path);
        if (!($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png'|| $extension == 'JPEG' || $extension == 'JPG' || $extension == 'PNG')) {
            return ['message' => 'The image must be a file of type: jpeg, jpg, png.'];
        }
        $size_env = env('SIZE_IMAGE');
        if ($size >= $size_env) {
            return ['message' => 'Изображение не может быть больше 10 мегабайт'];
        }

        if (!File::exists(public_path($path))) {
            File::makeDirectory(public_path($path, $mode = 0777, true, true));
        }
        $file->move($destinationPath,  $uploadedFile);

        if ($file_delete && Image::findOrFail($id)->name != 'avatar.png') {
            // find by id movie object
            $image = Image::findOrFail($id);
            // remove files
            if (file_exists(public_path($image->uri))) {
                unlink(public_path($image->uri));
//                dd(public_path($image->uri));
            }
        } else {
            // create new movie object
            $image = new Image();
        }

        $image->name = $uploadedFile;
        $image->uri = $path . '/' . $uploadedFile;
        $image->file_size = $size;
        $image->md5 = md5_file(public_path($path . '/' . $uploadedFile));
        $image->status = 1;
        $image->type = Image::$ImageTypeArray[$by_type];

        // save movie object
        if (!$image->save()) {
            return ['message' => 'Error saved images.'];
        }
        return $image->id;
    }

    public function imageDelete($model)
    {
        $image_id = $model->value('image_id');
        Image::where('id', $image_id)->delete();
    }




    public function qr_qode($qr_code,$file_delete = false, $id = null)
    {

        $file = QRCode::text($qr_code)->png();
        $extension=$file->getClientOriginalExtension();
        $uploadedFile =   time().'.'.$extension;

        $path = env('UPLOAD_QR_PATH');
        $destinationPath=public_path($path);
        if (!File::exists(public_path($path))) {
            File::makeDirectory(public_path($path, $mode = 0777, true, true));
        }
        $file->move($destinationPath,  $uploadedFile);

        if ($file_delete) {
            // find by id movie object
            $qr = QrCod::findOrFail($id);
            // remove files
            if (file_exists(public_path($qr->uri))) {
                unlink(public_path($qr->uri));
//                dd(public_path($image->uri));
            }
        } else {
            // create new movie object
            $qr = new QrCod();
        }

        $qr->qr_code = $qr_code;
        $qr->uri = $path . '/' . $uploadedFile;
        $qr->md5 = md5_file(public_path($path . '/' . $uploadedFile));
        $qr->status = 1;
        $qr->user_id=Auth::user()->id;
        // save movie object
        if (!$qr->save()) {
            return ['message' => 'Error saved images.'];
        }

    }


}

<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Closure;
use Illuminate\Routing\Route;
use  App\User;
use  Illuminate\Support\Facades\Auth;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

//
        $user_rol =User::where('id', Auth::id())->with('role')->get();

if (Auth::check() && $user_rol[0]->role->name == "admin" ){
        return $next($request);

}else{
        return redirect('/');

}
//getController
//        dd($request->route()->getActionMethod());
//        dd($user_rol);

//        $user_role_name = $user_rol[0]["name"];
//dd($user_role_name);
//        if( $user_role_name == "admin"){
//            return redirect()->guest('home');
//        }


//if ($user_role_name == "admin"){
//
//        $user_role = Role::where('id', Auth::user()->role_id)->with('permissions')->get();
//
//    $role_controller = $user_role[0]["permissions"][0]["controller_name"];
//        $role_methode = $user_role[0]["permissions"][0]["method_name"];
//        $user_controller = $request->route()->getAction();
//        $user_action_name =  $request->route()->getActionMethod();
//        $controllerAction = class_basename($user_controller['controller']);
//
//    $user_controller_names = explode('@', $controllerAction);
//
//    $user_controller_name = $user_controller_names[0];
//    dd($user_controller_name);
//
//    if ($user_controller_name == $role_controller && $user_action_name == $role_methode) {
//
////            return $next($request);
//            return redirect('admin/index');
//        }
//}else{
//    dd(25);
//
//        $user_role = Role::where('id', Auth::user()->role_id)->with('permissions')->get();
//        $role_controller = $user_role[0]["permissions"][0]["controller_name"];
//        $role_methode = $user_role[0]["permissions"][0]["method_name"];
//        $user_controller = $request->route()->getAction();
//        $user_action_name = $request->route()->getActionMethod();
//        $controllerAction = class_basename($user_controller['controller']);
//        $user_controller_names = explode('@', $controllerAction);
//        $user_controller_name = $user_controller_names[0];
//        if ($user_controller_name == $role_controller && $user_action_name == $role_methode) {
//            return $next($request);
//        }else{
//            dd("2332");
//        }




    }
}

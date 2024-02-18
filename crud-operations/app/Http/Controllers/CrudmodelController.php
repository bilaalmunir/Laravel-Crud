<?php

namespace App\Http\Controllers;

use App\Models\Crudmodel;
use Illuminate\Http\Request;

class CrudmodelController extends Controller
{
    //run migeration
    function addUser(Request $request){
        $user = new Crudmodel();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

    }
    function editStatus(Request $request){
        $status = $request->status;
        $id = $request->id;
        $user = Crudmodel::findorfail($id);
        $user->status = $status;
        $user->save();
        return $user;

    }
    function deleteUser(Request $request){
        $user = Crudmodel::findorfail($request->id);
        $user->delete();
        return " user deleted!";
    }
    function getUsers(){
        $users = Crudmodel::all();
        return $users;
    }
}
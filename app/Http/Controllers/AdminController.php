<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    //

    public function index()
    {
        return view('admin/index');
    }

    public function users()
    {

        try {
            $result = User::all();

            return view('admin/users', [
                'result' => $result
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function editUser($uid)
    {
        try {
            $result = User::where("user_id", $uid)->first();

            return view('admin/edit_user', [
                'result' => $result
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function updateUser(Request $request)
    {
        try {
            $password = $request->password;

            if ($request->new_password != null) {
                $password = Hash::make($request->new_password);
            }

            User::where("user_id", $request->user_id)->update([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $password
            ]);

            return Redirect()->back()->with('Success', "Successfully Updated");
        } catch (Exception $e) {
            return Redirect()->back()->with('Failed', $e->getMessage());
        }
    }

    public function deleteUser($uid)
    {
        try {

            User::where("user_id", $uid)->delete();

            return Redirect()->back()->with('Success', "Successfully Deleted");
        } catch (Exception $e) {
            return Redirect()->back()->with('Failed', $e->getMessage());
        }
    }
}

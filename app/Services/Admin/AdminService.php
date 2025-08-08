<?php
namespace App\Services\Admin;
use App\Models\Admin;
use Auth;
use Hash;

class AdminService
{
    public function login($data)
    {
        if (Auth::guard('admin')->attempt((['email' => $data['email'], 'password' => $data['password']]))) {

            // Remember Admin Email and Password
            if (!empty($data["remember"])) {
                setcookie("email", $data["email"], time() + 3600);
                setcookie("password", $data["password"], time() + 3600);
            } else {
                setcookie("email", "");
                setcookie("password", "");
            }

            $loginStatus = 1;
        } else {
            $loginStatus = 0;
        }
        return $loginStatus;
    }

    public function verifyPassword($data)
    {
        if (Hash::check($data["current_pwd"], Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    public function updatePassword($data)
    {
        //Check if the current password is correct
        if(Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)){
            //Check if new password and confirm password match
            if($data['new_pwd'] == $data['confirm_pwd']){
                Admin::where('email', Auth::guard('admin')->user()->email)->
                update(['password'=>bcrypt($data['new_pwd'])]);
                $status = "success";
                $message="Password has been updated successfully!";

            }else{
                $status = "error";
                $message= "The passwords doesn't match!";
            }
        }else{
            $status = "error";
            $message= "Your current password is incorrect!";
        }
        return ["status"=>$status, "message"=>$message];
    }
}


?>
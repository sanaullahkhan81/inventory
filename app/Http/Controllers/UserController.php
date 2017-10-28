<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\upload;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    
    public function checkUserPermission()
    {
        if(Auth::user()->user_type != 1)
        {
            //abort(403, 'oo jaaa');
            abort(404, "You don't have permission of this page.");
            exit();
        }
    }
    
    public function userlist(){
        self::checkUserPermission();
        
        $users = users::getUsers();
        $page = 'userlist';
        return view('users', compact('page', 'users'));
    }
    
    public function addusermodal($userid = 0) {
        self::checkUserPermission();
        
        $userdetail = null;
        
        if($userid != 0) {
            $userdetail = users::getUserById($userid);
        }
        return view('user.addUserModal', compact('userdetail'));
    }
    
    public function saveuser($userid = 0) {
        self::checkUserPermission();
        
        $imageName = Input::get('imageName');
        $imageChanged = Input::get('hasImage');
        $file = Input::file('imageData');
        $firstName = Input::get('firstName');
        $lastName = Input::get('lastName');
        $email = Input::get('email');
        $password = Input::get('password');
        $userType = Input::get('userType');
        $active = Input::get('active');
        
        $res = 0;
        
        if($userid == 0)
        {
            $userdetail = users::getUserByEmail($email);
            if(count($userdetail) != 0)
            {
                $res = -1;
                echo $res;
                exit();
            }
        }
        
        if($imageChanged == 0)
        {
            $filePath = explode( "/" , $imageName )[1];
        }
        else
        {
            $filePath = upload::uploadFile($file);
            
            if(explode( "=" , $filePath )[0] == "true")
            {
                $filePath = explode( "=" , $filePath )[1];
            }
            else
            {
                echo $res;
                exit();
            }
        }
        
        if($userid == 0)
        {
            $res = users::addUser($firstName, $lastName, $email, $password, $userType, $active, $filePath);
        }
        else 
        {
            $res = users::updateUser($userid, $firstName, $lastName, $email, $password, $userType, $active, $filePath);
        }
            
        echo $res;       
    }
    
    public function restuserpassword() {
        
        $newPassword = Input::get('newPassword');
        
        $res = 0;
        $userId = 0;
        
        if(Auth::user()->user_type != 1 && Auth::user()->first_login == 0)
        {
            $userId = Auth::user()->id;
            //$res = $userId;
            $res = users::resetUserPassword($userId, $newPassword);
        }
        
        echo $res;
    }
    
}

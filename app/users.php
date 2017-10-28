<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class users extends Model
{
    
    static function getUsers(){
        $users = DB::table('users')
                ->select('id', 'name', 'first_name', 'last_name', 'email', 'password', 'remember_token', 
                        'user_type', 'active', 'attachments', 'first_login', 'created_at', 'updated_at')
                ->get();
        return $users;
    }
    
    static function getUserById($userid){
        $customer = DB::table('users')
                ->select('id', 'name', 'first_name', 'last_name', 'email', 'password', 'remember_token', 
                        'user_type', 'active', 'attachments', 'first_login', 'created_at', 'updated_at')
                ->where('id', '=', $userid)
                ->get();
        return $customer;
    }
    
    static function getUserByEmail($userEmail){
        $customer = DB::table('users')
                ->select('id', 'name', 'first_name', 'last_name', 'email', 'password', 'remember_token', 
                        'user_type', 'active', 'attachments', 'first_login', 'created_at', 'updated_at')
                ->where('email', '=', $userEmail)
                ->get();
        return $customer;
    }
    
    static function addUser($firstName, $lastName, $email, $password, $userType, $active, $filePath){
        
        $epassword = Hash::make($password);
        
        $id = DB::table('users')->insertGetId(
            [
                'name' => $firstName.' '.$lastName, 
                'first_name' => $firstName, 
                'last_name' => $lastName,  
                'email' => $email,
                'password' => $epassword,
                'user_type' => $userType,
                'active' => $active,
                'attachments' => $filePath,
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s')
                ]
        );
        return $id;
    }
    
    static function updateUser($userid, $firstName, $lastName, $email, $password, $userType, $active, $filePath){
        
        DB::table('users')
            ->where('id', $userid)
            ->update([
                'name' => $firstName.' '.$lastName, 
                'first_name' => $firstName, 
                'last_name' => $lastName,  
                'email' => $email,
//                'password' => $password,
                'user_type' => $userType,
                'active' => $active,
                'attachments' => $filePath,
                'updated_at' => date('Y-m-d H:i:s')
                    ]);
        return $userid;
    }
    
    static function resetUserPassword($userid, $newPassword){
        
        $epassword = Hash::make($newPassword);
        
        DB::table('users')
            ->where('id', $userid)
            ->update([
                
                'password' => $epassword,
                'first_login' => 1
                
            ]);
        
        return $userid;
    }
}

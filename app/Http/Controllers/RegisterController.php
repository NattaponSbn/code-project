<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Datauser;
use App\Imgaccount;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $req) {
        //iduser
        
        
        $codeu = 'U';
        $cont = count(DB::select("SELECT NO_User FROM users"));
        $nextint = $cont+1;
        $string_id = substr("000".$nextint,-4);
        $nextid = $codeu.$string_id;
        $chk_user = DB::select("SELECT * FROM users WHERE U_id in ('$nextid')");
        if(isset($chk_user)?$chk_user:''){
            $codeu = 'U';
            $cont = count(DB::select("SELECT NO_User FROM users"));
            $nextint = $cont+2;
            $string_id = substr("000".$nextint,-4);
            $id = $codeu.$string_id;
        }else{
            $id = $nextid;
        }

        // echo $id;

        $path = 'default.png';
        $status = 'user';

        $fname = $req->firstname;
        $lname = $req->lastname;
        if(isset($fname)=='' && isset($lname)==''){
            $name = '';
        }else{
            $name = $fname.' '.$lname;
            // echo $name;
        }

      
        $user = new Datauser;
        $user->U_id=$nextid;
        $user->name=$name;
        $user->gender=$req->gender;
        $user->branch=$req->branch;
        $user->email=$req->email;
        $user->username=$req->username;
        $user->password=$req->password;
        $user->pathimg=$path;
        $user->status=$status;
        $user->save();

        session_start();
        $user_log = $_POST['username'];
        // echo $username;
        $pass_log = $_POST['password'];
        $chackuser = DB::select("SELECT * FROM users WHERE username = '$user_log' and password = '$pass_log'");
        // print_r($chackuser);
        foreach($chackuser as $chackuser) {
            $_SESSION['usersid'] = $chackuser->U_id;
            $_SESSION['usernameguest'] = $chackuser->username;
            $_SESSION['nameuser'] = $chackuser->name;
            $_SESSION['emailuser'] = $chackuser->email;
            $_SESSION['pathimg'] = $chackuser->pathimg;
            $_SESSION['status'] = $chackuser->status;
        }
        
        return redirect('homeBD')->with('successregister', 'สมัครสมาชิกเรียบร้อย');
        
        
    }
}

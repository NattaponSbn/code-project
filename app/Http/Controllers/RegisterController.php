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

        $path = 'default.png';
        $status = 'user';

        $user = new Datauser;
        $user->U_id=$nextid;
        $user->name=$req->name;
        $user->gender=$req->gender;
        $user->province=$req->province;
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

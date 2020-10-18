<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Session;
use DB;

class logintestController extends Controller
{
    //

    

    public function index(){
        return view('auth.login');
    }
    public function chkauthen(Request $request){
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == 'Aadmin') {
            $res_chk_admin_company = DB::table('admin_company')->select('*')->where([
                ['admin_company_user', '=', $username]
                ])->get();
                // "SELECT * FROM users WHERE username = '$username' and password = '$password'";
                
                session(['admin_company_id' => $res_chk_admin_company[0]->admin_company_id]);
                session(['admin_company_user' => $res_chk_admin_company[0]->admin_company_user]);
                session(['admin_company_name' => $res_chk_admin_company[0]->admin_company_name]);

                echo $res_chk_admin_company;
                
                return redirect('admin')->with('successlogintest' , 'ยินดีต้อนรับเข้าสู่ระบบ');
        }else {

            $res_chk_user = DB::table('users')->select('*')->where([
                ['username', '=', $username]
            // echo $res_chk_user;
            if (password_verify($password, $res_chk_user->password)) {
                session(['username' => $res_chk_user->username]);
                session(['name' => $res_chk_user->name]);
                session(['status' => $res_chk_user->status]);
                echo session('status');
                // return redirect()->back()->with('successhomeuser' , 'ยินดีต้อนรับเข้าสู่ระบบ');
            }
            // Create connection
            // $conn = new mysqli($servername, $username, $password, $datadb);

            // $res_chk_user = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
            // return $res_chk_user;

            // session(['admin_company_id' => $res_chk_admin_company[0]->admin_company_id]);
            // session(['admin_company_user' => $res_chk_admin_company[0]->admin_company_user]);
            // session(['admin_company_name' => $res_chk_admin_company[0]->admin_company_name]);
        
            // session(['username' => $res_chk_user->username]);
            // session(['name' => $res_chk_user->name]);

           
            // $_SESSION['datausername'] = $datauser['username'];
            // $_SESSION['nameuser'] = $datauser['name'];
    
            
                // echo $res_chk_user;

                // $_SESSION['datausername'] = $datauser['username'];
                // $_SESSION['nameuser'] = $datauser['name'];
                // session(['username' => $res_chk_user[0]->username]);
                // session(['name' => $res_chk_user[0]->name]);

            
        }
                
           
            
            // }
            // return redirect('homeBD')->with('successhomeuser');
            // $res_chk_user = DB::table('users')->select('*')->where([
            //     ['username', '=', $username]
            //     ])->get();
            //     echo $res_chk_user;


                // session(['id' => $res_chk_user[0]->id]);
                // session(['username' => $res_chk_user[0]->username]);
                // session(['name' => $res_chk_user[0]->name]);
                
                
        }
        

            // echo $res_chk_admin_company;
        // @$dbpass = $res_chk_admin_company[0]->company_account_pass;       
            
    }
   


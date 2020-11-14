<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Datauser;

use Session;

use nusoap_client;

class login_pyController extends Controller
{


    public function authentication(Request $request)
    {

        // require('dbconnect.php');
        session_start();

        $user = base64_encode(@$_POST['username']);
        $pass = base64_encode(@$_POST['password']);
        $user_log = $_POST['username'];
        // echo $username;
        $pass_log = $_POST['password'];
        $chackadmin = DB::select("SELECT * FROM admin_company WHERE admin_user = '$user_log' and admin_pass = '$pass_log'");
        $countadmin = count(DB::select("SELECT * FROM admin_company WHERE admin_user = '$user_log' and admin_pass = '$pass_log'"));
        foreach($chackadmin as $chackadmin){
            $admin_id = $chackadmin->admin_id;
            $admin_user = $chackadmin->admin_user;
            $admin_pass = $chackadmin->admin_pass;
            $admin_name = $chackadmin->admin_name;
            $admin_email = $chackadmin->admin_email;
            $pathimg = $chackadmin->pathimg;
            $status = $chackadmin->status;

        }
        if ($countadmin > 0) {
                if($admin_pass == $pass_log){
                    $_SESSION['adminid'] =$admin_id;
                    $_SESSION['adminauser'] =$admin_user;
                    $_SESSION['adminname'] =$admin_name;
                    $_SESSION['adminemail'] =$admin_email;
                    $_SESSION['pathimg'] =$pathimg;
                    $_SESSION['statusA'] =$status;
                    $_SESSION['successloginadmin'] = "successloginadmin";

                    return redirect('homeadmin');
                }else{
                    $_SESSION['notpass'] = "null";
                    session_destroy();
                    return back();
                }

        }

        // elseif($user_log == 'personnel'){
        //     $_SESSION['nameuser'] = 123 . "  " . 3456;
        //     $_SESSION['Department'] = 'สำนักงาน';
        //     // $_SESSION['pathimg'] = $datauser['pathimg'];
        //     $_SESSION['statusP'] = 'personnel';
        //     $_SESSION['message'] = "successlogin";
        //     return back();           
        // }

        else {

            /*********************** AuthenService **************************/
            $wsdl = "https://ws.up.ac.th/mobile/AuthenService.asmx?WSDL";
            $method = "Login.";
            $soapaction = "http://tempuri.org/Login";
            $body = '<Login xmlns="http://tempuri.org/">';
            $body .= '<username>' . $user . '</username>';
            $body .= '<password>' . $pass . '</password>';
            $body .= '<ProductName>ictcoopsystem</ProductName>';
            $body .= '</Login>';


            $client = new \nusoap_client($wsdl, false);
            $client->decode_utf8 = false;
            $mysoapmsg = $client->serializeEnvelope($body, '', array(), 'document', 'literal');
            $response = $client->send($mysoapmsg, $soapaction);
            $result = $response['LoginResult'];
            $_SESSION['SID'] = $result;
            /*********************** AuthenService **************************/

            // teacher,staff,teacher,director login,login_register
            if (!is_numeric($user_log)) {
                $countuser = count(DB::select("SELECT * FROM users WHERE username = '$user_log' and password = '$pass_log'"));
                $chackuser = DB::select("SELECT * FROM users WHERE username = '$user_log' and password = '$pass_log'");
                //*** login from register ***//
                if(isset($chackuser)?$chackuser:''){
                    foreach($chackuser as $chackuser){
                        $name = $chackuser->name;
                        $email = $chackuser->email;
                        $password = $chackuser->password;
                        $status = $chackuser->status;
                        $pathimg = $chackuser->pathimg;
                    }
                    if($password == $pass_log){
                        $_SESSION['name'] =$name;
                        $_SESSION['email'] =$email;
                        $_SESSION['pathimg'] =$pathimg;
                        $_SESSION['statusR'] =$status;
                        $_SESSION['message'] = "successlogin";
                        return back();
                    }
                    else{
                        $_SESSION['notpass'] = "null";
                        session_destroy();
                        return back();
                    }
                }else{
                    /*********************** GetStaffInfo **************************/
                    $wsdl = "https://ws.up.ac.th/mobile/StaffService.asmx?op=GetStaffInfo";
                    $method = "GetStaffInfo";
                    $soapaction = "http://tempuri.org/GetStaffInfo";
                    $body = '<GetStaffInfo   xmlns="http://tempuri.org/">';
                    $body .= '<sessionID>' . $_SESSION['SID'] . '</sessionID>';
                    $body .= '</GetStaffInfo >';

                    $client = new \nusoap_client($wsdl, false);
                    $client->decode_utf8 = false;
                    $mysoapmsg = $client->serializeEnvelope($body, '', array(), 'document', 'literal');
                    $response = $client->send($mysoapmsg, $soapaction);
                    $result = $response['GetStaffInfoResult'];
                    /*********************** GetStaffInfo **************************/

                    $_SESSION['nameuser'] = $result['FirstName_TH'] . "  " . $result['LastName_TH'];
                    $_SESSION['Department'] = $result['Department'];
                    // $_SESSION['pathimg'] = $datauser['pathimg'];
                    $_SESSION['statusP'] = 'personnel';
                    $_SESSION['message'] = "successlogin";
                    return back();      
                }
                      
            }

            // studentlogin
            else {
                /*********************** GetStudentInfo **************************/
                $wsdl = "https://ws.up.ac.th/mobile/StudentService.asmx?WSDL";
                $method = "GetStudentInfo";
                $soapaction = "http://tempuri.org/GetStudentInfo";
                $body = '<GetStudentInfo   xmlns="http://tempuri.org/">';
                $body .= '<sessionID>' . $_SESSION['SID'] . '</sessionID>';
                $body .= '</GetStudentInfo >';


                $client = new \nusoap_client($wsdl, false);
                $client->decode_utf8 = false;
                $mysoapmsg = $client->serializeEnvelope($body, '', array(), 'document', 'literal');
                $response = $client->send($mysoapmsg, $soapaction);
                $result = $response['GetStudentInfoResult'];
                /*********************** GetStudentInfo **************************/

                $_SESSION['usersid'] = $result['StudentCode'];
                // $_SESSION['usernameguest'] = $datauser['username'];
                $_SESSION['nameuser'] = $result['FirstName_TH'] . "  " . $result['LastName_TH'];
                $_SESSION['emailuser'] = $result['StudentCode'] . '@up.ac.th';
                $_SESSION['ProgramName_TH'] = 'สาขา' . $result['ProgramName_TH'];
                // $_SESSION['pathimg'] = $datauser['pathimg'];
                $_SESSION['status'] = 'user';

                //**** เพิ่มข้อมูลผู้ใช้ลง ****//
                $userid = $_SESSION['usersid'];
                $name = $_SESSION['nameuser'];
                $email = $_SESSION['emailuser'];
                $branch = $_SESSION['ProgramName_TH'];
                $status = $_SESSION['status'];
                $img = 'default.png';
                $chkuser = DB::select("SELECT U_id FROM users WHERE U_id = '$userid'");
                if(isset($chkuser)?$chkuser:''){

                }else{
                    DB::INSERT("INSERT INTO users (U_id, name, email, branch, pathimg, status) VALUES ('$userid','$name','$email','$branch','$img','$status')");
                }

                $iduser = $_SESSION['usersid'];
                $chk_idpro = DB::select("SELECT * FROM projects WHERE projects.user_id='$iduser'");
                if (isset($chk_idpro) ? $chk_idpro : '') {
                    $_SESSION['project'] = 'BD';
                } else {
                }
                $_SESSION['message'] = "successlogin";
                return back();

            }
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        return back()->with('logout','success');
    }
}

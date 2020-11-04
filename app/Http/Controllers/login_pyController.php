<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Session;


class login_pyController extends Controller{

    public function auth_py(Request $request){
        session_start();
        $user_log = $_POST['username'];
        $pass_log = $_POST['password'];
        
     
        $chackadmin = DB::select("SELECT * FROM admin_company WHERE admin_company.admin_pass='$pass_log'");
        compact('chackadmin');
        foreach($chackadmin as $chackadmin){
            $idadmin = $chackadmin->admin_id;
            $useradmin = $chackadmin->admin_user;
            $pass = $chackadmin->admin_pass;
            $nameadmin = $chackadmin->admin_name;
            $emailadmin = $chackadmin->admin_email;
            $imgadmin = $chackadmin->pathimg;
            $statusadmin = $chackadmin->status;
           
        }
        // $pass = $chackadmin->admin_user;
        // print_r($chackadmin);
        if(isset($chackadmin)?$chackadmin:''){
            if($useradmin == $user_log){
                if($pass == $pass_log){
                    $_SESSION['adminid'] = $idadmin;
                    $_SESSION['adminauser'] = $useradmin;
                    $_SESSION['adminname'] = $nameadmin;
                    $_SESSION['adminemail'] = $emailadmin;
                    $_SESSION['pathimg'] = $imgadmin;
                    $_SESSION['statusA'] = $statusadmin;
                    $_SESSION['successloginadmin'] = "successloginadmin";
        
                    // echo $_SESSION['adminid'];
                
                    $iduser = $_SESSION['adminid'];
                    $chk_idpro = DB::select("SELECT * FROM admin_company WHERE admin_company.admin_pass='$iduser'");
                
                    if(isset($dataadmin)?$dataadmin:''){
                        $_SESSION['admin'] = 'admin';
                    }
                    }else{
                        $_SESSION['notpass'] = "null";
                        ?>
                        <script>
                            alert("ขออภัย ไม่สามารถเข้าสู่ระบบได้")
                        </script>
                        <?php
                        // echo 'ไม่ผ่าน';
                        return back();
                        // return redirect('homeadmin');
                        // header( "refresh: 0; url=/homeBD" );
                        // exit(0);
                    }
                    $_SESSION['message'] = "successlogin";
                    // // echo 'ผ่าน';
                    return redirect('homeadmin');
                }else{
                    ?>
                    <script>
                        alert("ขออภัย ไม่สามารถเข้าสู่ระบบได้")
                    </script>
                    <?php
                    return redirect('logout');
                    die();
                }
        }else{
            // chk user UP 
            $user = base64_encode($_POST['username']);
            $pass = base64_encode($_POST['password']);

            // require_once 'soaplib/nusoap.php';
            $wsdl = "https://ws.up.ac.th/mobile/AuthenService.asmx?WSDL";
            $method = "Login.";
            $soapaction = "http://tempuri.org/Login";
            $body = '<Login xmlns="http://tempuri.org/">';
            $body .= '<username>'.$user.'</username>';
            $body .= '<password>'.$pass.'</password>';
            $body .= '<ProductName>ictcoopsystem</ProductName>';
            $body .= '</Login>';

            $client = new \nusoap_client($wsdl, false);
            $client->decode_utf8 = false;
            $mysoapmsg = $client->serializeEnvelope($body,'',array(),'document','literal');	
            $response = $client->send($mysoapmsg,$soapaction);
            $result = $response['LoginResult'];
            session(['SID' => $result]);

            $res_chk_admin = DB::table('admin')->where([
                ['admin_upuser', '=', $user]
                ])->get();
            /// if official board teacher login
            if(!is_numeric($username) && $res_chk_admin->count() > 0 && !empty($result) ){
                //adminsystem,staff,teacher,director login

                        /*********************** GetStaffInfo **************************/
                        $wsdl = "https://ws.up.ac.th/mobile/StaffService.asmx?op=GetStaffInfo";
                        $method = "GetStaffInfo";
                        $soapaction = "http://tempuri.org/GetStaffInfo";
                        $body = '<GetStaffInfo   xmlns="http://tempuri.org/">';
                        $body .= '<sessionID>'.$request->session()->get('SID').'</sessionID>';
                        $body .= '</GetStaffInfo >';

                        $client = new \nusoap_client($wsdl, false);
                        $client->decode_utf8 = false;
                        $mysoapmsg=$client->serializeEnvelope($body,'',array(),'document','literal');	
                        $response=$client->send($mysoapmsg,$soapaction);
                        $result = $response['GetStaffInfoResult'];


                        session(['username' => $username]);
                        session(['FirstName_TH' => $result['FirstName_TH']]);
                        session(['LastName_TH' => $result['LastName_TH']]);
                        session(['Department' => $result['Department']]);
                        session(['Faculty' => $result['Faculty']]);
                        session(['Status' => $result['Status']]);
                        session(['GroupType' => $result['GroupType']]);
                        session(['logged_in' => "1"]);



                        // administratorsystem login
                        if($request->session()->get('Status')==="ปฏิบัติงาน"  ){
                            if($res_chk_admin[0]->admin_type==1){
                                return redirect('/administratorsystem');
                            } 
                            // staff login
                            else if( $res_chk_admin[0]->admin_type==2){
                                return redirect('/official');
                            } 
                            // teacher login
                            else if( $res_chk_admin[0]->admin_type==3){
                                return redirect('/director');
                            } 
                            // director login
                            else if( $res_chk_admin[0]->admin_type==4){
                                return redirect('/teacher');
                            }
                        }
            }
            // studentlogin
            else{
                /*********************** GetStudentInfo **************************/
                    $wsdl = "https://ws.up.ac.th/mobile/StudentService.asmx?WSDL";
                    $method = "GetStudentInfo";
                    $soapaction = "http://tempuri.org/GetStudentInfo";
                    $body = '<GetStudentInfo   xmlns="http://tempuri.org/">';
                    $body .= '<sessionID>'.$request->session()->get('SID').'</sessionID>';
                    $body .= '</GetStudentInfo >';

                    $client = new \nusoap_client($wsdl, false);
                    $client->decode_utf8 = false;
                    $mysoapmsg=$client->serializeEnvelope($body,'',array(),'document','literal');	
                    $response=$client->send($mysoapmsg,$soapaction);
                    @$result = $response['GetStudentInfoResult'];


                    session(['StudentCode' => $result['StudentCode']]);
                    session(['Title' => $result['Title']]);
                    session(['FirstName_TH' => $result['FirstName_TH']]);
                    session(['LastName_TH' => $result['LastName_TH']]);
                    session(['ProgramName_TH' => $result['ProgramName_TH']]);
                    session(['FacultyName_TH' => $result['FacultyName_TH']]);
                    session(['CurrentStatus' => $result['CurrentStatus']]);
                    session(['status_login' => "2"]);
                    session(['logged_in' => "1"]);
                    session(['user' => $result['StudentCode']]);
                    session(['name_stu' => $result['Title'].$result['FirstName_TH']."  ".$result['LastName_TH']]);





                    // var_dump($response);

                    // dd(session());
                    // die();


                    // echo "</pre>";


                    // echo $response_curl['status'];
                    
                    if( /* $response_curl['status'] == true */ $request->session()->get('logged_in') == 1){
                        return redirect('/student');
                    }else{
                        Session::flush();
                        return redirect('/');
                    }
                    } 
                }
            }
        
    
}

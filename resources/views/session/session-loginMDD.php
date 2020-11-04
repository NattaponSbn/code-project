

<?php 
    
    require('dbconnect.php');
    session_start();
    $user_log = $_POST['username'];
    // echo $username;
    $pass_log = $_POST['password'];

    if($user_log=='Adminmater'){
        $chackadmin = "SELECT * FROM admin_company WHERE admin_user = '$user_log' and admin_pass = '$pass_log'";
        $condb = mysqli_query($conn,$chackadmin);
        $dataadmin = mysqli_fetch_assoc($condb);
        if(isset($dataadmin['admin_pass']) ? $dataadmin['admin_pass']:''){
            $_SESSION['adminid'] = $dataadmin['admin_id'];
            $_SESSION['adminauser'] = $dataadmin['admin_user'];
            $_SESSION['adminname'] = $dataadmin['admin_name'];
            $_SESSION['adminemail'] = $dataadmin['admin_email'];
            $_SESSION['pathimg'] = $dataadmin['pathimg'];
            $_SESSION['statusA'] = $dataadmin['status'];
            $_SESSION['successloginadmin'] = "successloginadmin";
        
            $iduser = $_SESSION['adminid'];
            $chk_idpro = "SELECT * FROM admin_company WHERE admin_company.admin_pass='$iduser'";
            $condb = mysqli_query($conn,$chk_idpro);
            $dataadmin = mysqli_fetch_assoc($condb);
        
            if($dataadmin){
                $_SESSION['admin'] = 'admin';
            }

            $_SESSION['message'] = "successlogin";
            header( "refresh: 0; url=homeadmin" );
            exit(0);
        }else{
            $_SESSION['notpass'] = "null";
            // return back();
            header( "refresh: 0; url=homeBD" );
            exit(0);
        }
    }

    else {
        $chackuser = "SELECT * FROM users WHERE username = '$user_log' and password = '$pass_log'";
        // echo $chackuser;
        $condb = mysqli_query($conn,$chackuser);
        $datauser = mysqli_fetch_assoc($condb);
        
        if(isset($datauser['password']) ? $datauser['password']:''){
            $_SESSION['usersid'] = $datauser['U_id'];
            $_SESSION['usernameguest'] = $datauser['username'];
            $_SESSION['nameuser'] = $datauser['name'];
            $_SESSION['emailuser'] = $datauser['email'];
            $_SESSION['pathimg'] = $datauser['pathimg'];
            $_SESSION['status'] = $datauser['status'];
            $_SESSION['message'] = "successlogin";
            $iduser = $_SESSION['usersid'];
            $chk_idpro = "SELECT * FROM projectmdd WHERE projectmdd.user_id='$iduser'";
            $condb = mysqli_query($conn,$chk_idpro);
            $dataproject = mysqli_fetch_assoc($condb);
        
            if($dataproject){
                $_SESSION['project'] = 'MDD';
            }
            header( "refresh: 0; url=homeMDD" );
            exit(0);
        }else{
            $_SESSION['notpass'] = "null";
            header( "refresh: 0; url=homeMDD" );
            exit(0);
        }
        
        

        // echo $_SESSION['usernameguest'];
        // echo $status;
        
        
        

        // echo $_SESSION['datausername'];

    }

    
    
    
?>
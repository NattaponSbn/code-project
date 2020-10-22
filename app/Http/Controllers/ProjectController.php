<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use App\Imgproject;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use PhpParser\Node\Expr\Isset_;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class ProjectController extends Controller
{
    //เพิ่มข้อมูล project
    public function insertproject(Request $request) {
        $codeu = 'PB';
        $cont = count(DB::select("SELECT No_PB FROM projects"));
        $nextint = $cont+1;
        $string_id = substr("000".$nextint,-4);
        $nextid = $codeu.$string_id;

        $status_p = '0';

        $project = new Project;
        session_start();
        // $_SESSION['dataprject'] = 'project';
        $userid = $_SESSION['usersid'];
        $logo = 'defaultlogo.png';

        // function formatSizeUnits($bytes)
        // {
        //     if($bytes >= 1073741824){
        //     $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        // } elseif($bytes >= 1048576){
        //     $bytes = number_format($bytes / 1048576, 2) . ' MB';
        // } elseif ($bytes >= 1024){
        //     $bytes = number_format($bytes / 1024, 2) . ' KB';
        // } elseif ($bytes > 1){
        //     $bytes = $bytes . ' bytes';
        // } elseif ($bytes == 1){
        //     $bytes = $bytes . ' byte';
        // } else {
        //     $bytes = '-';
        // }
        // return $bytes;
        // }//Close Functions.

        $foder = 'project/fileproject/p_BD';
        $fileP = $request->file('fileproject');
        $filesize = $_FILES['fileproject']['size'];
        // $fileZ = number_format($filesize / 1048576, 2) . ' MB';
        // print_r($fileZ);
        // print_r($asd);
        $filename = $request->file('fileproject')->getClientOriginalName();
        $nameimg = '/'.rand() . '.' . $filename;
        $fileP->move(public_path($foder),$nameimg);
        $fileproject='/fileproject/p_BD'.$nameimg;

        // file_chk
        
        

        // //add keyword
        $keyword1 =$request->keyword_project_1;
        $keyword2 =$request->keyword_project_2;
        $keyword3 =$request->keyword_project_3;
        $keyword4 =$request->keyword_project_4;

        // keyword
        $kw1 = DB::select("SELECT * FROM keyword_p WHERE keyword_p.name_key LIKE '%$keyword1%'");
        $kw2 = DB::select("SELECT * FROM keyword_p WHERE keyword_p.name_key LIKE '%$keyword2%'");
        $kw3 = DB::select("SELECT * FROM keyword_p WHERE keyword_p.name_key LIKE '%$keyword3%'");
        $kw4 = DB::select("SELECT * FROM keyword_p WHERE keyword_p.name_key LIKE '%$keyword4%'");

        if(empty($kw1)) {
            $key = 'K';
            $countkw = count(DB::select("SELECT id FROM keyword_p"));
            $num = $countkw+1;
            $kw_id = substr("000".$num,-4);
            $keyword_id = $key.$kw_id;
            
            DB::INSERT("INSERT INTO keyword_p (keyp_id, name_key ) VALUES ('$keyword_id','$keyword1')");

            
        }
        if(empty($kw2)) {
            $key = 'K';
            $countkw = count(DB::select("SELECT id FROM keyword_p"));
            $num = $countkw+1;
            $kw_id = substr("000".$num,-4);
            $keyword_id = $key.$kw_id;
            DB::INSERT("INSERT INTO keyword_p (keyp_id, name_key ) VALUES ('$keyword_id','$keyword2')");
            
        }
        if(empty($kw3)) {
            $key = 'K';
            $countkw = count(DB::select("SELECT id FROM keyword_p"));
            $num = $countkw+1;
            $kw_id = substr("000".$num,-4);
            $keyword_id = $key.$kw_id;
            DB::INSERT("INSERT INTO keyword_p (keyp_id, name_key ) VALUES ('$keyword_id','$keyword3')");
            
        }
        if(empty($kw4)) {
            $key = 'K';
            $countkw = count(DB::select("SELECT id FROM keyword_p"));
            $num = $countkw+1;
            $kw_id = substr("000".$num,-4);
            $keyword_id = $key.$kw_id;
            DB::INSERT("INSERT INTO keyword_p (keyp_id, name_key ) VALUES ('$keyword_id','$keyword4')");
            
        }

        //add keyword to project
        $addkw1 = DB::select("SELECT * FROM keyword_p WHERE keyword_p.name_key LIKE '%$keyword1%'");
        $addkw2 = DB::select("SELECT * FROM keyword_p WHERE keyword_p.name_key LIKE '%$keyword2%'");
        $addkw3 = DB::select("SELECT * FROM keyword_p WHERE keyword_p.name_key LIKE '%$keyword3%'");
        $addkw4 = DB::select("SELECT * FROM keyword_p WHERE keyword_p.name_key LIKE '%$keyword4%'");
        // print_r($addkw4);

        if(isset($addkw1)){
            $keyid1 = $addkw1[0]->keyp_id;
        }
        if(isset($addkw2)){
            $keyid2 = $addkw2[0]->keyp_id;
        }
        if(isset($addkw3)){
            $keyid3 = $addkw3[0]->keyp_id;
        }
        if(isset($addkw4)){
            $keyid4 = $addkw4[0]->keyp_id;
        }

        // $item='example';
        // $tmp = exec("C:/xampp/htdocs/projectmange-code/resources/views/elasticsearch/querydata.py .$item");
        // echo $tmp;
    
        $project->project_id=$nextid;
        $project->user_id=$userid;
        $project->status_p=$status_p;
        $project->project_name=$request->project_name;
        $project->name_en=$request->project_name_en;
        $project->des_project=$request->des_project;
        // $dataproject->facebook=$request->facebook;
        // $dataproject->email=$request->email;
        // $dataproject->phone=$request->phone;
        $project->type_id=$request->type_project;
        $project->genre_id=$request->genre_project;
        $project->category_id=$request->category_project;
        $project->branch_id=$request->branch_project;
        $project->project_year=$request->year_project;
        $project->keyword_project1=$request->keyword_project_1;
        $project->keyword_project2=$request->keyword_project_2;
        $project->keyword_project3=$request->keyword_project_3;
        $project->keyword_project4=$request->keyword_project_4;
        if($request->owner_p1 !== ''){
            $owner_p1=$request->owner_p1;
        }else{
            $owner_p1 ='';
        }
        $project->owner_p1=$owner_p1;
        $project->owner_p2=$request->owner_p2;
        $project->owner_p3=$request->owner_p3;
        $project->owner_p4=$request->owner_p4;
        $project->advisor_p=$request->advisor_p;
        $project->logo=$logo;
        $project->file_p=$fileproject;
        $project->namefile=$filename;

        
        $project->save();

        //chk
        if(isset($_POST['fileproject_chk'])?$_POST['fileproject_chk']:''){
            $foderchk = 'project/fileproject/p_chk';
            $filePchk = $request->file('fileproject_chk');
            $filesize = $_FILES['fileproject_chk']['size'];
            $filenamechk = $request->file('fileproject_chk')->getClientOriginalName();
            $namechk = '/'.rand() . '.' . $filenamechk;
            $filePchk->move(public_path($foderchk),$namechk);
            $fileproject_chk='/fileproject/p_chk'.$namechk;
            DB::insert("INSERT INTO file_ad(id_projectA, fileA_name, fileA_path, fileA_size) VALUES ('$nextid','$filenamechk','$fileproject_chk','$filesize')");
        }else{

        }

        //file_ad
        if(isset($_POST['filead'])?$_POST['filead']:''){
            $foderad = 'project/fileproject/p_ad';
            $filePad = $request->file('filead');
            $filesize = $_FILES['filead']['size'];
            $filenamead = $request->file('filead')->getClientOriginalName();
            $namead = '/'.rand() . '.' . $filenamead;
            $filePad->move(public_path($foderad),$namead);
            $fileproject_ad='/fileproject/p_ad'.$namead;
            DB::insert("INSERT INTO file_ad(id_projectA, fileA_name, fileA_path, fileA_size) VALUES ('$nextid','$filenamead','$fileproject_ad','$filesize')");
        }else{
            $fileproject_ad='';
        }
        

        //file_slide
        if(isset($_POST['fileslide'])?$_POST['fileslide']:'') {
            $foderslide = 'project/fileproject/p_slide';
            $filePslide = $request->file('fileslide');
            $filesize = $_FILES['fileslide']['size'];
            $filenameslide = $request->file('fileslide')->getClientOriginalName();
            $nameslide = '/'.rand() . '.' . $filenameslide;
            $filePslide->move(public_path($foderslide),$nameslide);
            $fileproject_slide='/fileproject/p_slide'.$nameslide;
            DB::insert("INSERT INTO file_slide(id_projectS, fileS_name, fileS_path, fileS_size) VALUES ('$nextid','$filenameslide','$fileproject_slide','$filesize')");
        }else{
            $fileproject_slide='';
        }
        

        //file_post
        if(isset($_POST['filepost'])?$_POST['filepost']:'') {
            $foderpost = 'project/fileproject/p_post';
            $filePpost = $request->file('filepost');
            $filesize = $_FILES['filepost']['size'];
            $filenamepost = $request->file('filepost')->getClientOriginalName();
            $namepost = '/'.rand() . '.' . $filenamepost;
            $filePpost->move(public_path($foderpost),$namepost);
            $fileproject_post='/fileproject/p_post'.$namepost;
            DB::insert("INSERT INTO file_postter(id_projectP, fileP_name, fileP_path, fileP_size) VALUES ('$nextid','$filenamepost','$fileproject_post','$filesize')");
        }else{
            $fileproject_post='';
        }

        if($request->linkcode !== ''){
            $link = $request->linkcode;
            DB::insert("INSERT INTO link_code(id_projectL, path_code) VALUES ('$nextid','$link')");
        }else{
            $link='';
        }
       
        //รูปโปรเจค
        $imgproject1 = 'defaultimg1.png';
        $imgproject2 = 'defaultimg2.png';
        $imgproject3 = 'defaultimg3.png';
        $imgproject = new Imgproject;
        $imgproject->imp_p_1=$imgproject1;
        $imgproject->imp_p_2=$imgproject2;
        $imgproject->imp_p_3=$imgproject3;
        DB::INSERT("INSERT INTO img_project (img_p_1, img_p_2, img_p_3, p_id) VALUES ('$imgproject1','$imgproject1','$imgproject1','$nextid')");
        
        //เก็บค่า ดาว=0
        $codeu = 'R';
        $cont = count(DB::select("SELECT NO_R FROM rating_p"));
        $nextint = $cont+1;
        $string_id = substr("00".$nextint,-3);
        $nextidrate = $codeu.$string_id;
        $project_id=$nextid;
        $_SESSION['dataprject'] = 'project';
        $_SESSION['project'] = 'project';
        DB::INSERT("INSERT INTO rating_p(rating_id, rate_index, project_id) VALUES ('$nextidrate','0','$project_id')");

        DB::table('temp_keyword')->truncate();
        return redirect('homeBD')->with('successappproject', 'สร้างผลงานเรียบร้อย');
    }

    public function getdes_project(Request $request)
    {   
        
        // $des_p ="เว็ปไซต์เพื่อการศึกษาเกี่ยวกับการใช้งานAi หรือ IoT ในการช่วยเหลือการสื่อสารระหว่าง คนและAi";
        

        $des_p = $request->data1;
        DB::INSERT("INSERT INTO temp_des_p(des_p) VALUES ('$des_p')");
        $listkey = DB::select("SELECT DISTINCT name_key FROM temp_keyword ");
        // $des_text = "$des_p";
        // print_r($des_p);
        // $process = new Process("python3 C:/xampp/htdocs/projectmange-code/resources/views/elasticsearch/querydata.py \"{$des_p}\"");
        
        // $process = new Process(['ls', '-lsa']);
        // $process->run();

        // executes after the command finishes
        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }
        // $des_text = DB::SELECT("SELECT * FROM temp_des_p");
        // echo $process->getOutput();
        // DB::table('temp_des_p')->truncate();
        // return response()->json($des_text);
        
    }

    public function list_keyword(Request $request)
    {   

        $listkey = DB::select("SELECT * FROM temp_keyword ");
        
        session_start();
        if ($request->key1){
            
            if (isset($listkey[0])){
                $listkey1 = $listkey[0];
                
                $_SESSION['keyid1'] = 1 ;
                echo '<input type="text" class="rounded-0 border-info" name="keyword_project_1" id="keyword_project_1" value="'.$listkey1->name_key.'">';
            }else{
                echo '<input type="text" class="rounded-0 border-info" name="keyword_project_1" id="keyword_project_1" placeholder="ไม่พบคำสำคัญ กรุณากรอกข้อมูลลงในฟอร์มให้สมบูรณ์" >';
            }
        }
        if ($request->key2){
            if (isset($listkey[1])){
                $listkey2 = $listkey[1];
                $_SESSION['keyid2'] = 1 ;
                echo '<input type="text" class="rounded-0 border-info" name="keyword_project_2" id="keyword_project_2" value="'.$listkey2->name_key.'">';
            } else{
                echo '<input type="text" class="rounded-0 border-info" name="keyword_project_2" id="keyword_project_2" placeholder="ไม่พบคำสำคัญ กรุณากรอกข้อมูลลงในฟอร์มให้สมบูรณ์" >';
            }
        }
        if ($request->key3) {
            if (isset($listkey[2])){
                $listkey3 = $listkey[2];
                $_SESSION['keyid3'] = 1 ;
                echo '<input type="text" class="rounded-0 border-info" name="keyword_project_3" id="keyword_project_3" value="'.$listkey3->name_key.'">';
            } else{
                echo '<input type="text" class="rounded-0 border-info" name="keyword_project_3" id="keyword_project_3" placeholder="ไม่พบคำสำคัญ กรุณากรอกข้อมูลลงในฟอร์มให้สมบูรณ์">';
            }
        }   
        if ($request->key4){
            if (isset($listkey[3])){
                $listkey4 = $listkey[3];
                $_SESSION['keyid4'] = 1 ;
                echo '<input type="text" class="rounded-0 border-info" name="keyword_project_4" id="keyword_project_4" value="'.$listkey4->name_key.'">';
            } else{
                echo '<input type="text" class="rounded-0 border-info" name="keyword_project_4" id="keyword_project_4" placeholder="ไม่พบคำสำคัญ กรุณากรอกข้อมูลลงในฟอร์มให้สมบูรณ์">';
            }
        }    
            
        
        
    }

    public function des_project(Request $request){
        $dse = $request->data1;
        session_start();
        $_SESSION["key"] = "1";
        echo '<input type="text" class="rounded-0 border-info" name="keyword_project_1" id="keyword_project_1" value="'.$dse.'">';
    }

    public function keyword(Request $request)
    {
        if($request->key_p_1) {
            $key_p_1=$request->key_p_1;
            $chk_key = DB::select("SELECT * FROM keyword_p WHERE name_key LIKE '$key_p_1%' ");
            session_start();
            $key_1 = $_SESSION['key_p_1']=$key_p_1;
            if(isset($chk_key)?$chk_key:''){
                foreach ($chk_key as $chk_key) {
                    echo "<a href='#' class='list-group-item list-group-item-action border-1' style='width: 80%;'>".$chk_key->name_key."</a>";
                }
            }
            else{
                // echo "<p class='list-group-item border-1'>ไม่พบคำสำคัญ</p>";
            }
        }

        elseif($request->key_p_2){
            $key_p_2=$request->key_p_2;
            $chk_key = DB::select("SELECT * FROM keyword_p WHERE name_key LIKE '$key_p_2%' ");
         
            if(isset($chk_key)?$chk_key:''){
                foreach ($chk_key as $chk_key) {
                    echo "<a href='#' class='list-group-item list-group-item-action border-1' style='width: 80%;'>".$chk_key->name_key."</a>";
                }
            }
            else{
                // echo "<p class='list-group-item border-1'>ไม่พบคำสำคัญ</p>";
            }
        }

        elseif($request->key_p_3){
            $key_p_3=$request->key_p_3;
            $chk_key = DB::select("SELECT * FROM keyword_p WHERE name_key LIKE '$key_p_3%' ");
         
            if(isset($chk_key)?$chk_key:''){
                foreach ($chk_key as $chk_key) {
                    echo "<a href='#' class='list-group-item list-group-item-action border-1' style='width: 80%;'>".$chk_key->name_key."</a>";
                }
            }
            else{
                // echo "<p class='list-group-item border-1'>ไม่พบคำสำคัญ</p>";
            }
            
        }

        elseif($request->key_p_4){
            $key_p_4=$request->key_p_4;
            $chk_key = DB::select("SELECT * FROM keyword_p WHERE name_key LIKE '$key_p_4%' ");
         
            if(isset($chk_key)?$chk_key:''){
                foreach ($chk_key as $chk_key) {
                    echo "<a href='#' class='list-group-item list-group-item-action border-1' style='width: 80%;'>".$chk_key->name_key."</a>";
                }
            }
            else{
                // echo "<p class='list-group-item border-1'>ไม่พบคำสำคัญ</p>";
            }
            
        }
        else{
            // echo "<p class='list-group-item border-1'>ไม่พบคำสำคัญ2</p>";
        }
    }

    public function downloadfile(Request $request) {
        session_start();
        $project_id = $request->project_id;
        $rating = $request->rating;
        $userID = $_SESSION['usersid'];

        // $codeu = 'R';
        // $cont = count(DB::select("SELECT NO_R FROM rating_p"));
        // $nextint = $cont+1;
        // $string_id = substr("00".$nextint,-3);
        // $nextid = $codeu.$string_id;

        // DB::INSERT("INSERT INTO rating_p (rating_id, rate_index, project_id, users_id) VALUES ('$nextid','$rating','$project_id','$userID')");
        $file_p = DB::select("SELECT namefile,file_p FROM projects WHERE project_id='$project_id'");
        compact('file_p');
        foreach($file_p as $file_p){
            $file = $file_p->file_p;
            $namefile = $file_p->namefile;
        }
        $file_path = public_path('project/'.$file);

       
        // DB::INSERT("INSERT INTO login_log (login_user, login_ip, login_datetime, login_status, login_ontime) VALUES ('$userID','$ip','now()','d_file','1')");
        $ip = $_SERVER['REMOTE_ADDR'];
        DB::table('log_download')->insert(
            [
                'login_user' => $userID,
                'id_project' => $project_id,
                'login_ip' => $ip,
                'login_datetime' => now(),
                'login_status' => 'd_file',
                'login_ontime' => '1',
            ]
        );
        
        $resdown = response()->download($file_path,$namefile);
        return $resdown;
        

    }
   

    // dropdown show
    public function viewadd() {
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        $chk_year = DB::select("SELECT * FROM year_project");
        return view('project.addproject',compact('chk_type','chk_genre','chk_category','chk_branch','chk_year'));
    }

    // join หน้า detailprject เเละโชว์ข้อมูล project
    public function project($project_id) {
        session_start();
        $chkidproject = $_SESSION['usersid'];
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        $data = DB::select("SELECT * FROM type_project,genre_project,category_project,users,projects,img_project 
        WHERE users.U_id=projects.user_id and projects.project_id='$project_id' AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id 
        AND projects.category_id=category_project.category_id AND projects.project_id=img_project.p_id");
        // echo'<pre>';
        // print_r($data);
        // echo'</pre>';
        $datapubilc = DB::select("SELECT * FROM users WHERE U_id = '$chkidproject '");

        $dataimg = DB::select("SELECT * FROM img_project,projects WHERE projects.project_id=img_project.p_id and projects.project_id='$project_id'");
        // echo'<pre>';
        // print_r($dataimg);
        // echo'</pre>';
        $imglogoproject = DB::select("SELECT * FROM img_project,projects WHERE img_project.p_id=projects.project_id and project_id='$chkidproject'");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        $chk_year = DB::select("SELECT * FROM year_project");
        // print_r($chk_year);
        return view('project.detailproject',compact('data','chk_type','chk_genre','chk_category','chk_branch','imglogoproject','dataimg','datapubilc','imgaccount', 'adminaccount','chk_year'));
    }

    public function editproject(Request $request) {
        session_start();
        $chkidproject = $_SESSION['usersid'];
        $_SESSION['project'] = "successproject";

        $project_name = $request->input('project_name');
        $name_en = $request->input('project_name_en');
        $keyword_project = $request->input('keyword_project');
        $des_project = $request->input('des_project');
        $type_project = $request->input('type_project');
        $genre_project = $request->input('genre_project');
        $category_project = $request->input('category_project');
        $facebook = $request->input('facebook');
        $email = $request->input('email');
        $phone = $request->input('phone');
        
        DB::update("UPDATE users,projects SET project_name = '$project_name', name_en = '$name_en' , keyword_project ='$keyword_project', des_project ='$des_project', type_id ='$type_project',
        genre_id ='$genre_project', category_id ='$category_project', users.facebook = '$facebook', users.email = '$email', users.phone = '$phone' 
        , projects.updated_at = CURRENT_TIMESTAMP(), users.updated_at = CURRENT_TIMESTAMP() WHERE users.U_id=projects.user_id AND U_id='$chkidproject'");
        

        // upload logo project
        if(isset($_FILES['fileimg']['name']) || isset($_FILES['filelogo']['name'])) {
            $this->validate($request,
            ['filelogo' => 'required|image|mimes:png,jpeg|max:5048']);
            $foder = 'project\img_logo';
            $foderimg = 'project\img_backgrund';
            $filename = $request->file('filelogo')->getClientOriginalName();
            $nameimg = rand() . '.' . $filename;
            // $pathimg = $request->file('img')->store('imgaccount/',$nameimg);
            $pathimg = Image::make($request->file('filelogo'))->fit(170, 180, function ($constraint) {
                $constraint->aspectRatio();
            });
            $pathimg->save(public_path($foder. '/' .$nameimg));
            $logoproject=$nameimg;
            // count มาจากการที่เลือกภาพมากี่ภาพ
            $conut = count($_FILES['fileimg']['name']);

            for($i=0; $i<$conut; $i++) {
                // ทำการวน loop for จนครบ ตาม count 
                $name=$request->file('fileimg')[$i];
                // echo $name;
                $foder = 'project\img_backgrund';
                $filename =  $request->file('fileimg')[$i]->getClientOriginalName();
                $nameimg = rand() . '.' . $filename;
                
                $pathimg = Image::make($name)->fit(400, 250, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                $pathimg->save(public_path($foder. '/' .$nameimg));
                $fileimg = $nameimg;
                    // เมื่อ i ถึง ตำเเหน่งที่ 1 ให้ทำการเก็บค่า nameimg ไว้ใน fileimg0 เเล้วทำการอัพลง database
                if ($i == 0) {
                    $fileimg0=$nameimg;
                    DB::update("UPDATE users,projects,img_project SET img_p_1 = '$fileimg0' WHERE users.U_id=projects.user_id 
                    AND projects.user_id=img_project.p_id AND U_id='$chkidproject'");
                }; echo '<br>';
                if ($i == 1) {
                    $fileimg1=$nameimg;
                    DB::update("UPDATE projects,img_project SET img_p_2 = '$fileimg1'
                    WHERE projects.user_id=img_project.p_id AND img_project.p_id='$chkidproject'");
                };
                if ($i == 2) {
                    $fileimg2=$nameimg;
                    DB::update("UPDATE projects,img_project SET img_p_3 = '$fileimg2', img_project.updated_at = CURRENT_TIMESTAMP() 
                    WHERE projects.user_id=img_project.p_id AND img_project.p_id='$chkidproject'");
                };     
            }
        DB::update("UPDATE users,projects SET logo = '$logoproject', projects.updated_at = CURRENT_TIMESTAMP() WHERE users.U_id=projects.user_id AND U_id='$chkidproject'");
        return redirect('projectview')->with('successupdate', 'อัพเดทข้อมูลเรียบร้อย');
        }
    return redirect('projectview')->with('successupdate', 'อัพเดทข้อมูลเรียบร้อย');
    }

            // DB::update("UPDATE users,projects,img_project SET project_name = '$project_name', keyword_project ='$keyword_project', des_project ='$des_project', type_id ='$type_project',
            // genre_id ='$genre_project', category_id ='$category_project', logo = '$logoproject' img_p_1 = '$fileimg'  WHERE users.id=projects.user_id AND
            // projects.user_id=img_project.p_id AND id='$chkidproject'");
            // return redirect('projectview')->with('successupdate', 'อัพเดทข้อมูลเรียบร้อย');

    public function itemproject() {
        session_start();
        // $chkid = $_SESSION['usersid'];
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_type = DB::select("SELECT * FROM type_project");

        $chk_project = count(DB::select("SELECT No_PB FROM projects WHERE projects.status_p in ('1')"));
        if($chk_project>4){
            $sum_project = $chk_project;
        }else{$sum_project = '0';}
        
        //ดึง id มา เพื่อทำการเเยก id ที่มาจากการ by order วันที่สร้าง (ในเเท็กมาใหม่)
        $itemloop = DB::select("SELECT project_id FROM projects,type_project WHERE projects.type_id=type_project.type_id ORDER BY projects.created_at DESC");
        if(isset($itemloop)?$itemloop:''){
            $_SESSION['itemloop']='itemloop';
            if(isset($itemloop[0])? $itemloop[0]:'') {
                $item0 = $itemloop[0]; //เลือกตำเเหน่งของข้อมูล
                compact('item0'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
                foreach($item0 as $ite0){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                    // echo $ite0;
                    $ite0; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop 
                    // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                    $itemlp0 = DB::select("SELECT * FROM projects,type_project WHERE projects.type_id=type_project.type_id 
                    AND projects.project_id='$ite0'");  

                    //rateingproject

                    // $rate0 = DB::select("SELECT * FROM rating_p WHERE projects.type_id=type_project.type_id 
                    // AND projects.project_id='$ite0'");  

                    $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                    $svgrate0 = $svg0[0];
                    compact('svgrate0');
                    foreach($svgrate0 as $svgrate0){
                        $svgrate0 = round($svgrate0,$percision=1);
                    }

                    $view0 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite0'
                    GROUP BY login_log.login_project");
                    if(isset($view0)?$view0:''){
                        compact('view0');
                        foreach($view0 as $view0){
                            $viewcount0 = $view0->countview;
                        }
                    }else{
                        $viewcount0 = '0';
                        // print_r($viewcount0);
                    }
                    
                    // $view0 = DB::select("SELECT login_log ");
                    
                }
            }else {
                $itemlp0='';
                $viewcount0 = '';
                
            }

            
            if(isset($itemloop[1])? $itemloop[1]:'') {
                $item1 = $itemloop[1];
                compact('item1');
                foreach($item1 as $ite1){
                    // echo $ite1; echo '<br>';
                    $ite1;
                    $itemlp1 = DB::select("SELECT * FROM projects,type_project WHERE projects.type_id=type_project.type_id 
                    AND projects.project_id='$ite1'");
                    
                    $svg1 = DB::select("SELECT AVG(rate_index) FROM rating_p WHERE project_id='$ite1'");
                    $svgrate1 = $svg1[0];
                    compact('svgrate1');
                    foreach($svgrate1 as $svgrate1){
                        $svgrate1=round($svgrate1,$percision=1);;
                    }

                    $view1 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite1'
                    GROUP BY login_log.login_project");
                    if(isset($view1)?$view1:''){
                        compact('view1');
                        foreach($view1 as $view1){
                            $viewcount1 = $view1->countview;
                        }
                    }else{
                        $viewcount1 = '0';
                    }
                
                }
            }else {
                $itemlp1='';
                $viewcount1 = '';
            }
            
            if(isset($itemloop[2])? $itemloop[2]:'') {
                $item2 = $itemloop[2];
                compact('item2');
                foreach($item2 as $ite2){
                    // echo $ite2;
                    $ite2;
                    $itemlp2 = DB::select("SELECT * FROM projects,type_project WHERE projects.type_id=type_project.type_id 
                    AND projects.project_id='$ite2'");
                    
                    $svg2 = DB::select("SELECT AVG(rate_index) FROM rating_p WHERE project_id='$ite2'");
                    $svgrate2 = $svg2[0];
                    compact('svgrate2');
                    foreach($svgrate2 as $svgrate2){
                        $svgrate2=round($svgrate2,$percision=1);;
                    }

                    $view2 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite2'
                    GROUP BY login_log.login_project");
                    if(isset($view2)?$view2:''){
                        compact('view2');
                        foreach($view2 as $view2){
                            $viewcount2 = $view2->countview;
                        }
                    }else{
                        $viewcount2 = '0';
                    }
                }
            }else {
                $itemlp2='';
                $viewcount2 = '';
            }

            if(isset($itemloop[3])? $itemloop[3]:'') {
                $item3 = $itemloop[3];
                compact('item3');
                foreach($item3 as $ite3){
                    // echo $ite3;
                    $ite3;
                    $itemlp3 = DB::select("SELECT * FROM projects,type_project WHERE projects.type_id=type_project.type_id 
                    AND projects.project_id='$ite3'");
                    
                    $svg3 = DB::select("SELECT AVG(rate_index) FROM rating_p WHERE project_id='$ite3'");
                    $svgrate3 = $svg3[0];
                    compact('svgrate3');
                    foreach($svgrate3 as $svgrate3){
                        $svgrate3=round($svgrate3,$percision=1);;
                    }

                    $view3 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite3'
                    GROUP BY login_log.login_project");
                    if(isset($view3)?$view3:''){
                        compact('view3');
                        foreach($view3 as $view3){
                            $viewcount3 = $view3->countview;
                        }
                    }else{
                        $viewcount3 = '0';
                    }
                }
            }else {
                $itemlp3='';
                $viewcount3 = '';
            }

            if(isset($itemloop[4])? $itemloop[4]:'') {
                $item4 = $itemloop[4];
                compact('item4');
                foreach($item4 as $ite4){
                    // echo $ite3;
                    $ite4;
                    $itemlp4 = DB::select("SELECT * FROM projects,type_project WHERE projects.type_id=type_project.type_id 
                    AND projects.project_id='$ite4'");

                    $svg4 = DB::select("SELECT AVG(rate_index) FROM rating_p WHERE project_id='$ite4'");
                    $svgrate4 = $svg4[0];
                    compact('svgrate4');
                    foreach($svgrate4 as $svgrate4){
                        $svgrate4=round($svgrate4,$percision=1);;
                    }

                    $view4 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite4'
                    GROUP BY login_log.login_project");
                    if(isset($view4)?$view4:''){
                        compact('view4');
                        foreach($view4 as $view4){
                            $viewcount4 = $view4->countview;
                        }
                    }else{
                        $viewcount4 = '0';
                    }
                }
            }else {
                $itemlp4='';
                $viewcount4 = '';
            }
            
            if(isset($itemloop[5])? $itemloop[5]:'') {
                $item5 = $itemloop[5];
                compact('item5');
                foreach($item5 as $ite5){
                    // echo $ite3;
                    $ite5;
                    $itemlp5 = DB::select("SELECT * FROM projects,type_project WHERE projects.type_id=type_project.type_id 
                    AND projects.project_id='$ite5'");

                    $svg5 = DB::select("SELECT AVG(rate_index) FROM rating_p WHERE project_id='$ite5'");
                    $svgrate5 = $svg5[0];
                    compact('svgrate5');
                    foreach($svgrate5 as $svgrate5){
                        $svgrate5=round($svgrate5,$percision=1);;
                    }

                    $view5 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite5'
                    GROUP BY login_log.login_project");
                    if(isset($view5)?$view5:''){
                        compact('view5');
                        foreach($view5 as $view5){
                            $viewcount5 = $view5->countview;
                        }
                    }else{
                        $viewcount5 = '0';
                    }

                    
                }
            }else {
                $itemlp5='';
                $viewcount5 = '';
            }
            
            if(isset($itemloop[6])? $itemloop[6]:'') {
                $item6 = $itemloop[6];
                compact('item6');
                foreach($item6 as $ite6){
                    // echo $ite3;
                    $ite6;
                    $itemlp6 = DB::select("SELECT * FROM projects,type_project WHERE projects.type_id=type_project.type_id 
                    AND projects.project_id='$ite6'");
                    $svg6 = DB::select("SELECT AVG(rate_index) FROM rating_p WHERE project_id='$ite6'");
                    $svgrate6 = $svg6[0];
                    compact('svgrate6');
                    foreach($svgrate6 as $svgrate6){
                        $svgrate6=round($svgrate6,$percision=1);;
                    }

                    $view6 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite6'
                    GROUP BY login_log.login_project");
                    if(isset($view6)?$view6:''){
                        compact('view6');
                        foreach($view6 as $view6){
                            $viewcount6 = $view6->countview;
                        }
                    }else{
                        $viewcount6 = '0';
                    }
                }
            }else {
                $itemlp6='';
                $viewcount6 = '';
            }
            
            if(isset($itemloop[7])? $itemloop[7]:'') {
                $item7 = $itemloop[7];
                compact('item7');
                foreach($item7 as $ite7){
                    // echo $ite3;
                    $ite7;
                    $itemlp7 = DB::select("SELECT * FROM projects,type_project WHERE projects.type_id=type_project.type_id 
                    AND projects.project_id='$ite7'");

                    $svg7 = DB::select("SELECT AVG(rate_index) FROM rating_p WHERE project_id='$ite7'");
                    $svgrate7 = $svg7[0];
                    compact('svgrate7');
                    foreach($svgrate7 as $svgrate7){
                        $svgrate7=round($svgrate7,$percision=1);;
                    }

                    $view7 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite7'
                    GROUP BY login_log.login_project");
                    if(isset($view7)?$view7:''){
                        compact('view7');
                        foreach($view7 as $view7){
                            $viewcount7 = $view7->countview;
                        }
                    }else{
                        $viewcount7 = '0';
                    }
                }
            }else {
                $itemlp7='';
                $viewcount7 = '';
            }
            
            if(isset($itemloop[8])? $itemloop[8]:'') {
                $item8 = $itemloop[8];
                compact('item8');
                foreach($item8 as $ite8){
                    // echo $ite3;
                    $ite8;
                    $itemlp8 = DB::select("SELECT * FROM projects,type_project WHERE projects.type_id=type_project.type_id 
                    AND projects.project_id='$ite8'");

                    $svg8 = DB::select("SELECT AVG(rate_index) FROM rating_p WHERE project_id='$ite8'");
                    $svgrate8 = $svg8[0];
                    compact('svgrate8');
                    foreach($svgrate8 as $svgrate8){
                        $svgrate8=round($svgrate8,$percision=1);;
                    }

                    $view8 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite8'
                    GROUP BY login_log.login_project");
                    if(isset($view8)?$view8:''){
                        compact('view8');
                        foreach($view8 as $view8){
                            $viewcount8 = $view8->countview;
                        }
                    }else{
                        $viewcount8 = '0';
                    }
                    
                }
            }else {
                $itemlp8='';
                $viewcount8 = '';
            }
        }else{
            $itemloop='';
            $viewcount0 = '';
            $viewcount1 = '';
            $viewcount2 = '';
            $viewcount3 = '';
            $viewcount4 = '';
            $viewcount5 = '';
            $viewcount6 = '';
            $viewcount7 = '';
            $viewcount8 = '';
        }

        //genre(ไอโอที(IoT)) item 
        $chk_project_type = count(DB::select("SELECT No_PB FROM projects,genre_project WHERE projects.status_p in ('1') AND projects.genre_id=genre_project.genre_id AND genre_project.genre_name in ('ไอโอที(IoT)')"));
        if($chk_project_type>4){
            $sum_type_p = $chk_project_type;
        }else{$sum_type_p = '0';}

        $itemgenre = DB::select("SELECT project_id FROM projects,genre_project,type_project WHERE genre_project.genre_name in ('ไอโอที(IoT)') AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id ORDER BY projects.created_at ASC");
        if(isset($itemgenre)?$itemgenre:''){
            $_SESSION['itemgenre']='itemgenre';
            if(isset($itemgenre[0])? $itemgenre[0]:'') {
                $item0 = $itemgenre[0]; //เลือกตำเเหน่งของข้อมูล
                compact('item0'); // ส่งค่า item0 จากการเลือกตำเเหน่ง
                foreach($item0 as $ite0){ // ทำการวง loop foreach เพื่อ เอาค่า id ออกจาก array
                    // echo $ite0;
                    $ite0; // id ของ ตำเเหน่งที่ 0 ที่ได้มาจากการ loop
                    // หลังจากได้ id ที่ เป็น str ก็นำมา select จาก database ทีละ id เเล้วส่งค่าไปแสดงผลหน้า homeBD
                    $itemlg0 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id 
                    AND projects.project_id='$ite0'"); 

                    $svg0 = DB::select("SELECT AVG(rate_index) FROM rating_p WHERE project_id='$ite0'");
                    $svgrateg0 = $svg0[0];
                    compact('svgrateg0');
                    foreach($svgrateg0 as $svgrateg0){
                        $svgrateg0=round($svgrateg0,$percision=1);;
                    }

                    $view0 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite0'
                    GROUP BY login_log.login_project");
                    compact('view0');
                    foreach($view0 as $view0){
                        $viewcountg0 = $view0->countview;
                    }
                }
                
            }else {
                $itemlg0='';
                $viewcountg0='';
            }

            if(isset($itemgenre[1])?$itemgenre[1]:''){
                $item1 = $itemgenre[1];
                compact('item1');
                foreach($item1 as $ite1){
                    // echo $ite1;

                    $ite1;
                    $itemlg1 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                    AND projects.project_id='$ite1'");

                    $svg1 = DB::select("SELECT AVG(rate_index) FROM rating_p WHERE project_id='$ite1'");
                    $svgrateg1 = $svg1[0];
                    compact('svgrateg1');
                    foreach($svgrateg1 as $svgrateg1){
                        $svgrateg1=round($svgrateg1,$percision=1);;
                    }

                    $view1 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite1'
                    GROUP BY login_log.login_project");
                    if(isset($view1)?$view1:''){
                        compact('view1');
                        foreach($view1 as $view1){
                            $viewcountg1 = $view1->countview;
                        }
                    }else{
                        $viewcountg1='0';
                    }
                    
                }
                
            }else {
                $itemlg1='';
                $viewcountg1='';
            }
        
            if(isset($itemgenre[2])?$itemgenre[2]:''){
                $item2 = $itemgenre[2];
                compact('item2');
                foreach($item2 as $ite2){
                    // echo $ite2;
                    $ite2;
                    $itemlg2 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                    AND projects.project_id='$ite2'");

                    $svg2 = DB::select("SELECT AVG(rate_index) FROM rating_p WHERE project_id='$ite2'");
                    $svgrateg2 = $svg2[0];
                    compact('svgrateg2');
                    foreach($svgrateg2 as $svgrateg2){
                        $svgrateg2=round($svgrateg2,$percision=1);;
                    }

                    $view2 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite2'
                    GROUP BY login_log.login_project");
                    if(isset($view2)?$view2:''){
                        compact('view2');
                        foreach($view2 as $view2){
                            $viewcountg2 = $view2->countview;
                        }
                    }else{
                        $viewcountg2='0';
                    }
                }
            }else {
                $itemlg2='';
                $viewcountg2='';
            }
            
            if(isset($itemgenre[3])?$itemgenre[3]:''){
                $item3 = $itemgenre[3];
                compact('item3');
                foreach($item3 as $ite3){
                    // echo $ite3;
                    $ite3;
                    $itemlg3 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                    AND projects.project_id='$ite3'");

                    $svg3 = DB::select("SELECT AVG(rate_index) FROM rating_p WHERE project_id='$ite3'");
                    $svgrateg3 = $svg3[0];
                    compact('svgrateg3');
                    foreach($svgrateg3 as $svgrateg3){
                        $svgrateg3=round($svgrateg3,$percision=1);;
                    }

                    $view3 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite3'
                    GROUP BY login_log.login_project");
                    if(isset($view3)?$view3:''){
                        compact('view3');
                        foreach($view3 as $view3){
                            $viewcountg3 = $view3->countview;
                        }
                    }else{
                        $viewcountg3='0';
                    }
                }
            }else {
                $itemlg3='';
                $viewcountg3='';
            }

            if(isset($itemgenre[4])?$itemgenre[4]:''){
                $item4 = $itemgenre[4];
                compact('item4');
                foreach($item4 as $ite4){
                    // echo $ite3;
                    $ite4;
                    $itemlg4 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                    AND projects.project_id='$ite4'");

                    $svg4 = DB::select("SELECT AVG(rate_index) FROM rating_p WHERE project_id='$ite4'");
                    $svgrateg4 = $svg4[0];
                    compact('svgrateg4');
                    foreach($svgrateg4 as $svgrateg4){
                        $svgrateg4=round($svgrateg4,$percision=1);;
                    }

                    $view4 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite4'
                    GROUP BY login_log.login_project");
                    if(isset($view4)?$view4:''){
                        compact('view4');
                        foreach($view4 as $view4){
                            $viewcountg4 = $view4->countview;
                        }
                    }else{
                        $viewcountg4='0';
                    }
                }
            }else {
                $itemlg4='';
                $viewcountg4='';
            }

            if(isset($itemgenre[5])?$itemgenre[5]:''){
                $item5 = $itemgenre[5];
                compact('item5');
                foreach($item5 as $ite5){
                    // echo $ite3;
                    $ite5;
                    $itemlg5 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                    AND projects.project_id='$ite5'");

                    $svg5 = DB::select("SELECT AVG(rate_index) FROM rating_p WHERE project_id='$ite5'");
                    $svgrateg5 = $svg5[0];
                    compact('svgrateg5');
                    foreach($svgrateg5 as $svgrateg5){
                        $svgrateg5=round($svgrateg5,$percision=1);;
                    }

                    $view5 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite5'
                    GROUP BY login_log.login_project");
                    if(isset($view5)?$view5:''){
                        compact('view5');
                        foreach($view5 as $view5){
                            $viewcountg5 = $view5->countview;
                            echo $viewcountg5;
                            echo '1';
                        }
                    }else{
                        $viewcountg5='0';
                        
                    }
                }
            }else {
                $itemlg5='';
                $viewcountg5='';
            }

            if(isset($itemgenre[6])?$itemgenre[6]:''){
                $item6 = $itemgenre[6];
                compact('item6');
                foreach($item6 as $ite6){
                    // echo $ite3;
                    $ite6;
                    $itemlg6 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                    AND projects.project_id='$ite6'");

                    $svg6 = DB::select("SELECT AVG(rate_index) FROM rating_p WHERE project_id='$ite6'");
                    $svgrateg6 = $svg6[0];
                    compact('svgrateg6');
                    foreach($svgrateg6 as $svgrateg6){
                        $svgrateg6=round($svgrateg6,$percision=1);;
                    }

                    $view6 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite6'
                    GROUP BY login_log.login_project");
                    if(isset($view6)?$view6:''){
                        compact('view6');
                        foreach($view6 as $view6){
                            $viewcountg6 = $view6->countview;
                        }
                    }else{
                        $viewcountg6='0';
                    }
                }
            }else {
                $itemlg6='';
                $viewcountg6 = '';
            }

            if(isset($itemgenre[7])?$itemgenre[7]:''){
                $item7 = $itemgenre[7];
                compact('item7');
                foreach($item7 as $ite7){
                    // echo $ite3;
                    $ite7;
                    $itemlg7 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                    AND projects.project_id='$ite7'");

                    $svg7 = DB::select("SELECT AVG(rate_index) FROM rating_p WHERE project_id='$ite7'");
                    $svgrateg7 = $svg7[0];
                    compact('svgrateg7');
                    foreach($svgrateg7 as $svgrateg7){
                        $svgrateg7=round($svgrateg7,$percision=1);;
                    }

                    $view7 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                    WHERE projects.project_id=login_log.login_project AND projects.project_id='$ite7'
                    GROUP BY login_log.login_project");
                    if(isset($view7)?$view7:''){
                        compact('view7');
                        foreach($view7 as $view7){
                            $viewcountg7 = $view7->countview;
                        }
                    }else{
                        $viewcountg7='0';
                    }
                }
            }else {
                $itemlg7='';
                $viewcountg7='';
            }
        }else{
            $itemgenre='';
        }
        
        //poppulay item 
        $chk_p_pop = count(DB::select("SELECT project_id, AVG(rate_index) ratesum FROM rating_p GROUP BY project_id HAVING ratesum >=3 ORDER BY AVG(rate_index) DESC"));
        // echo $chk_p_pop;
        if($chk_p_pop>4){
            $sum_pop_p = $chk_p_pop;
        }else{$sum_pop_p = '0';}

        
        $itempop = DB::select("SELECT login_project,COUNT(login_project) AS countview FROM login_log GROUP BY login_project ORDER BY COUNT(login_project) DESC");
        // echo '<pre>';
        // print_r($itempop);
        // echo '</pre>';
        if(isset($itempop)?$itempop:''){
            $_SESSION['itempop']='itempop';
            if(isset($itempop[0])? $itempop[0]:'') {
                $item0 = $itempop[0]; //เลือกตำเเหน่งของข้อมูล
                // print_r($item0);
                $pop0 = $item0->login_project;
                
                $itempop0 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id 
                AND projects.project_id='$pop0'"); 
                // print_r($itemlpop0);

                $itemp0 = DB::select("SELECT AVG(rate_index) ratesum FROM rating_p,projects WHERE projects.project_id=rating_p.project_id AND projects.project_id='$pop0' GROUP BY rating_p.project_id ");
                if(isset($itemp0)?$itemp0:''){
                    compact('itemp0');
                    foreach($itemp0 as $itemp0){
                        $avgpop0 = round($itemp0->ratesum,$percision=1);
                    }
                }else{
                    $avgpop0 = '0';
                }
                

                $view0 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                WHERE projects.project_id=login_log.login_project AND projects.project_id='$pop0'
                GROUP BY login_log.login_project");
                if(isset($view0)?$view0:''){
                    compact('view0');
                    foreach($view0 as $view0){
                        $viewcountp0 = $view0->countview;
                    }
                }else{
                    $viewcountp0='0';
                }

            }else {
                $itemlg0='';
                $avgpop0='';
                $viewcountp0='';
            }

            if(isset($itempop[1])?$itempop[1]:''){
                $item1 = $itempop[1];
                $pop1 = $item1->login_project;
                // $avgpop1 = round($item1->ratesum,$percision=1);
                $itempop1 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.project_id='$pop1'");
                // echo'<pre>';
                // print_r($itempop1);
                // echo'</pre>';

                $itemp1 = DB::select("SELECT AVG(rate_index) ratesum FROM rating_p,projects WHERE projects.project_id=rating_p.project_id AND projects.project_id='$pop1' GROUP BY rating_p.project_id ");
                if(isset($itemp1)?$itemp1:''){
                    compact('itemp1');
                    foreach($itemp1 as $itemp1){
                        $avgpop1 = round($itemp1->ratesum,$percision=1);
                    }
                }else{
                    $avgpop1 = '0';
                }

                $view1 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                WHERE projects.project_id=login_log.login_project AND projects.project_id='$pop1'
                GROUP BY login_log.login_project");
                if(isset($view1)?$view1:''){
                    compact('view1');
                    foreach($view1 as $view1){
                        $viewcountp1 = $view1->countview;
                    }
                }else{
                    $viewcountp1='0';
                }
                
            }else {
                $itemlg1='';
                $viewcountp1='';
                $avgpop1='';
            }
        
            if(isset($itempop[2])?$itempop[2]:''){
                $item2 = $itempop[2];
                $pop2 = $item2->login_project;
                // $avgpop2 = round($item2->ratesum,$percision=1);
                $itempop2 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.project_id='$pop2'");

                $itemp2 = DB::select("SELECT AVG(rate_index) ratesum FROM rating_p,projects WHERE projects.project_id=rating_p.project_id AND projects.project_id='$pop2' GROUP BY rating_p.project_id ");
                if(isset($itemp2)?$itemp2:''){
                    compact('itemp2');
                    foreach($itemp2 as $itemp2){
                        $avgpop2 = round($itemp2->ratesum,$percision=1);
                    }
                }else{
                    $avgpop2 = '0';
                }

                $view2 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                WHERE projects.project_id=login_log.login_project AND projects.project_id='$pop2'
                GROUP BY login_log.login_project");
                if(isset($view2)?$view2:''){
                    compact('view2');
                    foreach($view2 as $view2){
                        $viewcountp2 = $view2->countview;
                    }
                }else{
                    $viewcountp2='0';
                }

            }else {
                $itemlg2='';
                $viewcountp2='';
                $avgpop2 = '';
            }
            
            if(isset($itempop[3])?$itempop[3]:''){
                $item3 = $itempop[3];
                $pop3 = $item3->login_project;
                // $avgpop3 = round($item3->ratesum,$percision=1);
                $itempop3 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.project_id='$pop3'");

                $itemp3 = DB::select("SELECT AVG(rate_index) ratesum FROM rating_p,projects WHERE projects.project_id=rating_p.project_id AND projects.project_id='$pop3' GROUP BY rating_p.project_id ");
                if(isset($itemp3)?$itemp3:''){
                    compact('itemp3');
                    foreach($itemp3 as $itemp3){
                        $avgpop3 = round($itemp3->ratesum,$percision=1);
                    }
                }else{
                    $avgpop3 = '0';
                }

                $view3 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                WHERE projects.project_id=login_log.login_project AND projects.project_id='$pop3'
                GROUP BY login_log.login_project");
                if(isset($view3)?$view3:''){
                    compact('view3');
                    foreach($view3 as $view3){
                        $viewcountp3 = $view3->countview;
                    }
                }else{
                    $viewcountp3='0';
                }

            }else {
                $itemlg3='';
                $viewcountp3='';
                $avgpop3 = '';
            }

            if(isset($itempop[4])?$itempop[4]:''){
                $item4 = $itempop[4];
                $pop4 = $item4->login_project;
                // $avgpop4 = round($item4->ratesum,$percision=1);
                $itempop4 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.project_id='$pop4'");

                $itemp4 = DB::select("SELECT AVG(rate_index) ratesum FROM rating_p,projects WHERE projects.project_id=rating_p.project_id AND projects.project_id='$pop4' GROUP BY rating_p.project_id ");
                if(isset($itemp4)?$itemp4:''){
                    compact('itemp4');
                    foreach($itemp4 as $itemp4){
                        $avgpop4 = round($itemp4->ratesum,$percision=1);
                    }
                }else{
                    $avgpop4 = '0';
                }

                $view4 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                WHERE projects.project_id=login_log.login_project AND projects.project_id='$pop4'
                GROUP BY login_log.login_project");
                if(isset($view4)?$view4:''){
                    compact('view4');
                    foreach($view4 as $view4){
                        $viewcountp4 = $view4->countview;
                    }
                }else{
                    $viewcountp4='0';
                }
        
            }else {
                $itemlg4='';
                $viewcountp4='';
                $avgpop4 = '';
            }

            if(isset($itempop[5])?$itempop[5]:''){
                $item5 = $itempop[5];
                $pop5 = $item5->login_project;
                // $avgpop5 = round($item5->ratesum,$percision=1);
                $itempop5 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.project_id='$pop5'");

                $itemp5 = DB::select("SELECT AVG(rate_index) ratesum FROM rating_p,projects WHERE projects.project_id=rating_p.project_id AND projects.project_id='$pop5' GROUP BY rating_p.project_id ");
                if(isset($itemp5)?$itemp5:''){
                    compact('itemp5');
                    foreach($itemp5 as $itemp5){
                        $avgpop5 = round($itemp5->ratesum,$percision=1);
                    }
                }else{
                    $avgpop5 = '0';
                }

                $view5 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                WHERE projects.project_id=login_log.login_project AND projects.project_id='$pop5'
                GROUP BY login_log.login_project");
                if(isset($view5)?$view5:''){
                    compact('view5');
                    foreach($view5 as $view5){
                        $viewcountp5 = $view5->countview;
                    }
                }else{
                    $viewcountp5='0';
                }

            }else {
                $itemlg5='';
                $viewcountp5='';
                $avgpop5 = '';
            }

            if(isset($itempop[6])?$itempop[6]:''){
                $item6 = $itempop[6];
                $pop6 = $item6->login_project;
                // $avgpop6 = round($item6->ratesum,$percision=1);
                $itempop6 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.project_id='$pop6'");

                $itemp6 = DB::select("SELECT AVG(rate_index) ratesum FROM rating_p,projects WHERE projects.project_id=rating_p.project_id AND projects.project_id='$pop6' GROUP BY rating_p.project_id ");
                if(isset($itemp6)?$itemp6:''){
                    compact('itemp6');
                    foreach($itemp6 as $itemp6){
                        $avgpop6 = round($itemp6->ratesum,$percision=1);
                    }
                }else{
                    $avgpop6 = '0';
                }

                $view6 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                WHERE projects.project_id=login_log.login_project AND projects.project_id='$pop6'
                GROUP BY login_log.login_project");
                if(isset($view6)?$view6:''){
                    compact('view6');
                    foreach($view6 as $view6){
                        $viewcountp6 = $view6->countview;
                    }
                }else{
                    $viewcountp6='0';
                }

            }else {
                $itemlg6='';
                $viewcountp6='';
                $avgpop6 = '';
            }

            if(isset($itempop[7])?$itempop[7]:''){
                $item7 = $itempop[7];
                $pop7 = $item7->login_project;
                // $avgpop7 = round($item7->ratesum,$percision=1);
                $itempop7 = DB::select("SELECT * FROM projects,genre_project,type_project WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.project_id='$pop7'");

                $itemp7 = DB::select("SELECT AVG(rate_index) ratesum FROM rating_p,projects WHERE projects.project_id=rating_p.project_id AND projects.project_id='$pop7' GROUP BY rating_p.project_id ");
                if(isset($itemp7)?$itemp7:''){
                    compact('itemp7');
                    foreach($itemp7 as $itemp7){
                        $avgpop7 = round($itemp7->ratesum,$percision=1);
                    }
                }else{
                    $avgpop7 = '0';
                }

                $view7 = DB::select("SELECT COUNT(login_log.login_project) AS countview FROM login_log,projects 
                WHERE projects.project_id=login_log.login_project AND projects.project_id='$pop7'
                GROUP BY login_log.login_project");
                if(isset($view7)?$view7:''){
                    compact('view7');
                    foreach($view7 as $view7){
                        $viewcountp7 = $view7->countview;
                        if(isset($viewcountp7)?$viewcountp7:''){
                            
                        }else{
                            $viewcountp7 = $view7->countview;
                        }
                    }
                }else{
                    $viewcountp7='0';
                }

            }else {
                $itemlg7='';
                $viewcountp7='';
                $avgpop7 = '';
            }
        }else{
            $itempop='';
        }

        // $chk_genre = DB::select("SELECT * FROM genre_project");
        // $chk_category = DB::select("SELECT * FROM category_project");
        // $chk_type = DB::select("SELECT * FROM type_project");

        return view('homeBD',compact('itemloop','itemgenre','itempop','itemlp0','itemlp1','itemlp2','itemlp3','itemlp4','itemlp5','itemlp6','itemlp7','itemlp8',
        'viewcount0','viewcount1','viewcount2','viewcount3','viewcount4','viewcount5','viewcount6','viewcount7','viewcount8',
        'itemlg0','itemlg1','itemlg2','itemlg3','itemlg4','itemlg5','itemlg6','itemlg7',
        'viewcountg0','viewcountg1','viewcountg2','viewcountg3','viewcountg4','viewcountg5','viewcountg6','viewcountg7',
        'imgaccount','adminaccount','itemgenre','sum_type_p','sum_project',
        'viewcountp0','viewcountp1','viewcountp2','viewcountp3','viewcountp4','viewcountp5','viewcountp6','viewcountp7',
        'svgrate0','svgrate1','svgrate2','svgrate3','svgrate4','svgrate5','svgrate6','svgrate7','svgrateg0','svgrateg1','svgrateg2','svgrateg3',
        'itempop0','itempop1','itempop2','itempop3','itempop4','avgpop0','avgpop1','avgpop2','avgpop3','avgpop4','sum_pop_p','chk_genre','chk_category','chk_type'));
    }

    public function detailitem($project_id){
        session_start();
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $item  = DB::select("SELECT * FROM type_project,genre_project,category_project,users,projects,img_project 
        WHERE users.U_id=projects.user_id AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id 
        AND projects.category_id=category_project.category_id AND projects.project_id=img_project.p_id AND projects.project_id = '$project_id'"  );
        // print_r($item);
        $itemadmin  = DB::select("SELECT * FROM admin_company,owner_project,projects,type_project,genre_project,category_project
        WHERE owner_project.owner_id=projects.user_id AND admin_company.admin_id=projects.ad_id AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id 
        AND projects.category_id=category_project.category_id AND projects.project_id = '$project_id'"  );
        // print_r($itemadmin);
        $imgback = DB::select("SELECT * FROM projects,img_project WHERE projects.project_id=img_project.p_id AND projects.project_id = '$project_id'");
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_type = DB::select("SELECT * FROM type_project");

        //chklog ที่เคยดาวน์โหลดไฟล์
        if(isset($_SESSION['usersid'])?$_SESSION['usersid']:''){
            $id = $_SESSION['usersid'];
            $chk_logdown = DB::select("SELECT login_user,id_project FROM log_download,users,projects 
            WHERE users.U_id=log_download.login_user AND projects.project_id=log_download.id_project 
            AND log_download.login_user='$id' AND log_download.id_project='$project_id';
            ");
            if(isset($chk_logdown)?$chk_logdown:''){
                // print_r($chk_logdown);
                $_SESSION['download']='ok';
            }
            else{

            }
        }else{

        }
        
        //log
        if(isset($_SESSION['usersid'])?$_SESSION['usersid']:''){
            $ip = $_SERVER['REMOTE_ADDR'];
            DB::table('login_log')->insert(
                [
                    'login_user' => $_SESSION['usersid'],
                    'login_project' => $project_id,
                    'login_ip' => $ip,
                    'login_datetime' => now(),
                    'login_status' => 'view',
                    'login_ontime' => '1',
                ]
            );
        }
        

        return view('project.itemdetaliBD',compact('item','project_id','imgback','itemadmin','imgaccount','adminaccount','chk_genre','chk_category','chk_type'));
    }

    public function detailitemmdd($project_m_id){
        session_start();
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $item  = DB::select("SELECT * FROM type_project,genre_project,category_project,users,projectmdd
        WHERE users.U_id=projectmdd.user_id AND projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id 
        AND projectmdd.category_id=category_project.category_id AND projectmdd.project_m_id = '$project_m_id'"  );
        

        $itemadmin  = DB::select("SELECT * FROM admin_company,owner_projectmdd,projectmdd,type_project,genre_project,category_project
        WHERE owner_projectmdd.owner_m_id=projectmdd.user_id AND admin_company.admin_id=projectmdd.adm_id AND projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id 
        AND projectmdd.category_id=category_project.category_id AND projectmdd.project_m_id = '$project_m_id'"  );

        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");

        if(isset($_SESSION['usersid'])?$_SESSION['usersid']:''){
            $id = $_SESSION['usersid'];
            $chk_logdown = DB::select("SELECT login_user,id_project FROM log_download,users,projectmdd 
            WHERE users.U_id=log_download.login_user AND projectmdd.project_m_id=log_download.id_project 
            AND log_download.login_user='$id' AND log_download.id_project='$project_m_id';
            ");
            if(isset($chk_logdown)?$chk_logdown:''){
                // print_r($chk_logdown);
                $_SESSION['downloadmdd']='ok';
            }
            else{

            }
        }else{

        }

        if(isset($_SESSION['usersid'])?$_SESSION['usersid']:''){
            $ip = $_SERVER['REMOTE_ADDR'];
            DB::table('login_logmdd')->insert(
                [
                    'login_user' => $_SESSION['usersid'],
                    'login_project' => $project_m_id,
                    'login_ip' => $ip,
                    'login_datetime' => now(),
                    'login_status' => 'view',
                    'login_ontime' => '1',
                ]
            );
        }

        return view('project.itemdetalimdd',compact('item','project_m_id','itemadmin','imgaccount','adminaccount','chk_type','chk_genre','chk_category'));
    }

    public function typeitem($type_id){
        session_start();
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $datas = DB::select("SELECT * FROM projects,type_project WHERE projects.type_id=type_project.type_id AND projects.type_id='$type_id'");

        $imgback = DB::select("SELECT * FROM projects,img_project WHERE projects.user_id=img_project.p_id AND projects.project_id = '$type_id'");
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        return view('pagewedsum.typesumBD',compact('datas','type_id','imgback','imgaccount','adminaccount'));
    }


    public function typeitemmdd($type_id){
        session_start();
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $item  = DB::select("SELECT * FROM type_project,genre_project,category_project,users,projectmdd
        WHERE users.U_id=projectmdd.user_id AND projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id 
        AND projectmdd.category_id=category_project.category_id AND projectmdd.type_id = '$type_id'"  );
        

        $itemadmin  = DB::select("SELECT * FROM admin_company,owner_projectmdd,projectmdd,type_project,genre_project,category_project
        WHERE owner_projectmdd.owner_m_id=projectmdd.user_id AND admin_company.admin_id=projectmdd.adm_id AND projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id 
        AND projectmdd.category_id=category_project.category_id AND projectmdd.type_id = '$type_id'"  );

        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");

        return view('project.itemdetalimdd',compact('item','project_m_id','itemadmin','imgaccount','adminaccount'));
    }

    public function index() {
        session_start();
        // $chkid = $_SESSION['usersid'];
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        $item  = DB::select("SELECT projects.project_id, projects.logo, projects.project_name, projects.keyword_project, users.name FROM type_project,genre_project,category_project,users,projects,img_project 
        WHERE users.U_id=projects.user_id AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id 
        AND projects.category_id=category_project.category_id AND projects.user_id=img_project.p_id" );

        return view('project.itemdetaliBD',compact('imgaccount','adminaccount','item'));
    }

    public function indexMDD() {
        session_start();
        // $chkid = $_SESSION['usersid'];
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");

        $item  = DB::select("SELECT projectmdd.project_m_id, projectmdd.project_m_name, projectmdd.keyword_m_project, 
        projects.owner_m_name,type_project.type_name,category_project.category_name
        FROM type_project,genre_project,category_project,admin_company,projectmdd,img_project 
        WHERE admin_company.admin_id=projectmdd.user_id AND projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id 
        AND projectmdd.category_id=category_project.category_id AND projectmdd.user_id=img_project.p_id" );

        return view('project.itemdetaliMDD',compact('imgaccount','adminaccount','item'));
    }


    // admin show
    public function showdata() {
        session_start();
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';

        $imgaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");

        $project = DB::select("SELECT * FROM type_project,genre_project,category_project,users,projects,img_project,year_project
        WHERE users.U_id=projects.user_id AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id 
        AND projects.category_id=category_project.category_id AND projects.user_id=img_project.p_id AND projects.project_year=year_project.NO_Y");
        // echo'<pre>';
        // print_r($project);
        // echo'</pre>';
        $projectA = DB::select("SELECT * FROM type_project,genre_project,category_project,admin_company,owner_project,projects,img_project,year_project
        WHERE owner_project.owner_id=projects.user_id and admin_company.admin_id=projects.ad_id AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id 
        AND projects.category_id=category_project.category_id AND projects.user_id=img_project.p_id AND projects.project_year=year_project.NO_Y");

        return view('admin.project',compact('project','imgaccount','projectA'));
    }

    public function showdatamdd() {
        session_start();
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';

        $imgaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");

        $projectmdd = DB::select("SELECT * FROM type_project,genre_project,category_project,users,projectmdd,year_project
        WHERE users.U_id=projectmdd.user_id AND projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id 
        AND projectmdd.category_id=category_project.category_id AND projectmdd.project_m_year=year_project.NO_Y");

        $projectmddA = DB::select("SELECT * FROM type_project,genre_project,category_project,admin_company,owner_projectmdd,projectmdd,year_project
        WHERE owner_projectmdd.owner_m_id=projectmdd.user_id and admin_company.admin_id=projectmdd.adm_id AND projectmdd.type_id=type_project.type_id AND projectmdd.genre_id=genre_project.genre_id 
        AND projectmdd.category_id=category_project.category_id AND projectmdd.project_m_year=year_project.NO_Y ");

        return view('admin.projectmdd',compact('projectmdd','imgaccount','projectmddA'));
    }
    // editadmin

    public function editprojectbd(Request $request) {
        session_start();
        $_SESSION['project'] = "successproject";

        $project_id = $request->input('project_id');
        $user_id = $request->input('user_id');
        $project_name = $request->input('project_name');
        $name_en = $request->input('project_name_en');
        $keyword_project1 = $request->input('keyword_project1');
        $keyword_project2 = $request->input('keyword_project2');
        $keyword_project3 = $request->input('keyword_project3');
        $keyword_project4 = $request->input('keyword_project4');
        $des_project = $request->input('des_project');
        $owner1 = $request->input('owner_project1');
        $owner2 = $request->input('owner_project2');
        $advisor_p = $request->input('advisor_p');
        $type_project = $request->input('type_project');
        $genre_project = $request->input('genre_project');
        $category_project = $request->input('category_project');
        $facebook = $request->input('facebook');
        $email = $request->input('email');
        $phone = $request->input('phone');
        DB::update("UPDATE users,projects SET project_name = '$project_name', name_en = '$name_en' , keyword_project1 ='$keyword_project1', keyword_project2 ='$keyword_project2', keyword_project3 ='$keyword_project3', keyword_project4 ='$keyword_project4', des_project ='$des_project', .project.type_id ='$type_project',
        ,advisor_p ='$advisor_p',owner_p1 = '$owner1',owner_p2='$owner2',genre_id ='$genre_project', category_id ='$category_project', users.facebook = '$facebook', users.email = '$email', users.phone = '$phone' 
        , projects.updated_at = CURRENT_TIMESTAMP(), users.updated_at = CURRENT_TIMESTAMP() WHERE users.U_id=projects.user_id AND project_id='$project_id'");

        // upload logo project
        if(isset($_FILES['filelogo']['name'])?$_FILES['filelogo']['name']:''){
            if(isset($_FILES['filelogo']['name'])) {
                $this->validate($request,
                ['filelogo' => 'required|image|mimes:png']);
                $foder = 'project\img_logo';
                
                $filename = $request->file('filelogo')->getClientOriginalName();
                $nameimg = rand() . '.' . $filename;
                // $pathimg = $request->file('img')->store('imgaccount/',$nameimg);
                $pathimg = Image::make($request->file('filelogo'))->fit(170, 180, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $pathimg->save(public_path($foder. '/' .$nameimg));
                $logoproject=$nameimg;
                DB::update("UPDATE users,projects SET logo = '$logoproject', projects.updated_at = CURRENT_TIMESTAMP() WHERE users.U_id=projects.user_id AND project_id='$project_id'");
                // 
            }   
            else{
                
            }
        }

        if(isset($_FILES['fileimg']['name'])?$_FILES['fileimg']['name']:''){
            $this->validate($request,
                ['fileimg' => 'required|image|mimes:png,jpeg']);
                $foderimg = 'project\img_backgrund';
                // count มาจากการที่เลือกภาพมากี่ภาพ
                $conut = count($_FILES['fileimg']['name']);
                for($i=0; $i<$conut; $i++) {
                    // ทำการวน loop for จนครบ ตาม count 
                    $name=$request->file('fileimg')[$i];
                    // echo $name;
                    $foder = 'project\img_backgrund';
                    $filename =  $request->file('fileimg')[$i]->getClientOriginalName();
                    $nameimg = rand() . '.' . $filename;
                    
                    $pathimg = Image::make($name)->fit(400, 250, function ($constraint) {
                            $constraint->aspectRatio();
                        });

                    $pathimg->save(public_path($foder. '/' .$nameimg));
                    $fileimg = $nameimg;
                        // เมื่อ i ถึง ตำเเหน่งที่ 1 ให้ทำการเก็บค่า nameimg ไว้ใน fileimg0 เเล้วทำการอัพลง database
                    if ($i == 0) {
                        $fileimg0=$nameimg;
                        DB::update("UPDATE users,projects,img_project SET img_p_1 = '$fileimg0' WHERE users.U_id=projects.user_id 
                        AND projects.user_id=img_project.p_id AND img_project.p_id='$user_id'");
                    }; echo '<br>';
                    if ($i == 1) {
                        $fileimg1=$nameimg;
                        DB::update("UPDATE projects,img_project SET img_p_2 = '$fileimg1'
                        WHERE projects.user_id=img_project.p_id AND img_project.p_id='$user_id'");
                    };
                    if ($i == 2) {
                        $fileimg2=$nameimg;
                        DB::update("UPDATE projects,img_project SET img_p_3 = '$fileimg2', img_project.updated_at = CURRENT_TIMESTAMP() 
                        WHERE projects.user_id=img_project.p_id AND img_project.p_id='$user_id'");
                        break;
                    };     
                }
                
        }
        return redirect('project.detaliproject')->with('successupdate', 'อัพเดทข้อมูลเรียบร้อย');
        
    }

    public function editprojectbd_ad(Request $request) {
        session_start();
        
        $_SESSION['project'] = "successproject";

        $project_id = $request->input('project_id');
        $user_id = $request->input('user_id');
        $project_name = $request->input('project_name');
        $name_en = $request->input('project_name_en');
        $keyword_project = $request->input('keyword_project');
        $des_project = $request->input('des_project');
        $owner_p = $request->input('owner_p');
        $advisor_p = $request->input('advisor_p');
        $type_project = $request->input('type_project');
        $genre_project = $request->input('genre_project');
        $category_project = $request->input('category_project');
        $facebook = $request->input('facebook');
        $email = $request->input('email');
        $phone = $request->input('phone');
        
        DB::update("UPDATE admin_company,owner_project,projects SET project_name = '$project_name', name_en = '$name_en' , keyword_project ='$keyword_project', des_project ='$des_project', type_id ='$type_project',
        genre_id ='$genre_project', category_id ='$category_project', owner_project.owner_p='$owner_p', owner_project.advisor_p='$advisor_p', owner_project.facebook_p = '$facebook', owner_project.email_p = '$email', owner_project.phone_p = '$phone' 
        , projects.updated_at = CURRENT_TIMESTAMP() WHERE owner_project.owner_id=projects.user_id and admin_company.admin_id=projects.ad_id AND project_id='$project_id'");

        // upload logo project
        if(isset($_FILES['fileimg']['name']) || isset($_FILES['filelogo']['name'])) {
            $this->validate($request,
            ['filelogo' => 'required|image|mimes:png,jpeg']);
            $foder = 'project\img_logo';
            $foderimg = 'project\img_backgrund';
            $filename = $request->file('filelogo')->getClientOriginalName();
            $nameimg = rand() . '.' . $filename;
            // $pathimg = $request->file('img')->store('imgaccount/',$nameimg);
            $pathimg = Image::make($request->file('filelogo'))->fit(170, 180, function ($constraint) {
                $constraint->aspectRatio();
            });
            $pathimg->save(public_path($foder. '/' .$nameimg));
            $logoproject=$nameimg;
            
            // count มาจากการที่เลือกภาพมากี่ภาพ
            $conut = count($_FILES['fileimg']['name']);
            for($i=0; $i<$conut; $i++) {
                // ทำการวน loop for จนครบ ตาม count 
                $name=$request->file('fileimg')[$i];
                // echo $name;
                $foder = 'project\img_backgrund';
                $filename =  $request->file('fileimg')[$i]->getClientOriginalName();
                $nameimg = rand() . '.' . $filename;
                
                $pathimg = Image::make($name)->fit(400, 250, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                $pathimg->save(public_path($foder. '/' .$nameimg));
                $fileimg = $nameimg;
                    // เมื่อ i ถึง ตำเเหน่งที่ 1 ให้ทำการเก็บค่า nameimg ไว้ใน fileimg0 เเล้วทำการอัพลง database
                if ($i == 0) {
                    $fileimg0=$nameimg;
                    DB::update("UPDATE admin_company,projects,img_project SET img_p_1 = '$fileimg0' WHERE admin_company.admin_id=projects.user_id 
                    AND projects.user_id=img_project.p_id AND img_project.p_id='$user_id'");
                }; echo '<br>';
                if ($i == 1) {
                    $fileimg1=$nameimg;
                    DB::update("UPDATE projects,img_project SET img_p_2 = '$fileimg1'
                    WHERE projects.user_id=img_project.p_id AND img_project.p_id='$user_id'");
                };
                if ($i == 2) {
                    $fileimg2=$nameimg;
                    DB::update("UPDATE projects,img_project SET img_p_3 = '$fileimg2', img_project.updated_at = CURRENT_TIMESTAMP() 
                    WHERE projects.user_id=img_project.p_id AND img_project.p_id='$user_id'");
                };     
            }
            DB::update("UPDATE admin_company,projects SET logo = '$logoproject', projects.updated_at = CURRENT_TIMESTAMP() WHERE admin_company.admin_id=projects.user_id AND project_id='$project_id'");
            return redirect('viewproject')->with('successupdate', 'อัพเดทข้อมูลเรียบร้อย');
            
        }
        else{
            return redirect('viewproject')->with('successupdate', 'กรุณาใส่ภาพให้ตรง');
        }
        
    }

    // admin edit BD
    public function projectbd($project_id) {
        session_start();
        $_SESSION['data']='data';

        $data = DB::select("SELECT * FROM type_project,genre_project,category_project,users,projects,img_project 
        WHERE users.U_id=projects.user_id and project_id='$project_id' AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id 
        AND projects.category_id=category_project.category_id AND projects.user_id=img_project.p_id");

        $dataA = DB::select("SELECT * FROM type_project,genre_project,category_project,admin_company,owner_project,projects,img_project 
        WHERE owner_project.owner_id=projects.user_id and admin_company.admin_id=projects.ad_id and project_id='$project_id' AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id 
        AND projects.category_id=category_project.category_id AND projects.user_id=img_project.p_id");

        $img = DB::select("SELECT users.U_id FROM users,projects WHERE users.U_id=projects.user_id and project_id='$project_id'");
        compact('img');
        foreach($img as $imgs) {
            $photo=$imgs->U_id;
        }
        $dataimg = DB::select("SELECT * FROM img_project,projects WHERE projects.user_id=img_project.p_id and projects.user_id='$photo'");
        
        $imglogoproject = DB::select("SELECT * FROM img_project,projects WHERE img_project.p_id=projects.project_id and project_id='$project_id'");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        return view('project.detailproject_Ad',compact('data','chk_type','chk_genre','chk_category','chk_branch','imglogoproject','dataimg'));
    }

    public function projectbd_A($project_id) {
        session_start();
        $_SESSION['dataA']='dataA';

        $dataA = DB::select("SELECT * FROM type_project,genre_project,category_project,admin_company,owner_project,projects,img_project 
        WHERE owner_project.owner_id=projects.user_id and admin_company.admin_id=projects.ad_id and project_id='$project_id' AND projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id 
        AND projects.category_id=category_project.category_id AND projects.user_id=img_project.p_id");

        $img = DB::select("SELECT owner_project.owner_id FROM owner_project,projects WHERE owner_project.owner_id=projects.user_id and project_id='$project_id'");
        compact('img');
        foreach($img as $imgs) {
            $photo=$imgs->owner_id;
        }
        $dataimgA = DB::select("SELECT * FROM img_project,projects WHERE projects.user_id=img_project.p_id and projects.user_id='$photo'");
        
        $imglogoproject = DB::select("SELECT * FROM img_project,projects WHERE img_project.p_id=projects.project_id and project_id='$project_id'");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        return view('project.detailproject_Ad_admin',compact('chk_type','chk_genre','chk_category','chk_branch','imglogoproject','dataimgA','dataA'));
    }

    public function test(){
        // // $query="Insidethatcagetherewasagreenteddybear";
        // $url = 'https://www.prepostseo.com/apis/checkPlag/key=8405791ef34d67710469e7fc10fc6e50/';
        // // $config['permitted_uri_chars'] = 'a-z 0-9~%.:\_\=+%\&';
        // $data = array(
        //     'query'=>"Insidethatcagetherewasagreenteddybear",
        //     // "config['permitted_uri_chars']" => 'a-z 0-9~%.:_\-',
        //     // 'Content-type' => 'application/json',
        // );
        // $ch = curl_init(); // เริ่มต้นใช้งาน cURL
        // curl_setopt($ch, CURLOPT_URL, $url); // กำหนดค่า URL
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // กำหนดค่า HTTP Request
        // curl_setopt($ch, CURLOPT_POST, true); // กำหนดรูปแบบการส่งข้อมูลเป็นแบบ $_POST
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // กำหนดให้ cURL คืนค่าผลลัพท์
        // $response = curl_exec($ch); // ประมวลผล cURL
        // curl_close($ch); // ปิดการใช้งาน cURL
        // print_r($response);
        // // $data = json_decode(file_get_contents($response), true);
        // // echo $data;
        return Http::get('https://www.prepostseo.com/plagiarism-checker');

    }

}

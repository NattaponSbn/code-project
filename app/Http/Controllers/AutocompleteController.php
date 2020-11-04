<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutocompleteController extends Controller
{
    
    // function index()
    // {
    //  return view('beforesearchBD');
    // }
    
    function dropdown (Request $request)
    {
        $keyword = $request->input('search');
        $data = DB::select("SELECT * FROM projects
        WHERE projects.project_name LIKE '%$keyword%'");
        
        return response()->json($data);
        //print_r($data);
    }
    


    function dropdownsearch (Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('projects')
                ->where('project_name', 'LIKE', "%{$query}%")
                ->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($data as $row)
        {
            $output .= '
            <li><a href="#">'.$row->project_name.'</a></li>
            ';
        }
        $output .= '</ul>';
        //echo $output;
        //print_r($data);
        }
    }
    function easysearch(Request $request)
    {   
        session_start();
        $keyword = $request->input('search');
        if(isset($keyword)?$keyword:''){
            $_SESSION['keyword-s'] = $keyword;
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
            
            $easysearch = DB::select("SELECT projects.project_id,projects.project_name,projects.logo,projects.keyword_project1,projects.keyword_project2,
            projects.keyword_project3,projects.keyword_project4,genre_project.genre_name
            
            FROM projects,genre_project
            WHERE projects.genre_id=genre_project.genre_id
            AND projects.project_name LIKE '%$keyword%' 
            OR projects.genre_id=genre_project.genre_id AND projects.keyword_project1 LIKE '%$keyword%'
            OR projects.genre_id=genre_project.genre_id AND projects.keyword_project2 LIKE '%$keyword%' 
            OR projects.genre_id=genre_project.genre_id AND projects.keyword_project3 LIKE '%$keyword%'
            OR projects.genre_id=genre_project.genre_id AND projects.keyword_project4 LIKE '%$keyword%'
            
            ");
            if(isset($easysearch)?$easysearch:''){
                $easysearchID = DB::select("SELECT projects.project_id,AVG(rate_index) AS AvgRate FROM projects,type_project,rating_p
                WHERE projects.type_id=type_project.type_id AND projects.project_id=rating_p.project_id
                GROUP BY rating_p.project_id
                -- AND projects.project_name LIKE '%$keyword%' 
                -- OR projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$keyword%'
                -- OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$keyword%' 
                -- OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$keyword%'
                -- OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$keyword%'
                ");
                    // echo'<pre>';
                    // print_r($easysearchID);
                    // echo'</pre>';
                    // $IDS = $easysearchID->project_id;
                    
                    // // print_r($AvgRate);
                $countID = count($easysearchID);
                // print_r(  $countID);
        // 
                for($i=0;$i<$countID;$i++){
                    $IDS = $easysearchID[$i];
                    compact('IDS');
                    foreach($IDS as $IDS){
                        $IDS;
                    }
                    $Avg = DB::select("SELECT AVG(rate_index) AS AvgRate 
                    FROM rating_p WHERE project_id='$IDS'
                    GROUP BY rating_p.project_id");
                    $countID--;
                    if($countID==0){
                    break;
                    }
                    // print_r($countID);
                }
                // print_r($Avg);
                // $Avg = DB::select("SELECT AVG(rate_index) AS AvgRate
                // FROM rating_p,project_id
                // WHERE  rating_p.project_id=projects.project_id AND projects.project_id='$easysearchID'
                // GROUP BY rating_p.project_id"); 
                //  echo $Avg;
                // print_r($AvgRate);
                // print_r($easysearchID);
    
                $chk_genre = DB::select("SELECT * FROM genre_project");
                $chk_category = DB::select("SELECT * FROM category_project");
                $chk_type = DB::select("SELECT * FROM type_project");
    
                // print_r($easysearch);
                foreach ($easysearch as $key_s) {
                    $key_similar1 = $key_s->keyword_project1;
                    $key_similar2 = $key_s->keyword_project2;
                    $key_similar3 = $key_s->keyword_project3;
                    $key_similar4 = $key_s->keyword_project4;
                    $search_id = $key_s->project_id;
                    $_SESSION['beforsearch'] = 1;
                    
                    $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                    FROM projects,genre_project
                    WHERE projects.project_id != '$search_id' 
                    AND projects.genre_id=genre_project.genre_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                    OR projects.genre_id=genre_project.genre_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                    OR projects.genre_id=genre_project.genre_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                    OR projects.genre_id=genre_project.genre_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                    ORDER BY pID,RAND()
                    LIMIT 4
                    ");
    
                    
                    return view('beforesearchBD', compact('easysearch','imgaccount','adminaccount','similar','Avg','countID','chk_genre','chk_category','chk_type'));
                }
            }else{
               
                $chk_genre = DB::select("SELECT * FROM genre_project");
                $chk_category = DB::select("SELECT * FROM category_project");
                $chk_type = DB::select("SELECT * FROM type_project");
                $easysearch='';
                return view('beforesearchBD', compact('easysearch','imgaccount','adminaccount','chk_genre','chk_category','chk_type'));
            }
            // compact('easysearch');
            // $a = $easysearch;
            // echo'<pre>';
            // print_r($easysearch);
            // echo'</pre>';
            // ,(SELECT AVG(rate_index) AS AvgRate
            // FROM rating_p,projects
            // WHERE  rating_p.project_id=projects.project_id 
            // GROUP BY rating_p.project_id
            // ) AS Q

            
        }else{
            // $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            // $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            // $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            // $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
            // $chk_genre = DB::select("SELECT * FROM genre_project");
            // $chk_category = DB::select("SELECT * FROM category_project");
            // $chk_type = DB::select("SELECT * FROM type_project");
            // $easysearch='';
            return back();
        }
        
        
        //$_SESSION['search'] = $request->input('search');
        //echo $keyword;

        // if($request->get('query'))
        // {
        // $query = $request->get('query');
        // $data = DB::table('projects')
        //     ->where('project_name', 'LIKE', "%{$keyword}%")
        //     ->get();
        // $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        // foreach($data as $row)
        // {
        //     $output .= '
        //     <li><a href="#">'.$row->project_name.'</a></li>
        //     ';
        // }
        // $output .= '</ul>';
        //echo $output;
        // print_r($data);
        // }


        //photos
        
        

    }

    function detailsearch(Request $request)
    {
        session_start();
        $keyword = $request->input('detailsearch');
        if(isset($keyword)?$keyword:''){
        $_SESSION['keyword-av']=$keyword;
        $genreproject = $request->input('genre_project');
        $categoryproject = $request->input('category_project');
        $typeproject = $request->input('type_project');
        $branch_project = $request->input('branch_project');
        $year_project = $request->input('year_project');
       
        if(isset($genreproject) =='' & isset($categoryproject) =='' & isset($typeproject) =='' & isset($branch_project) =='' & isset($year_project) ==''){
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y          
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y                
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
            // echo('00000:');
        }
        if(isset($genreproject) =='' & isset($categoryproject) =='' & isset($typeproject) =='' & isset($branch_project) =='' & isset($year_project) !=''){
            // echo('00001:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project          
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project                 
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project                
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project                
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
            
        }
        if(isset($genreproject) =='' & isset($categoryproject) =='' & isset($typeproject) =='' & isset($branch_project) !='' & isset($year_project) ==''){
            // echo('00010:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.branch_id=$branch_project           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.branch_id=$branch_project                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.branch_id=$branch_project                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.branch_id=$branch_project                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.branch_id=$branch_project               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
            
        }
        if(isset($genreproject) =='' & isset($categoryproject) =='' & isset($typeproject) =='' & isset($branch_project) !='' & isset($year_project) !=''){
            // echo('00011:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.branch_id=$branch_project AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project 
                AND projects.branch_id=$branch_project AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.branch_id=$branch_project                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.branch_id=$branch_project                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project  
                AND projects.branch_id=$branch_project               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
            
        }
        if(isset($genreproject) =='' & isset($categoryproject) =='' & isset($typeproject) !='' & isset($branch_project) =='' & isset($year_project) ==''){
            // echo('00100:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.type_id=$typeproject           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.type_id=$typeproject                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.type_id=$typeproject                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y 
                AND projects.type_id=$typeproject                
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y 
                AND projects.type_id=$typeproject               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
            
        }
        if(isset($genreproject) =='' & isset($categoryproject) =='' & isset($typeproject) !='' & isset($branch_project) =='' & isset($year_project) !=''){
            // echo('00101:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project            
                AND projects.type_id=$typeproject          
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project 
                AND projects.type_id=$typeproject                
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.type_id=$typeproject                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.type_id=$typeproject                
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project  
                AND projects.type_id=$typeproject               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) =='' & isset($typeproject) !='' & isset($branch_project) !='' & isset($year_project) ==''){
            // echo('00110:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y  
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) =='' & isset($typeproject) !='' & isset($branch_project) !='' & isset($year_project) !=''){
            // echo('00111:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project  
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) !='' & isset($typeproject) =='' & isset($branch_project) =='' & isset($year_project) ==''){
            // echo('01000:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) !='' & isset($typeproject) =='' & isset($branch_project) =='' & isset($year_project) !=''){
            // echo('01001:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.category_id=$categoryproject 
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project 
                AND projects.category_id=$categoryproject 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.category_id=$categoryproject 
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.category_id=$categoryproject 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project  
                AND projects.category_id=$categoryproject 
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) !='' & isset($typeproject) =='' & isset($branch_project) !='' & isset($year_project) ==''){
            // echo('01010:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) !='' & isset($typeproject) =='' & isset($branch_project) !='' & isset($year_project) !=''){
            // echo('01011:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project 
                AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project  
                AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) !='' & isset($typeproject) !='' & isset($branch_project) =='' & isset($year_project) ==''){
            // echo('01100:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject         
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) !='' & isset($typeproject) !='' & isset($branch_project) =='' & isset($year_project) !=''){
            // echo('01101:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project 
                AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject                 
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project  
                AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject              
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) !='' & isset($typeproject) !='' & isset($branch_project) !='' & isset($year_project) ==''){
            // echo('01110:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) =='' & isset($categoryproject) !='' & isset($typeproject) !='' & isset($branch_project) !='' & isset($year_project) !=''){
            // echo('01111:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project 
                AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project  
                AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) =='' & isset($typeproject) =='' & isset($branch_project) =='' & isset($year_project) ==''){
            // echo('10000:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject                
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y  
                AND projects.genre_id=$genreproject               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) =='' & isset($typeproject) =='' & isset($branch_project) =='' & isset($year_project) !=''){
            // echo('10001:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject          
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project 
                AND projects.genre_id=$genreproject                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject                   
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project  
                AND projects.genre_id=$genreproject               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) =='' & isset($typeproject) =='' & isset($branch_project) !='' & isset($year_project) ==''){
            // echo('10010:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.branch_id=$branch_project           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y  
                AND projects.genre_id=$genreproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.branch_id=$branch_project                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y   
                AND projects.genre_id=$genreproject AND projects.branch_id=$branch_project               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) =='' & isset($typeproject) =='' & isset($branch_project) !='' & isset($year_project) !=''){
            // echo('10011:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.branch_id=$branch_project           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project 
                AND projects.genre_id=$genreproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.branch_id=$branch_project                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project  
                AND projects.genre_id=$genreproject AND projects.branch_id=$branch_project               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) =='' & isset($typeproject) !='' & isset($branch_project) =='' & isset($year_project) ==''){
            // echo('10100:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject 
                AND projects.type_id=$typeproject           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject 
                AND projects.type_id=$typeproject                
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject 
                AND projects.type_id=$typeproject                 
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject 
                AND projects.type_id=$typeproject                
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y  
                AND projects.genre_id=$genreproject 
                AND projects.type_id=$typeproject               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) =='' & isset($typeproject) !='' & isset($branch_project) =='' & isset($year_project) !=''){
            // echo('10101:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject 
                AND projects.type_id=$typeproject           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project 
                AND projects.genre_id=$genreproject  
                AND projects.type_id=$typeproject                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject 
                AND projects.type_id=$typeproject                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject 
                AND projects.type_id=$typeproject                  
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project  
                AND projects.genre_id=$genreproject 
                AND projects.type_id=$typeproject               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) =='' & isset($typeproject) !='' & isset($branch_project) !='' & isset($year_project) ==''){
            // echo('10110:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project  
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) =='' & isset($typeproject) !='' & isset($branch_project) !='' & isset($year_project) !=''){
            // echo('10111:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project 
                AND projects.genre_id=$genreproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject  
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project  
                AND projects.genre_id=$genreproject  
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) !='' & isset($typeproject) =='' & isset($branch_project) =='' & isset($year_project) ==''){
            // echo('11000:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y  
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) !='' & isset($typeproject) =='' & isset($branch_project) =='' & isset($year_project) !=''){
            // echo('11001:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project  
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) !='' & isset($typeproject) =='' & isset($branch_project) !='' & isset($year_project) ==''){
            // echo('11010:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y  
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) !='' & isset($typeproject) =='' & isset($branch_project) !='' & isset($year_project) !=''){
            // echo('11011:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project  
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.branch_id=$branch_project               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) !='' & isset($typeproject) !='' & isset($branch_project) =='' & isset($year_project) ==''){
            // echo('11100:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject          
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) !='' & isset($typeproject) !='' & isset($branch_project) =='' & isset($year_project) !=''){
            // echo('11101:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject                  
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject                
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project  
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID,AVG(rate_index) AS AvgRate
                FROM projects,type_project,rating_p
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                GROUP BY rating_p.project_id
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) !='' & isset($typeproject) !='' & isset($branch_project) !='' & isset($year_project) ==''){
            // echo('11110:');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y  
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project               
                AND projects.keyword_project4 LIKE '%$keyword%'");

            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        if(isset($genreproject) !='' & isset($categoryproject) !='' & isset($typeproject) !='' & isset($branch_project) !='' & isset($year_project) !=''){
            // echo('11111');
            $detailsearch = DB::select("SELECT * FROM projects,type_project,genre_project,branch_project,category_project,year_project
                WHERE projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project           
                AND projects.project_name LIKE '%$keyword%' 
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project 
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project1 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id 
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                  
                AND projects.keyword_project2 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project                 
                AND projects.keyword_project3 LIKE '%$keyword%'
                
                OR  projects.type_id=type_project.type_id AND projects.genre_id=genre_project.genre_id
                AND projects.branch_id=branch_project.branch_id AND projects.category_id=category_project.category_id  
                AND projects.project_year=year_project.NO_Y AND projects.project_year=$year_project  
                AND projects.genre_id=$genreproject AND projects.category_id=$categoryproject 
                AND projects.type_id=$typeproject AND projects.branch_id=$branch_project               
                AND projects.keyword_project4 LIKE '%$keyword%'");
            
            if(isset($detailsearch) ? $detailsearch:''){
                // echo(2);
                foreach ($detailsearch as $key_s) {
                $key_similar1 = $key_s->keyword_project1;
                $key_similar2 = $key_s->keyword_project2;
                $key_similar3 = $key_s->keyword_project3;
                $key_similar4 = $key_s->keyword_project4;
                $search_id = $key_s->project_id;
                
                $similar = DB::select("SELECT *,ABS(projects.project_id = '$search_id') AS pID
                FROM projects,type_project
                WHERE projects.project_id != '$search_id' 
                AND projects.type_id=type_project.type_id AND projects.keyword_project1 LIKE '%$key_similar1%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project2 LIKE '%$key_similar2%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project3 LIKE '%$key_similar3%' 
                OR projects.type_id=type_project.type_id AND projects.keyword_project4 LIKE '%$key_similar4%' 
                ORDER BY pID
                LIMIT 4
                ");
                //view star
                // $svg0 = DB::select("SELECT AVG(rate_index) AS AvgRate FROM rating_p WHERE project_id='$ite0'"); 
                // $svgrate0 = $svg0[0];
                // compact('svgrate0');
                // foreach($svgrate0 as $svgrate0){
                //     $svgrate0 = round($svgrate0,$percision=1);
                // }
                session_start();
                $_SESSION['beforsearch']='1';
                }
            }
            else{
                // echo(1);
                $similar = '';
            }
            
            //photos
            $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
            $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
            $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
            $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        }
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_type = DB::select("SELECT * FROM type_project");

        //print_r($detailsearch);
        return view('beforesearchAV', compact('detailsearch','similar','imgaccount','adminaccount','chk_type','chk_genre','chk_category'));
    }else{
        return back();
    }
}
        
            
        
        
    

    function detailview(Request $request){
        session_start();
        $chkid = (isset($_SESSION['usersid'])) ? $_SESSION['usersid'] : '';
        $chkidadmin = (isset($_SESSION['adminid'])) ? $_SESSION['adminid'] : '';
        $imgaccount = DB::select("SELECT * FROM users WHERE U_id='$chkid'");
        $adminaccount = DB::select("SELECT * FROM admin_company WHERE admin_id='$chkidadmin'");
        $chk_type = DB::select("SELECT * FROM type_project");
        $chk_genre = DB::select("SELECT * FROM genre_project");
        $chk_category = DB::select("SELECT * FROM category_project");
        $chk_branch = DB::select("SELECT * FROM branch_project");
        $chk_year = DB::select("SELECT * FROM year_project");
        //print_r($chk_type);
        return view('searchAV', compact('chk_type','chk_genre','chk_category','chk_branch','chk_year','imgaccount','adminaccount'));
    }
}

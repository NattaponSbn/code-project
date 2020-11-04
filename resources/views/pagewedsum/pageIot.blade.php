@extends('layouts.mainhomeBD')

@section('content')
        <!-- app.css -->
        <div class="rowcolumn">
            <div class="col-md-12">
                <div class="tile1">
                    <div class="tile-body">
                    <div class="texthe1">Iot<div class="btn-layouts-list-coloum">
                            <span class="span-layout-text">เเสดงรูปแแบบ</span>
                            <div class=""><button title="เเสดงเเบบไอคอน" onclick="changecoloumn()"><i class="fas fa-file-image fa-lg"></i></button><button title="เเสดงเเบบลิสต์" onclick="changelist()"><i class="fas fa-bars fa-lg" ></i></button></div>
                        </div></div>
                    <div class="carousel-inner" id="btn-layouts-coloum">
                        <div class="carousel-item active">
                            
                            @foreach($datas1 as $data_p)
                                @if(isset($data_p->status_p)=='0')
                                    <a href="itemdetaliBD/{{$data_p->project_id}}"><div class="column" ><div class="columnimg"><img src="project\img_logo\<?php echo $data_p->logo;?>" alt="" class="fromimg"></div></a>
                                        <center><a href="itemdetaliBD/{{$data_p->project_id}}"><div class="textimg"><?php echo $data_p->project_name;?></div></a></center>
                                        <center><a href="itemdetaliBD"><div class="textimg2"><?php echo $data_p->type_name;?></div></a></center>
                                    </div>
                                    @elseif(isset($data_p->status_p)=='1')
                                    <a href="itemdetaliBD/{{$data_p->project_id}}">
                                    <div class="column">
                                        <div class="columnimg"><img src="project\img_logo\<?php echo $data_p->logo; ?>" alt="" class="fromimg"></div></a>
                                            <center><a href="itemdetaliBD/{{$data_p->project_id}}">
                                                    <div class="textimg">
                                                        <?php
                                                        $str = $data_p->project_name;
                                                        $count = utf8_strlen("$str");
                                                        create_str($count,$str,$data_p)
                                                        ?></div>
                                                </a>
                                            </center>
                                            <center><a href="itemtypeBD/{{$data_p->type_id}}">
                                                    <div class="textimg2"><?php echo $data_p->type_name; ?></div>
                                                </a>
                                            </center>
                                            <center>
                                            <div class="rating">
                                                <?php 
                                                    $rate = $data_p->AvgRate;
                                                    rating_star($rate); 
                                                ?>
                                            </div>
                                            </center>
                                    </div>
                                @endif
                            @endforeach
                            
                        </div>
                    </div>
                    
                    <div class="carousel-inner" id="btn-layouts-list">
                        <div class="carousel-item active">
                            <div class="row ">
                                @if(isset($datas1)?$datas1:'')
                                    @foreach($datas1 as $aftersearch) 
                                    <div class="column-s"><span class="layout-mdd-i-text"><span class="countviewmdd"><?php  ?></span><i class="fas fa-user" style="color: #A9A9A9;"></i></span>
                                    <a href="itemdetaliBD/{{$aftersearch->project_id}}"><div class="imgfromming-s ">
                                            <div class="columnimgitem-s shadow-item">
                                                <img src="{{URL::to('project/img_logo/'.$aftersearch->logo)}}" alt="USer Atve" class="fromimg" style="width: 100px;height: 110px;">
                                            </div>
                                        </div>
                                        <div class="text-N-d-s">
                                        <a href="itemdetaliBD/{{$aftersearch->project_id}}"><label for="text" class="laout-text" >
                                                <?php 
                                                    echo $str = $aftersearch->project_name;
                                                ?>
                                            </label></a>            
                                            <div class="text-auth-d">
                                                <label for="text">คำสำคัญ : 
                                                    <?php 
                                                        echo $str = $aftersearch->keyword_project1; 
                                                    ?> 
                                                    <?php 
                                                        echo $str = $aftersearch->keyword_project2;
                                                    ?> 
                                                    <?php 
                                                        echo $str = $aftersearch->keyword_project3; 
                                                    ?> 
                                                    <?php 
                                                        echo $str = $aftersearch->keyword_project4;
                                                    ?>
                                                </label>
                                            </div>
                                            <div class="text-auth-N-d">
                                                <label for="text">ประเภท : <?php echo $aftersearch->genre_name; ?></label>
                                            </div>
                                            <div class="rating text-rating">
                                                <?php 
                                                    // $rate = $aftersearch->avg_sum;
                                                    // rating_star($rate); 
                                                ?>
                                            </div>
                                        </div></a> 
                                    </div>
                                    @endforeach
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div
    ></div>
@stop

<script type="text/javascript">
    function changecoloumn(){
        document.getElementById("btn-layouts-coloum").style.display = "flex";
        document.getElementById("btn-layouts-list").style.display = "none";
    }

    function changelist(){
        document.getElementById("btn-layouts-coloum").style.display = "none";
        document.getElementById("btn-layouts-list").style.display = "flex";
    }
</script>

<?php
    function utf8_strlen($str){
        $c = strlen($str);
        $l = 0;
        for ($i = 0; $i < $c; ++$i) {
            if ((ord($str[$i]) & 0xC0) != 0x80) {
                ++$l;
            }
        }
        return $l;
    }
    function create_str($count,$str,$items) {
        // echo $count;
        if($count>20 & $count<25) {
            $strcount = substr($str,0,-10);
            $strcount1 = substr($strcount,0,-8);
            $strcut = $strcount1."...";
            echo $strcut;
        }elseif($count>25 & $count<30){
            $strcount = substr($str,0,-10);
            $strcount1 = substr($strcount,0,-20);
            $strcut = $strcount1."...";
            echo $strcut;
        }elseif($count>30 & $count <40){
            $strcount = substr($str,0,-10);
            $strcount1 = substr($strcount,0,-8);
            $strcount2 = substr($strcount1,0,-10);
            $strcount3 = substr($strcount2,0,-8);
            $strcut = $strcount3."...";
            echo $strcut;
        }elseif($count>40 & $count <50){
            $strcount = substr($str,0,-50);
            $strcount1 = substr($strcount,0,-50);
            $strcount2 = substr($strcount1,0,-5);
            $strcut = $strcount2."...";
            echo $strcut;
        }elseif($count>50 & $count <80){
            $strcount = substr($str,0,-65);
            $strcount1 = substr($strcount,0,-50);
            $strcount2 = substr($strcount1,0,-5);
            $strcut = $strcount2."...";
            echo $strcut;
        }
        elseif($count>80 & $count <100){
            $strcount = substr($str,0,-65);
            $strcount1 = substr($strcount,0,-65);
            $strcount2 = substr($strcount1,0,-85);
            $strcount3 = substr($strcount2,0,-5);
            $strcut = $strcount3."...";
            echo $strcut;
        }
        elseif($count>100 & $count <150){
            $strcount = substr($str,0,-65);
            $strcount1 = substr($strcount,0,-85);
            $strcount2 = substr($strcount1,0,-85);
            $strcount3 = substr($strcount2,0,-5);
            $strcut = $strcount3."...";
            echo $strcut;
        }else{
            echo $items->project_name;
        }  
    }

    function check_rating($rating) {
        for($i=0;$i<floor($rating);$i++){
            echo '<i class="fas fa-star" style="color: #ffb712;"></i>';
        }
        for($i=0;$i < 5-floor($rating);$i++) {
            echo '<i class="far fa-star" style="color: #ffb712;"></i>';
        }
    }

    function formattter($viewcount) {
        if ($viewcount >= 1000000) {
            echo '<span class="countview" title="ยอดผู้ชม">'.round($viewcount/ 1000000, 1).'หมื่น'.'</span><i class="fas fa-user i-view" style="color: #A9A9A9;" title="ยอดผู้ชม"></i>';
        }
        else if ($viewcount >= 1000) {
            echo '<span class="countview" title="ยอดผู้ชม">'.round($viewcount/ 1000, 1). 'พัน'.'</span><i class="fas fa-user i-view" style="color: #A9A9A9;" title="ยอดผู้ชม"></i>';
        }else{
            // echo $viewcount;
            echo '<span class="countview" title="ยอดผู้ชม">'.$viewcount.'</span><i class="fas fa-user i-view" style="color: #A9A9A9;" title="ยอดผู้ชม"></i>';
        }
        
    }

    function formatttertwo($viewcount) {
        if ($viewcount >= 1000000) {
            echo round($viewcount/ 1000000, 1).'หมื่น';
        }
        else if ($viewcount >= 1000) {
            echo round($viewcount/ 1000, 1). 'พัน';
        }else{
            echo $viewcount;
        }
        
    }

    function rating_star($svgrate){
        if(isset($svgrate)?$svgrate:''){
            if($svgrate < 2 & $svgrate> 0){
                echo'<div class="rating">';
                    check_rating($svgrate);
                    if(isset($svgrate)?$svgrate:''){
                        echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><br>';
                    }
                    // echo '<span class="countview">'.formattter($viewcount).'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                echo'</div>';
            }
            
            elseif($svgrate >= 2 & $svgrate < 3) {
                echo'<div class="rating">';
                    check_rating($svgrate);
                    if(isset($svgrate)?$svgrate:''){
                        echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><br>';
                    }
                    // echo '<span class="countview">'.formattter($viewcount).'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                echo '</div>';
            }
            
            elseif($svgrate >= 3 & $svgrate < 4) {
                echo'<div class="rating">';
                    check_rating($svgrate);
                    if(isset($svgrate)?$svgrate:''){
                        echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><br>';
                    }
                    // echo '<span class="countview">'.formattter($viewcount).'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                echo '</div>';
            }
            
            elseif($svgrate >= 4 & $svgrate < 5){
                echo'<div class="rating">';
                    check_rating($svgrate);
                    if(isset($svgrate)?$svgrate:''){
                        echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><br>';
                    } 
                    // echo '<span class="countview">'.formattter($viewcount).'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                echo'</div>';}
            
            elseif($svgrate >= 5){
                echo'<div class="rating">';
                    check_rating($svgrate);
                    if(isset($svgrate)?$svgrate:''){
                        echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><br>';
                    }
                    // echo '<span class="countview">'.formattter($viewcount).'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                echo'</div>';
                }
            else{
                echo'<div class="rating">';
                    check_rating($svgrate);
                    if(isset($svgrate)?$svgrate:''){
                        echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><br>';
                    }
                    // echo '<span class="countview">'.formattter($viewcount).'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
                echo '</div>';}
        
            }
        else{
            echo'<div class="rating">';
                check_rating(0);  echo'<span class=""> (0)</span><br>';
                // echo '<span class="countview">'.formattter($viewcount).'</span><i class="fas fa-user i-view" style="color: #A9A9A9;"></i>';
            echo'</div>';
        }    
    }
?>
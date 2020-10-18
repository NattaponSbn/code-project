@extends('layouts.mainhomeBD')

@section('content')
        <!-- app.css -->
        <div class="rowcolumn">
            <div class="col-md-12">
                <div class="tile1">
                    <div class="tile-body">
                    <div class="texthe1">Iot</div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="table-responsive">
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
                    </div>   
                </div>
            </div>
        </div
    ></div>
@stop

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
    function create_str($count,$str,$data_p) {
        if ($count > 20 & $count < 25) {
            $strcount = substr($str, 0, -10);
            $strcount1 = substr($strcount, 0, -8);
            $strcut = $strcount1 . '...';
            echo $strcut;
        } elseif ($count >= 25) {
            $strcount = substr($str, 0, -10);
            $strcount1 = substr($strcount, 0, -8);
            $strcount2 = substr($strcount1, 0, -10);
            $strcount3 = substr($strcount2, 0, -8);
            $strcut = $strcount3 . '...';
            echo $strcut;
        } elseif ($count > 30) {
            $strcount = substr($str, 0, -10);
            $strcount1 = substr($strcount, 0, -8);
            $strcount2 = substr($strcount1, 0, -10);
            $strcount3 = substr($strcount2, 0, -8);
            $strcut = $strcount3 . '...';
            echo $strcut;
        } elseif ($count > 40) {
            $strcount = substr($str, 0, -10);
            $strcount1 = substr($strcount, 0, -8);
            $strcount2 = substr($strcount1, 0, -10);
            $strcount3 = substr($strcount2, 0, -10);
            $strcut = $strcount3 . '...';
            echo $strcut;
        } else {
            echo $data_p->project_name;
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

    function rating_star($svgid){
        if(isset($svgid)?$svgid:''){
        if($svgid < 2 & $svgid> 0){
            echo'<div class="rating">';
            check_rating($svgid);if(isset($svgid)?$svgid:''){echo'<span class="">('.(round($svgid, $precision = 1)).'</span>)</div>';}}
        
        elseif($svgid >= 2 & $svgid < 3) {
            echo'<div class="rating">';
            check_rating($svgid);if(isset($svgid)?$svgid:''){echo'<span class="">('.(round($svgid, $precision = 1)).'</span>)</div>';}}
        
        
        elseif($svgid >= 3 & $svgid < 4) {
            echo'<div class="rating">';
            check_rating($svgid);if(isset($svgid)?$svgid:''){echo'<span class="">('.(round($svgid, $precision = 1)).'</span>)</div>';}}
        
        
        elseif($svgid >= 4 & $svgid < 5){
            echo'<div class="rating">';
            check_rating($svgid);if(isset($svgid)?$svgid:''){echo'<span class="">('.(round($svgid, $precision = 1)).'</span>)</div>';}} 
        
        elseif($svgid >= 5){
        echo'<div class="rating">';
            check_rating($svgid);if(isset($svgid)?$svgid:''){echo'<span class="">('.(round($svgid, $precision = 1)).'</span>)</div>';}}
        else{
            echo'<div class="rating">';
            check_rating($svgid);if(isset($svgid)?$svgid:''){echo'<span class="">('.(round($svgid, $precision = 1)).'</span>)</div>';}}
    
        }
        else{
            echo'<div class="rating">';
                check_rating(0);  echo'<span class="">(0)</span>';
            echo'</div>';
        }    
    }
?>
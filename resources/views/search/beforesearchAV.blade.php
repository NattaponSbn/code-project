@extends('layouts.mainhomeBD')
@section('content')
    <div class="rowcolumn">
            <div class="col-md-12">
                <div class="tile1">
                    <div class="tile-body">
                        <div class="texthe1">ผลลัพธ์การค้นหา</div>
                            
                    
                            <div class="table-responsive ">
                                @foreach($detailsearch as $aftersearch) 
                                    <a href="http://"><div class="column column1 column2 column3" ><div class="columnimg"><img src="img/fromimg.png" alt="" class="fromimg"></div></a>
                                        <center><a href="http://"><div class="textimg">{{$aftersearch->project_name}}</div></a></center>
                                        <center><a href="http://"><div class="textimg2">{{$aftersearch->type_name}}</div></a></center>
                                    </div>
                                @endforeach
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div
    ></div>
@stop
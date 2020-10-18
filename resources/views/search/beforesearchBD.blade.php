@extends('layouts.mainhomeBD')
@section('content')
    <div class="rowcolumn">
            <div class="col-md-12">
                <div class="tile1">
                    <div class="tile-body">
                        <div class="texthe1">มาใหม่</div>
                            @if(!isset($_SESSION['search']))
                            <div class="table-responsive ">
                                    <a href="http://"><div class="column column1 column2 column3" ><div class="columnimg"><img src="img/fromimg.png" alt="" class="fromimg"></div></a>
                                        <center><a href="http://"><div class="textimg">name</div></a></center>
                                        <center><a href="http://"><div class="textimg2">type</div></a></center>
                                    </div>
                            </div>
                            @else if (isset($_SESSION['search']))
                            
                            <div class="table-responsive ">
                                @foreach($datas as $datauser) 
                                    <a href="http://"><div class="column column1 column2 column3" ><div class="columnimg"><img src="img/fromimg.png" alt="" class="fromimg"></div></a>
                                        <center><a href="http://"><div class="textimg">{{$datauser->name}}</div></a></center>
                                        <center><a href="http://"><div class="textimg2">{{$datauser->gender}}</div></a></center>
                                    </div>
                                @endforeach
                            
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div
    ></div>
@stop
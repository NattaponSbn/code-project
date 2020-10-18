@extends('layouts.mainhomeBD')
@section('content')
<main class="app-content">
  
        
        <ul class="breadcrumb-detail" style="margin-left:800px;">
            <li class="breadcrumb-item active"><a href="{{action('ProjectController@itemproject')}}">หน้าหลัก</a></li>
            <li class="breadcrumb-item"> รายชื่อผลงาน(<?php echo $_SESSION['nameuser']; ?>)</li>
        </ul>
 
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="tile">
                <div>
            <h3><i class="fa fa-th-list"></i> ผลงานของคุณ(<?php echo $_SESSION['nameuser']; ?>)</h3>
        </div>
                    <div class="tile-body">
                        <div class="table-responsive-a">
                            <table class="table table-bordered" style="font-size: 16px;" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th><center>ลำดับที่</center></th>
                                        <th><center>โลโก้</center></th>
                                        <th>ชื่อผลงาน</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list as $data)
                                        <tr>
                                            <td style="width: 7%;"><center>{{$loop->iteration}}</center></td>
                                            <td style="width: 10%;"><center><a href="projectview/{{$data->project_id}}" ><img src="project/img_logo/{{$data->logo}}" class="imghover" alt="" width="50" height="50"></center></a></td>
                                            <td><a href="projectview/{{$data->project_id}}" >{{$data->project_name}}</a></td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

    @endsection
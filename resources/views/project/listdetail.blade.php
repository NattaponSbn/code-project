@extends('layouts.mainhomeBD')
@section('content')
    @if ($message = Session::get('delete_project'))
        <script>
        swal({
            title: "ลบข้อมูลเรียบร้อย",
            icon: "success",
            button: "ตกลง",
        });
        </script>
    @endif
<main class="app-content">
        
        <ul class="breadcrumb-detail" style="margin-left:800px;">
            <li class="breadcrumb-item active"><a href="{{action('ProjectController@itemproject')}}">หน้าหลัก</a></li>
            <li class="breadcrumb-item"> รายชื่อผลงาน({{$_SESSION['nameuser']}})</li>
        </ul>
 
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="tile">
                    <div>
                        <h3><i class="fa fa-th-list"></i> ผลงานของคุณ({{$_SESSION['nameuser']}}) <a href="addproject" title="สร้างผลงาน"><i class="fas fa-plus-square fa-lg i-add"></i></a></h3> 
                    </div>
                    <div class="tile-body">
                        <div class="table-responsive-a">
                        <center><table class="table table-bordered" style="font-size: 16px;width: 95%;" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th><center>ลำดับ</center></th>
                                        <th><center>โลโก้</center></th>
                                        <th>ชื่อผลงาน</th>
                                        <th><center>จัดการ</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list as $data)
                                        <tr>
                                            <td style="width: 7%;"><center>{{$loop->iteration}}</center></td>
                                            <td style="width: 10%;"><center><a href="projectview/{{$data->project_id}}" ><img src="project/img_logo/{{$data->logo}}" class="imghover" alt="" width="50" height="50"></center></a></td>
                                            <td><a href="projectview/{{$data->project_id}}" >{{$data->project_name}}</a></td>
                                            <td style="width: 13%;">
                                                <center><a href="projectview/{{$data->project_id}}"><i class="fas fa-edit fa-2x i-edit" ></i></a>

                                                <a href="delete_p_bd/{{$data->project_id}}"><i class="fas fa-trash-alt fa-2x i-delete" ></i></a></center>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
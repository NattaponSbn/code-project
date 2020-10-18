@extends('layouts.mainhomeadmin')
@section('content')
  <main class="app-content" >  
    <div class="row">
        <div class="col-md-6 col-lg-3 width" >
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users"></i>
            <div class="info">
              <h4>ผู้ใช้</h4>
              @if(isset($sum_user)?$sum_user:'')
                <p><b><?php echo $sum_user;?></b></p>
                @else
                <p><b>0</b></p>
              @endif
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon far fa-thumbs-up"></i>
            <div class="info">
              <h4>ชอบ</h4>
              @if(isset($sum_like)?$sum_like:'')
                <p><b><?php echo $sum_like;?></b></p>
                @else
                <p><b>0</b></p>
              @endif
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fas fa-upload"></i>
            <div class="info">
              <h4>อัพโหลด</h4>
              @if(isset($sum_upload)?$sum_upload:'')
                <p><b><?php echo $sum_upload;?></b></p>
                @else
                <p><b>0</b></p>
              @endif
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fas fa-atlas"></i>
            <div class="info">
              <h4>ผลงาน</h4>
                @if(isset($sum_project)?$sum_project:'')
                  <p><b><?php echo $sum_project;?></b></p>
                  @else
                  <p><b>0</b></p>
                @endif
            </div>
          </div>
        </div>
      </div>
          <div class="tile">
            <h3 class="tile-title">คำขอ</h3>
              <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>ลำดับที่</th>
                                <th>ชื่อโปรเจค</th>
                                <th>เจ้าของผลงาน</th>
                                <th>เอกสารการตรวจการคัดลอก</th>
                                <th>ตรวจสอบ</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if(isset($chk_projectA0)?$chk_projectA0:'')
                            
                              @foreach($chk_projectA0 as $project0)
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td><a href="projectviewbd_A/{{$project0->project_id}}">{{$project0->project_name}}</a></td>
                                  <td>
                                    @if(isset($project0->owner_name))
                                      {{$project0->owner_name}}
                                      @else
                                      {{$project0->owner_name}}
                                    @endif
                                  </td>
                                  <td><a href="read_chk/{{$project0->project_id}}" target="_blank">{{$project0->temp_namefile_chk}}</a></td> 
                                  <td>
                                      <a onClick="return confirm('การเเก้ไขข้อมูลจะต้องเช็คความถูกต้องทุกครั้งก่อนที่จะทำการบันทึก')" href="confirm_p/{{$project0->project_id}}"><button class="btn-imgdata" type="submit"></button></a>
                                      <!-- <a onClick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')" href="delete/{{ $project0->owner_id }}"><button type="submit"></button></a> -->
                                    
                                  </td>
                              </tr>
                              @endforeach
                           @endif
                           @if(isset($chk_project0)?$chk_project0:'') 
                              @foreach($chk_project0 as $project0)
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td><a href="projectviewbd/{{$project0->project_id}}">{{$project0->project_name}}</a></td>
                                  <td>{{$project0->name}}</td> 
                                  <td><a href="read_chk/{{$project0->project_id}}" target="_blank">{{$project0->temp_namefile_chk}}</a></td> 
                                  <td>
                                      <a onClick="return confirm('การเเก้ไขข้อมูลจะต้องเช็คความถูกต้องทุกครั้งก่อนที่จะทำการบันทึก')" href="confirm_p/{{$project0->project_id}}"><i class="fas fa-check-circle fa-3x"><button class=""  type="submit"></button></i></a>
                                      
                                      <!-- <a onClick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')" href="delete/{{ $project0->U_id }}"><button type="submit"></button></a> -->

                                  </td>
                              </tr>
                              @endforeach
                            
                            @endif

      
                        </tbody>
                      </table>
                </div>
          </div>
        </div>
                
           <div class="row">
          <div class="col-md-6">
              <div class="tile">
                <h3 class="tile-title">เเจ้งปัญหา</h3>
                <div class="embed-responsive embed-responsive-16by9">
                  <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
                </div>
              </div>
          </div>
        </div>
    </div>
    </main>
@stop
@extends('Layout_admin.Main')
@section('content') 
<div class="table-agile-info">
  <div class="panel panel-default">
     <div class="panel-heading">
      Đồ thị tăng trưởng
     </div>
    <div  class="row">
        <form action="" autocomplete="off">
            @csrf
            <div class="col-md-2">
                <label for="">Từ ngày</label>
                <input type="text" id="datepicker" class="form-control" name="fromdate">
                <input type="button" id="btn-submit" value="Lọc kết quả" name="todate">
            </div>
            <div class="col-md-2">
                <label for="">Đến ngày</label>
                <input type="text" id="datepicker2" class="form-control">
            </div>
        </form>
        <div class="col-md-2">
            <div id="" style="height: 250px;"></div>
        </div>
    </div>
        <div class="floatcharts_w3layouts_bottom">
          <div id="chart"></div>
        </div>
   </div>
 </div>
@endsection
@section('js')
<script type="text/javascript">
   $(document).ready(function(){
   
   });
  
  $(function() {
    $( "#datepicker" ).datepicker({
        prevText:"Tháng trước",
        nextText:" Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin:["CN","thứ 2","thứ 3","thứ 4","thứ 5","thứ 6","thứ 7"],
        duration:"slow"
    });
    $( "#datepicker2" ).datepicker({
        prevText:"Tháng trước",
        nextText:" Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin:["CN","thứ 2","thứ 3","thứ 4","thứ 5","thứ 6","thứ 7"],
        duration:"slow"
    });
    $("#btn-submit").click(function(){
        var fromdate=$("#datepicker").val();
        var todate=$("#datepicker2").val();   
        $.ajax({
            url:"{{url('admin/lockq')}}",
            type:"GET",
            dataType:"JSON",
            data:{fromdate:fromdate,todate:todate},
            success:function(response){
                alert("ok"+response.data.total);
            },
            error:function(){
                alert('lỗi');
                console.error();
            }
        });
    });
  });
  var day_data = [
            {"period": "2012-10-01", "licensed": 3407, "sorned": 660},
            {"period": "2012-09-30", "licensed": 3351, "sorned": 629},
            {"period": "2012-09-29", "licensed": 3269, "sorned": 618},
            {"period": "2012-09-20", "licensed": 3246, "sorned": 661},
            {"period": "2012-09-19", "licensed": 3257, "sorned": 667},
            {"period": "2012-09-18", "licensed": 3248, "sorned": 627},
            {"period": "2012-09-17", "licensed": 3171, "sorned": 660},
            {"period": "2012-09-16", "licensed": 3171, "sorned": 676},
            {"period": "2012-09-15", "licensed": 3201, "sorned": 656},
            {"period": "2012-09-10", "licensed": 3215, "sorned": 622}
          ];
          Morris.Bar({
            element: 'chart',
            data: day_data,
            xkey: 'period',
            ykeys: ['licensed','sorned'],
            labels: ['Licensed', 'SORN'],
            xLabelAngle: 60
          });
  </script>
@endsection
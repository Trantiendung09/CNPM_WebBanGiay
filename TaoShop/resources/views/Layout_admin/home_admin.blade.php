@extends('Layout_admin.Main')
@section('content') 
<div class="table-agile-info">
  <div class="panel panel-default">
     <div class="panel-heading">
     Thống kê doanh thu các tháng
     </div>
     <div>
      <canvas id="myChart" style="width: 900px !important ; height: 500px !important ; margin: auto; "></canvas>
    </div>
    {{-- <div  class="row">
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
            <div id="chart" style="height: 250px;"></div>
        </div>
    </div> --}}
   </div>
 </div>
@endsection
@section('js')
<script>
  const ctx = document.getElementById('myChart').getContext('2d');
  var data=<?= json_encode($data);?>;
  const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6','Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12'],
          datasets: [{
              label: 'Số lượng:',
              data:data,
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)',

                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',

                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  </script>
  // chart 2
  <script type="text/javascript">
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
  
  </script>
@endsection
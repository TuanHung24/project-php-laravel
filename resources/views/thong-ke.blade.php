@extends('master')

@section('content')
 <span class="thong_ke">
    <div class="count_container count_sp">
    <span data-feather="box" class="align-text-bottom" id="icon-tk"></span>
    <h5>Số lượng sản phẩm</h5>
    <span>Đang có: {{$soLuongSanPham}}</span><br/>
    <span>Tổng tiền nhập hàng: {{$tongTienGiaNhap}}đ</span>
    </div>
    <div class="count_container count_hd">
    <span data-feather="shopping-bag" class="align-text-bottom" id="icon-tk"></span>
    <h5>Số lượng hóa đơn</h5>
    <span>Đã đặt: {{$hoaDon}}</span><br/>
    <span>Tổng tiền hóa đơn xuất: {{$tongTienHoaDon}}đ</span>
    </div>
    <div class="count_container count_nd">
    <span data-feather="users" class="align-text-bottom" id="icon-tk"></span>
    <h5>Số lượng người dùng</h5>
    <span>Tổng số: {{$khachHang}}</span>
    </div>
 </span><br><br>
 <h4>Thống kê theo biểu đồ hóa đơn</h4>
 <div class="option-m-y">
 <select id="monthSelect">
    <option value="0" disabled selected>Chọn tháng</option>
 </select>
 <select id="yearSelect">
    <option value="0" disabled selected>Chọn năm</option>
 </select>
<button class="btn btn-info" id='thong-ke'>Thống kê</button>
</div>
 <canvas id="orderChart" width="200" height="100"></canvas>
@endsection

@section('page-js')
<script type="text/javascript">
$(document).ready(function(){
    thongKe();
    for (var month = 1; month <= 12; month++) {
        $('#monthSelect').append('<option value="' + month + '">Tháng ' + month + '</option>');
    }

    var currentYear = new Date().getFullYear(); 
    for (var year = 2010; year <= currentYear; year++) {
        $('#yearSelect').append('<option value="' + year + '">' + year + '</option>');
    }
    $('#thong-ke').click(function(){
        thongKe();
    });
    function thongKe(){

    var selectedMonth = $('#monthSelect').find(':selected').val();
    var selectedYear = $('#yearSelect').find(':selected').val();

    $.ajax({
        url: "{{route('tk-hoa-don')}}", // URL của API Laravel mà bạn đã tạo
        method: 'GET',
        data:{'month':selectedMonth,'year':selectedYear},
        success: function(response) {
            
        var daysInMonth = new Date(selectedMonth, selectedYear, 0).getDate();
        var counts = Array(daysInMonth).fill(0);


        var canvasContainer = $("#orderChart").parent();
        $("#orderChart").remove();
        // Thêm canvas mới
        canvasContainer.append('<canvas id="orderChart" width="200" height="100"></canvas>');
        // Lấy context của canvas mới
        var ctx = $("#orderChart");

        for (var i in response) {
            var date = new Date(response[i].date);
            var day = date.getDate();
            counts[day - 1] = response[i].count;
        }
        
        var chartData = {
            labels: Array.from({ length: daysInMonth }, (_, i) => `${i + 1}/${selectedMonth}`),
            datasets: [{
                label: 'Số lượng đơn hàng',
                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                borderColor: 'rgba(0, 123, 255, 1)',
                data: counts
            }]
        };
            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                  scales: {
                        y: {
                           stepSize: 10, // Mỗi bước tăng 1 đơn vị
                           autoSkip: false, // Không tự động bỏ qua bất kỳ giá trị nào
                           min: 0,  // Giới hạn nhỏ nhất là 1
                           max: 100,
                        },
                        x:{
                           type: 'category', // Chuyển đổi sang kiểu dữ liệu số
                           
                           position: 'bottom',
                           time: {
                              unit: 'day', // Đơn vị là ngày
                              displayFormats: {
                                 day: 'DD/MM/YYYY' // Định dạng hiển thị cho ngày
                              }
                           },
                           title: {
                              display: true,
                              text: 'Năm '+selectedYear
                           }
                        }
                        
                     }
                
                },
                responsive: true,
                maintainAspectRatio: false,
                
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
    }

});
</script>
@endsection
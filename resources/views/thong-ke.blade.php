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
 <canvas id="orderChart" width="400" height="200"></canvas>
@endsection

@section('page-js')
<script type="text/javascript">
$(document).ready(function(){
   
    $.ajax({
        url: "{{route('tk-hoa-don')}}", // URL của API Laravel mà bạn đã tạo
        method: 'GET',
        success: function(data) {
            
         var currentMonth = new Date().getMonth() + 1; // Lấy tháng hiện tại
        var daysInMonth = new Date(new Date().getFullYear(), currentMonth, 0).getDate(); // Lấy số ngày trong tháng

        var counts = Array(daysInMonth).fill(0);

        for (var i in data) {
            var date = new Date(data[i].date);
            var day = date.getDate();
            counts[day - 1] = data[i].count;
        }

        var chartData = {
            labels: Array.from({ length: daysInMonth }, (_, i) => `${i + 1}/${currentMonth}`),
            datasets: [{
                label: 'Số lượng đơn hàng',
                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                borderColor: 'rgba(0, 123, 255, 1)',
                data: counts
            }]
        };

            var ctx = $("#orderChart");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                  scales: {
                        y: {
                           stepSize: 5, // Mỗi bước tăng 1 đơn vị
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
                              text: 'Ngày trong tháng'
                           }
                        }
                        
                     }
                
                },
                responsive: true,
                maintainAspectRatio: false
            });
        },
        error: function(data) {
            console.log(data);
        }
    });

});
</script>
@endsection
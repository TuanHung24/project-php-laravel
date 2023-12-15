@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2 class="h2">NHẬP HÓA ĐƠN</h2>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="nhan_vien" class="form-label">Nhân viên:</label>   
      <input type="text" class="form-control" value="{{Auth::user()->ho_ten}}" id="nhan-vien" readonly/>
      @error('nhan_vien')
            <span class="error-message">{{ $message }}</span>
      @enderror
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <label for="khach-hang" class="form-label">Họ tên khách hàng:</label>
    <input type="text" class="form-control" name="khach_hang" id="khach-hang">
    @error('khach_hang')
            <span class="error-message">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="row">
  <div class="col-md-2">
    <label for="so-dien-thoai" class="form-label">Số điện thoại:</label>
    <input type="text" class="form-control" name="so_dien_thoai" id="so-dien-thoai">
    @error('so_dien_thoai')
            <span class="error-message">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="san-pham" class="form-label">Sản phẩm:</label>
    <select name="san_pham" class="form-select" id="san-pham" required>
      <option selected disabled>Chọn sản phẩm</option>
      @foreach($dsSanPham as $sanPham)
        @foreach($sanPham->chi_tiet_san_pham as $chiTiet)
          <option value="{{$sanPham->id}}" id="san-pham">{{$sanPham->ten}}</option>
        @endforeach
      @endforeach
    </select>
    <span class="error" id="error-san-pham">Vui lòng chọn sản phẩm.</span>
    @error('san_pham')
            <span class="error-message">{{ $message }}</span>
    @enderror
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <label for="mau-sac" class="form-label">Màu sắc:</label>
    <select name="mau_sac" class="form-select" id="mau-sac" required>
     
    </select>
    <span class="error" id="error-san-pham">Vui lòng chọn màu sắc.</span>
    @error('mau_sac')
            <span class="error-message">{{ $message }}</span>
    @enderror
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <label for="dung-luong" class="form-label">Dung lượng:</label>
    <select name="dung_luong" class="form-select" id="dung-luong" required>
    
    </select>
    <span class="error" id="error-san-pham">Vui lòng chọn dung lượng.</span>
    @error('dung_luong')
            <span class="error-message">{{ $message }}</span>
    @enderror
  </div>
</div>


<div class="row">
  <div class="col-md-6">
    <label for="so_luong" class="form-label">Số lượng:</label>
    <input type="number" class="form-control" name="so_luong" id="so-luong" min="1" max="">
    @error('so_luong')
            <span class="error-message">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="gia_ban" class="form-label">Giá bán:</label>
    <input type="number" class="form-control" name="gia_ban" id="gia-ban" min="1" readonly>
    @error('gia_ban')
            <span class="error-message">{{ $message }}</span>
     @enderror
  </div>
</div>
<button type="button" id="btn-them" class="btn btn-success"><span data-feather="plus"></span>Thêm</button>
<br>
<form method="POST" action="{{route('hoa-don.xl-them-moi')}}">
  @csrf
  <div class="table-responsive">
    <table class="table table-striped table-sm" id="tb-ds-san-pham">
      <thead>
        <tr>
          <th>STT</th>
          <th>Sản phẩm</th>
          <th>Màu sắc</th>
          <th>Dung lượng</th>
          <th>Số lượng</th>
          <th>Giá bán</th>
          <th>Thành tiền</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  <input type="hidden" id="sp-id" name="sp" />
  <input type="hidden" id="nv-id" name="nv" />
  <div class="col-md-2">
    <button type="submit" class="btn btn-primary" id="luu"><span data-feather="save"></span>Lưu</button>
  </div>
</form>
@endsection

@section('page-js')
<script type="text/javascript">
  $(document).ready(function() {

    $("#btn-them").click(function() {
      var stt = $("#tb-ds-san-pham tbody tr").length + 1;
      var tenSP = $("#san-pham").find(":selected").text();
      var idSP = $("#san-pham").find(":selected").val();
      var idNV = $("#nhan-vien").find(":selected").val();
      var tenNV = $("#nhan-vien").val();
      var kHang = $("#khach-hang").val();
      var soLuong = $("#so-luong").val();
      var giaBan = $("#gia-ban").val();
      var msID = $("#mau-sac").find(':selected').val();
      var dlID = $("#dung-luong").find(':selected').val();
      var mauSac = $("#mau-sac").find(':selected').text();
      var dungLuong = $("#dung-luong").find(':selected').text();

      var thanhTien = soLuong * giaBan;
      

      if ($("#sp-id").val() === "" || $("#sp-id").val() == "Chọn sản phẩm") {
        $("#error-san-pham").show();
        return;
      } else {
        $("#error-san-pham").hide();
      }

      if (soLuong === "") {
        $("#error-so-luong").show();
        return;
      } else {
        $("#error-so-luong").hide();
      }

      if (kHang === "") {
        $("#error-khach-hang").show();
        return;
      } else {
        $("#error-khach-hang").hide();
      }

      if (giaBan === "") {
        $("#error-gia-ban").show();
        return;
      } else {
        $("#error-gia-ban").hide();
      }
      var row = `<tr>
      <td>${stt}</td>
      <input type="hidden" name="nhanVien[]" value="${idNV}"/>
      <input type="hidden" name="kHang[]" value="${kHang}"/>
      <td>${tenSP}<input type="hidden" name="spID[]" value="${idSP}"/></td>
      <td>${mauSac}<input type="" name="msID[]" value="${msID}"/></td>
      <td>${dungLuong}<input type="" name="dlID[]" value="${dlID}"/></td>
      <td>${soLuong}<input type="hidden" name="soLuong[]" value="${soLuong}"/></td>
      <td>${giaBan}<input type="hidden" name="giaBan[]" value="${giaBan}"/></td>
      <td>${thanhTien}<input type="hidden" name="thanhTien[]" value="${thanhTien}"/></td>
      <td>
        <button type="button" class="btn btn-danger" id="btn-xoa">Xóa</button>
      </td>
      </tr>`;
      $('#tb-ds-san-pham').find('tbody').append(row);
      $("#san-pham").val("Chọn sản phẩm");
      $("#gia-ban").val("");
      $("#so-luong").val("1");
      $("#sp-id").val("");
      $("#nv-id").val("");

    });

    $("#san-pham").click(function() {
      var gb = $(this).find(":selected");
      var giaBan = gb.data("gia-ban");
      $("#gia-ban").val(giaBan);
    });

    $('#tb-ds-san-pham').on('click', '#btn-xoa', function() {
      var tr = $(this).closest('tr');
      tr.remove();
    });

    $("#san-pham, #so-luong, #gia-ban, #khach-hang").change(function() {
      $(`#error-${this.id}`).hide();
    });

    $('#nhan-vien').click(function() {
      $('#nv-id').val(this.value);
    });

    $("#san-pham").click(function() {
      $("#sp-id").val(this.value);
    });


    function updatePrice() {
      var productId = $("#san-pham").find(":selected").val();
      var colorId = $("#mau-sac").find(":selected").val();
      var sizeId = $("#dung-luong").find(":selected").val();
      console.log(productId,colorId,sizeId);
      //console.log(sizeId);
      $.ajax({
          url: "{{ route('lay-gia-ban-ajax') }}",
          method: "GET",
          data: { productid: productId , colorid:colorId , sizeid: sizeId },
          success: function(response) {
              $("#gia-ban").val(response.giaBan);
              console.log(response.giaBan);
          },
          error: function(error) {
              console.log("Lỗi khi cập nhật giá trị max: " + error);
          }
      });
      
    }
    //   // Tổng giá bán là giá của sản phẩm + giá màu sắc + giá dung lượng
    //   var totalPrice = parseInt($("#san-pham").find(":selected").data("gia-ban"));

    //   // Hiển thị tổng giá bán
    //   $("#gia-ban").val(totalPrice);
    // }

    // // Sự kiện thay đổi của dropdown
    // $("#san-pham, #mau-sac, #dung-luong").change(function() {
    //   updatePrice();
    // });

    // // Cập nhật giá khi trang web được tải
    // updatePrice();


     
  

  function updateMaxQuantity() {
      var sanPham1 = $("#san-pham").find(":selected").val();
      var mauSac1 = $("#mau-sac").find(":selected").val();
      var dungLuong1 = $("#dung-luong").find(":selected").val();
      //console.log(sanPham1);
      $.ajax({
          url: "{{ route('lay-so-luong-ajax') }}",
          method: "GET",
          data: { color: mauSac1, capacity: dungLuong1 ,product:sanPham1},
          success: function(response) {
              $("#so-luong").attr("max", response.maxQuantity);
          },
          error: function(error) {
              console.log("Lỗi khi cập nhật giá trị max: " + error);
          }
      });
  }
  var previousValue;
  function layMauvaDungLuong(){
    var selectedProduct = $("#san-pham").find(":selected").val();
    $.ajax({
          url: "{{ route('lay-mau-dung-luong-ajax') }}",
          method: "GET",
          data: { productId: selectedProduct },
          success: function(response) {
              
          var colorsDropdown = $("#mau-sac");
          var capacitiesDropdown = $("#dung-luong");

          // Xóa các option hiện tại
          colorsDropdown.empty();
          capacitiesDropdown.empty();

          
          $.each(response.colors, function(key, value) {
            var option = '<option value="' + key + '">' + value + '</option>';

            // Kiểm tra xem đây có phải là lựa chọn đầu tiên hay không
            if (key === 'Chọn màu sắc') {
                option = '<option>' + key + '</option>' + option;
            }

            colorsDropdown.append(option);
            
          });

          // Thêm option mới cho dung lượng
          $.each(response.sizes, function(key, value) {
            var isSelected = (key === previousValue) ? 'selected' : '';
                capacitiesDropdown.append('<option value="' + key + '" ' + isSelected + '>' + value + '</option>');
            
          });
        },
        error: function(error) {
          console.log("Lỗi khi tải màu sắc và dung lượng: " + error);
        }
        
      });
      updatePrice();  
      updateMaxQuantity(); 
    }
   
  $('#san-pham,#mau-sac,#dung-luong').change(function(){
    
    var currentValue = $(this).val();

    // Kiểm tra nếu giá trị đã thay đổi
    if (currentValue !== previousValue) {
        layMauvaDungLuong();
        // Cập nhật giá trị trước đó
        previousValue = currentValue;
    }
   
      
  });
  
});
</script>
@endsection
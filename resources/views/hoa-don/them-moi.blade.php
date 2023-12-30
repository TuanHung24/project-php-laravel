@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2 class="h2">NHẬP HÓA ĐƠN</h2>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="nhan_vien" class="form-label">Nhân viên:</label>
    <input type="text" class="form-control" value="{{Auth::user()->ho_ten}}" id="nhan-vien" readonly />
    
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


<div class="col-md-6">
  <label for="san-pham" class="form-label">Chi tiết sản phẩm:</label>
  <div id="chi-tiet-sp"></div>
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
  <input type="hidden" id="sp-id" name="sp"/>
  <input type="hidden" id="nv-id" name="qt" value="{{Auth::user()->id}}"/>
  <input type="hidden" id="k-h" name="kh"/>
  <input type="hidden" id='dien-thoai' name="dien_thoai"/>
  <div class="col-md-2">
    <button type="submit" class="btn btn-primary" id="luu"><span data-feather="save"></span>Lưu</button>
  </div>
</form>
@endsection

@section('page-js')
<script type="text/javascript">
  $(document).ready(function() {
    var STT=0;
    $("#btn-them").click(function() {
      // var stt = $("#tb-ds-san-pham tbody tr").length + 1;
      // var tenSP = $("#san-pham").find(":selected").text();
      // var idSP = $("#san-pham").find(":selected").val();
      // var idNV = $("#nhan-vien").find(":selected").val();
      // var tenNV = $("#nhan-vien").val();
      // var kHang = $("#khach-hang").val();
      // var soLuong = $("#so-luong-ct").val();
      // var giaBan = $("#gia-ban").val();
      // var msID = $("#mau-sac-id").val();
      // var dlID = $("#dung-luong-id").val();
      // var mauSac = $('#td-mau-sac').text();
      // var dungLuong = $('#td-dung-luong').text();

      // var thanhTien = soLuong * giaBan;
      themVao();
      
      for (var i = 0; i < selectedItems.length; i++) {
        var item = selectedItems[i];
        var stt = $("#tb-ds-san-pham tbody tr").length + 1;
        STT=stt;
        var idNV = $("#nhan-vien").find(":selected").val();
        var kHang = $("#khach-hang").val();
        var soDT=$('#so-dien-thoai').val();
        $('#k-h').val(kHang);
        $('#dien-thoai').val(soDT);
        var tenSP = $("#san-pham").find(":selected").text();
        var idSP = $("#san-pham").find(":selected").val();
        var msID = item.MauSacId;
        var dlID = item.DungLuongId;
        var mauSac = item.mauSac;
        var dungLuong = item.dungLuong;
        var soLuong = item.soLuong;
        var giaBan = item.giaBan;
        var thanhTien = soLuong*giaBan;

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
      <td>${tenSP}<input type="hidden" name="spID[]" value="${idSP}"/></td>
      <td>${mauSac}<input type="hidden" name="msID[]" value="${msID}"/></td>
      <td>${dungLuong}<input type="hidden" name="dlID[]" value="${dlID}"/></td>
      <td>${soLuong}<input type="hidden" name="soLuong[]" value="${soLuong}"/></td>
      <td>${giaBan}<input type="hidden" name="giaBan[]" value="${giaBan}"/></td>
      <td>${thanhTien}<input type="hidden" name="thanhTien[]" value="${thanhTien}"/></td>
      <td>
        <button type="button" class="btn btn-danger" id="btn-xoa">Xóa</button>
      </td>
      </tr>`;
      $('#tb-ds-san-pham').find('tbody').append(row);
      }
      $("#san-pham").val("Chọn sản phẩm");
      $("#gia-ban").val("");
      $("#so-luong").val("1");
      $("#sp-id").val("");
     
      
      testNamePhone();
      
    });
    
    function testNamePhone()
    {
      if (STT > 0) {
        $('#khach-hang').prop('readonly', true);
        $('#so-dien-thoai').prop('readonly', true);
        
      }
      else{
        $('#khach-hang').prop('readonly', false);
        $('#so-dien-thoai').prop('readonly', false);
        
      }
    }

    $('#tb-ds-san-pham').on('click', '#btn-xoa', function() {
      var tr = $(this).closest('tr');
      tr.remove();
      STT--;
      testNamePhone();
    });

    $("#san-pham, #so-luong, #gia-ban, #khach-hang").change(function() {
      $(`#error-${this.id}`).hide();
    });


    $("#san-pham").click(function() {
      $("#sp-id").val(this.value);
    });

    

    $('#san-pham').change(function() {
      var spId = $('#san-pham').find(':selected').val();
      $.ajax({
          method: 'GET',
          url: "{{route('lay-chi-tiet-sp-ajax')}}",
          data: {
            productId: spId
          }
        })
        .done(function(response) {
          $('#chi-tiet-sp').html(response);
        });
    });

    function themVao() {
    selectedItems = [];  // Reset mảng trước khi chọn mua
    // Iterate through each row in the first table
        $('#table-hd-ctsp tbody tr').each(function() {
            var checkBox = $(this).find('#chon-mua');
            if (checkBox.is(':checked')) {
                var stt = $("#table-hd-ctsp tbody tr").length + 1;
                var mauSac = $(this).find('#td-mau-sac').text();
                var dungLuong = $(this).find('#td-dung-luong').text();
                var soLuong = $(this).find('#so-luong-ct').val();
                var giaBan = $('#gia-ban-id', this).val();
                var MauSacId = $('#mau-sac-id', this).val();
                var DungLuongId = $('#dung-luong-id', this).val();
                // Add selected item to the array
                selectedItems.push({
                    stt: stt,
                    mauSac: mauSac,
                    dungLuong: dungLuong,
                    soLuong: soLuong,
                    giaBan: giaBan,
                    MauSacId:MauSacId,
                    DungLuongId:DungLuongId
                });
            }
        });
         
          };
  });
</script>
@endsection
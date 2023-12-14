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
  <div class="col-md-6">
    <label for="san_pham" class="form-label">Sản phẩm:</label>
    <select name="san_pham" class="form-select" id="san-pham" required>
      <option selected disabled>Chọn sản phẩm</option>
      @foreach($dsSanPham as $sanPham)
      <option value="{{$sanPham->id}}" data-gia-ban="{{$sanPham->chi_tiet_san_pham->gia_ban}}">{{$sanPham->ten}}</option>
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
    <label for="khach-hang" class="form-label">Khách hàng:</label>
    <input type="text" class="form-control" name="khach_hang" id="khach-hang">
    @error('khach_hang')
            <span class="error-message">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="so_luong" class="form-label">Số lượng:</label>
    <input type="number" class="form-control" name="so_luong" id="so-luong" min="1" value="1">
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
          <th>Nhân viên</th>
          <th>Khách hàng</th>
          <th>Sản phẩm</th>
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
      <td>${tenNV}<input type="hidden" name="nhanVien[]" value="${idNV}"/></td>
      <td>${kHang}<input type="hidden" name="kHang[]" value="${kHang}"/></td>
      <td>${tenSP}<input type="hidden" name="spID[]" value="${idSP}"/></td>
      <td>${soLuong}<input type="hidden" name="soLuong[]" value="${soLuong}"/></td>
      <td>${giaBan}<input type="hidden" name="giaBan[]" value="${giaBan}"/></td>
      <td>${thanhTien}<input type="hidden" name="thanhTien[]" value="${thanhTien}"/></td>
      <td>
        <button type="button" class="btn btn-danger" id="btn-xoa">Xóa</button>
      </td>
      </tr>`;
      $('#tb-ds-san-pham').find('tbody').append(row);
      $("#san-pham").val("Chọn sản phẩm");
      $("#khach-hang").val("");
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


  });
</script>
@endsection
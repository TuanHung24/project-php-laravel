@extends('master')

@section('content')
<div id="thong-bao" class="alert alert-danger" style="display: none;"></div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2 class="h2">NHẬP HÀNG</h2>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="nha_cung_cap" class="form-label">Chọn nhà cung cấp:</label>
    <select for="nha_cung_cap" class="form-select" id="nha-cung-cap">
      <option selected disabled>Chọn nhà cung cấp</option>
      @foreach($dsNhaCungCap as $nhaCungCap)
      <option value="{{$nhaCungCap->id}}" id="nha_cung_cap">{{$nhaCungCap->ten}}</option>
      @endforeach
    </select>
    <span class="error" id="error-nha-cung-cap">Vui lòng chọn nhà cung cấp.</span>
  </div>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2 class="h2">DANH SÁCH SẢN PHẨM</h2>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="san_pham" class="form-label">Sản phẩm:</label>
    <select name="san_pham" class="form-select" id="san-pham">
      <option selected disabled>Chọn sản phẩm</option>
      @foreach($dsSanPham as $sanPham)
      <option value="{{$sanPham->id}}">{{$sanPham->ten}}</option>
      @endforeach
    </select>
    <span class="error" id="error-san-pham">Vui lòng chọn sản phẩm.</span>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <label for="san_pham" class="form-label">Màu sắc:</label>
    <select name="san_pham" class="form-select" id="san-pham">
      <option selected disabled>Chọn màu</option>
      @foreach($dsMau as $Mau)
      <option value="{{$Mau->id}}">{{$Mau->mau}}</option>
      @endforeach
    </select>
    <span class="error" id="error-mau">Vui lòng chọn màu sắc.</span>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="mau_sac" class="form-label">Màu sắc:</label>
    <select name="mau_sac" class="form-select" id="mau-sac">
      <option selected disabled>Chọn màu</option>
      @foreach($dsMau as $Mau)
      <option value="{{$Mau->id}}">{{$Mau->mau}}</option>
      @endforeach
    </select>
    <span class="error" id="error-mau">Vui lòng chọn màu sắc.</span>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="dung_luong" class="form-label">Dung lượng:</label>
    <select name="dung_luong" class="form-select" id="dung-luong">
      <option selected disabled>Chọn dung lượng</option>
      @foreach($dsDungLuong as $dungLuong)
      <option value="{{$dungLuong->id}}">{{$dungLuong->dung_luong}}</option>
      @endforeach
    </select>
    <span class="error" id="error-dung-luong">Vui lòng chọn màu sắc.</span>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="so_luong" class="form-label">Số lượng:</label>
    <input type="number" class="form-control" name="so_luong" id="so-luong" value="1">
    <span class="error" id="error-so-luong">Vui lòng nhập số lượng.</span>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="gia_nhap" class="form-label">Giá nhập:</label>
    <input type="number" class="form-control" name="gia_nhap" id="gia-nhap">
    <span class="error" id="error-gia-nhap">Vui lòng nhập giá nhập.</span>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="gia_ban" class="form-label">Giá bán:</label>
    <input type="number" class="form-control" name="gia_ban" id="gia-ban">
    <span class="error" id="error-gia-ban">Vui lòng nhập giá bán.</span>
  </div>
</div>
<button type="button" id="btn-them" class="btn btn-success"><span data-feather="plus"></span>Thêm</button>
<br>
<form method="POST" action="{{route('nhap-hang.xl-them-moi')}}">
  @csrf
  <div class="table-responsive">
    <table class="table table-striped table-sm" id="tb-ds-san-pham">
      <thead>
        <tr>
          <th>STT</th>
          <th>Sản phẩm</th>
          <th>Số lượng</th>
          <th>Giá nhập</th>
          <th>Giá bán</th>
          <th>Thành tiền</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  <input type="hidden" id="ncc-id" name="ncc"/>
  <input type="hidden" id="sp-id" name="sp" />
  <div class="col-md-2">
    <button type="submit" class="btn btn-primary"><span data-feather="save"></span>Lưu</button>
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
      var dungLuong = $("#dung-luong").find(":selected").text();
      var idDL = $("#dung-luong").find(":selected").val();
      var mauSac = $("#mau-sac").find(":selected").text();
      var idMS = $("#mau-sac").find(":selected").val();
      var soLuong = $("#so-luong").val();
      var giaNhap = $("#gia-nhap").val();
      var giaBan = $("#gia-ban").val();
      var thanhTien = soLuong * giaNhap;

      if ($("#ncc-id").val() === "" || $("#ncc-id").val() === "Chọn nhà cung cấp") {
        $("#error-nha-cung-cap").show();
        return;
      } else {
        $("#error-nha-cung-cap").hide();
      }

      if ($("#sp-id").val() === "" || $("#sp-id").val() === "Chọn sản phẩm") {
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

      if (giaNhap === "") {
        $("#error-gia-nhap").show();
        return;
      } else {
        $("#error-gia-nhap").hide();
      }

      if (giaBan === "") {
        $("#error-gia-ban").show();
        return;
      } else {
        $("#error-gia-ban").hide();
      }

      var row = `<tr>
      <td>${stt}</td>
      <td>${tenSP}<input type="hidden" name="idSP[]" value="${idSP}"/></td>
      <td>${soLuong}<input type="hidden" name="soLuong[]" value="${soLuong}"/></td>
      <td>${giaNhap}<input type="hidden" name="giaNhap[]" value="${giaNhap}"/></td>
      <td>${giaBan}<input type="hidden" name="giaBan[]" value="${giaBan}"/></td>
      <td>${thanhTien}<input type="hidden" name="thanhTien[]" value="${thanhTien}"/></td>
      <td>

      
        <button type="button" id="btn-xoa">Xóa</button>
      </td>
      </tr>`;

      $('#tb-ds-san-pham').find('tbody').append(row);
      $("#nha-cung-cap").val("Chọn nhà cung cấp");
      $("#san-pham").val("Chọn sản phẩm");
      $("#gia-nhap").val("");
      $("#gia-ban").val("");
      $("#so-luong").val("1");

    });

    $('#tb-ds-san-pham').on('click', '#btn-xoa', function() {
      var tr = $(this).closest('tr');
      tr.remove();
    });

    $("#san-pham, #so-luong, #gia-nhap, #gia-ban").change(function() {
      $(`#error-${this.id}`).hide();
    });

    $("#nha-cung-cap").click(function() {
      $("#ncc-id").val(this.value);
    });

    $("#san-pham").click(function() {
      $("#sp-id").val(this.value);
    });

  });
</script>
@endsection
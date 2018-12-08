;
//disable nút phân quyền
function displayActionPQ()
{
    if($('#select-pq option:selected').val() == '0'){
        $('#delete-pq').prop('disabled', true);
        $('#edit-quyen').prop('disabled', true);
        $('#edit-pq').prop('disabled', true);
    } else {
        $('#delete-pq').prop('disabled', false);
        $('#edit-quyen').prop('disabled', false);
        $('#edit-pq').prop('disabled', false);
    }
}

function goBack() {
    window.history.back();
}

function txtVatLieu() {
    $val = '';
    $('#table_material_product > tbody > tr').each(function() {
        $txt = $(this).find('input[ id="tenvl_table"]').val();
        $val += $txt+', ';
    });
    $a = $val.length;
    $val = $val.substr(0,$a-2);
    $('#vatlieu').val($val);
}

function refreshXuatkho() {
    $.ajax({
        url : "/admin/chitietphieuxuat/session/refresh",
        method: "GET",
        async: false,
        success:function($data)
        {
            $text= ' ';
            jQuery.each($data, function($key, $kh) {
                $Stt = $key+1;
                $text +='<tr>'
                $text +='<th scope="row" style="vertical-align:middle; text-align: center;">'+ $Stt +'</th>'
                $text +='<td style="vertical-align:middle; text-align: center;">'
                $text +='<span style="font-weight: bold;">'+$kh['name']+'</span>'
                $text +='</td>'
                $text +='<td style="vertical-align:middle; text-align: center;">'
                $text +='<input type="hidden" class="dongia_nhapxuat" value="'+$kh['dongia']+'">'
                $text +='<span style="font-weight: bold;" >'+number_format($kh['dongia'],0,',','.')+'</span> VNĐ'
                $text +='</td>'
                $text +='<td style="vertical-align:middle; text-align: center;">'
                $text +='<input type="number" name="soluong_session" class="form-control soluong_phieuxuat" data-id="'+$key+'" value="'+$kh['soluong']+'">'
                $text +='</td>'
                $text +='<td style="vertical-align:middle; text-align: center;">'
                $text +='<span style="font-weight: bold;" class="amount_nhapxuat">0</span> VNĐ'
                $text +='</td>'
                $text +='<td align="center"  style="vertical-align:middle;">'
                $text +='<button type="button" data-id="'+$key+'" class="btn btn-primary btn_delete_session_xuatkho"><span class="icon ion-ios-trash""></span></button>'
                $text +='</td>'
                $text +='</tr>';
            }); 
            $('.tbody_xuatkho').html($text);
            tinhtiennhapxuat();
        },
        error: function (data,Status,thr) {
            console.log("error: ",data,Status,thr);
        }
    })
}

function refreshyecau() {
    $.ajax({
        url : "/admin/chitietyeucaunx/session/refresh",
        method: "GET",
        async: false,
        success:function($data)
        {
            $text= ' ';
            jQuery.each($data, function($key, $kh) {
                $Stt = $key+1;
                $text +='<tr>'
                $text +='<th scope="row" style="vertical-align:middle; text-align: center;">'+ $Stt +'</th>'
                $text +='<td style="vertical-align:middle; text-align: center;">'
                $text +='<span style="font-weight: bold;">'+$kh['name']+'</span>'
                $text +='</td>'
                $text +='<td style="vertical-align:middle; text-align: center;">'
                $text +='<input type="hidden" class="dongia_nhapxuat" value="'+$kh['dongia']+'">'
                $text +='<span style="font-weight: bold;" >'+number_format($kh['dongia'],0,',','.')+'</span> VNĐ'
                $text +='</td>'
                $text +='<td style="vertical-align:middle; text-align: center;">'
                $text +='<input type="number" name="soluong_session" class="form-control soluong_yeucau" data-id="'+$key+'" value="'+$kh['soluong']+'">'
                $text +='</td>'
                $text +='<td style="vertical-align:middle; text-align: center;">'
                $text +='<span style="font-weight: bold;" class="amount_nhapxuat">0</span> VNĐ'
                $text +='</td>'
                $text +='<td align="center"  style="vertical-align:middle;">'
                $text +='<button type="button" data-id="'+$key+'" class="btn btn-primary btn_delete_session_yeucau"><span class="icon ion-ios-trash""></span></button>'
                $text +='</td>'
                $text +='</tr>';
            }); 
            $('.tbody_xuatkho').html($text);
            tinhtiennhapxuat();
        },
        error: function (data,Status,thr) {
            console.log("error: ",data,Status,thr);
        }
    })
}


function number_format( number, decimals, dec_point, thousands_sep ) {
    // http://kevin.vanzonneveld.net
    // + original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // + bugfix by: Michael White (http://crestidg.com)
    // + bugfix by: Benjamin Lupton
    // + bugfix by: Allan Jensen (http://www.winternet.no)
    // + revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // * example 1: number_format(1234.5678, 2, '.', '');
    // * returns 1: 1234.57
                              
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                              
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}

//disable nút xóa
function displaybuttonTK()
{
    if($('#table-taikhoan tr th ').find(':input[type="checkbox"]').is(":checked")){
        $('#btn-delete-tk').prop('disabled', false);
    } else {
        $('#btn-delete-tk').prop('disabled', true);
    }

    if($('#table-khachhang tr th ').find(':input[type="checkbox"]').is(":checked")){
        $('#btn-delete-kh').prop('disabled', false);
    } else {
        $('#btn-delete-kh').prop('disabled', true);
    }

    if($('#table-tintuc tr th ').find(':input[type="checkbox"]').is(":checked")){
        $('#btn-delete-tt').prop('disabled', false);
    } else {
        $('#btn-delete-tt').prop('disabled', true);
    }

    if($('#table-loaitt tr th ').find(':input[type="checkbox"]').is(":checked")){
        $('#btn-delete-loaitt').prop('disabled', false);
    } else {
        $('#btn-delete-loaitt').prop('disabled', true);
    }

    if($('#table-sanphamht tr th ').find(':input[type="checkbox"]').is(":checked")){
        $('#btn-delete-sanphamht').prop('disabled', false);
    } else {
        $('#btn-delete-sanphamht').prop('disabled', true);
    }

    if($('#table-sanpham tr th ').find(':input[type="checkbox"]').is(":checked")){
        $('#btn-delete-sanpham').prop('disabled', false);
    } else {
        $('#btn-delete-sanpham').prop('disabled', true);
    }

    if($('#table-loaisp tr th ').find(':input[type="checkbox"]').is(":checked")){
        $('#btn-delete-loaisp').prop('disabled', false);
    } else {
        $('#btn-delete-loaisp').prop('disabled', true);
    }

    if($('#table-ncc tr th ').find(':input[type="checkbox"]').is(":checked")){
        $('#btn-delete-ncc').prop('disabled', false);
    } else {
        $('#btn-delete-ncc').prop('disabled', true);
    }

    if($('.tbody-search-kh tr th ').find(':input[type="radio"]').is(":checked")){
        $('#btn-select-kh').prop('disabled', false);
    } else {
        $('#btn-select-kh').prop('disabled', true);
    }

    if($('.table-thietke tr th ').find(':input[type="radio"]').is(":checked")){
        $('#btn-select-thietke-ycsx').prop('disabled', false);
        $('#btn-select-thietke').prop('disabled', false);
    } else {
        $('#btn-select-thietke-ycsx').prop('disabled', true);
        $('#btn-select-thietke').prop('disabled', true);
    }

    if($('.tbody-search-ncc tr th ').find(':input[type="radio"]').is(":checked")){
        $('#btn-select-ncc').prop('disabled', false);
    } else {
        $('#btn-select-ncc').prop('disabled', true);
    }

    if($('.table-donhang-baohanh tr th ').find(':input[type="radio"]').is(":checked")){
        $('#btn-select-bh').prop('disabled', false);
    } else {
        $('#btn-select-bh').prop('disabled', true);
    }

    if($('.table-donhang-hoadon tr th ').find(':input[type="radio"]').is(":checked")){
        $('#btn-select-hd').prop('disabled', false);
    } else {
        $('#btn-select-hd').prop('disabled', true);
    }

    if($('.table-donhang-ycsx tr th ').find(':input[type="radio"]').is(":checked")){
        $('#btn-select-ycsx').prop('disabled', false);
    } else {
        $('#btn-select-ycsx').prop('disabled', true);
    }

    if($('.tbody-search-sp tr th ').find(':input[type="radio"]').is(":checked")){
        $('#btn-select-sp').prop('disabled', false);
    } else {
        $('#btn-select-sp').prop('disabled', true);
    }

    if($('.table-sanpham-vt tr th ').find(':input[type="radio"]').is(":checked")){
        $('#btn-select-vt').prop('disabled', false);
    } else {
        $('#btn-select-vt').prop('disabled', true);
    }

    if($('.table-sanpham-vt tr th ').find(':input[type="radio"]').is(":checked")){
        $('#btn-select-vt-pn').prop('disabled', false);
    } else {
        $('#btn-select-vt-pn').prop('disabled', true);
    }

    if($('#table-donhang tr th ').find(':input[type="radio"]').is(":checked")){
        $('#btn-delete-donhang').prop('disabled', false);
        
    } else {
        $('#btn-delete-donhang').prop('disabled', true);
        $('#btn-duyet').prop('disabled', true);
        $('#btn-huyduyet').prop('disabled', true);
    }

    if($('#table-donhang-customer tr th ').find(':input[type="radio"]').is(":checked")){
        $('#btn-delete-donhang-customer').prop('disabled', false);
    } else {
        $('#btn-delete-donhang-customer').prop('disabled', true);
    }

    if($('#table-thietke tr th ').find(':input[type="checkbox"]').is(":checked")){
        $('#btn-delete-thietke').prop('disabled', false);
    } else {
        $('#btn-delete-thietke').prop('disabled', true);
    }

    if($('#table-baohanh tr th ').find(':input[type="checkbox"]').is(":checked")){
        $('#btn-delete-baohanh').prop('disabled', false);
    } else {
        $('#btn-delete-baohanh').prop('disabled', true);
    }

    if($('#table-vattu tr th ').find(':input[type="checkbox"]').is(":checked")){
        $('#btn-delete-vattu').prop('disabled', false);
    } else {
        $('#btn-delete-vattu').prop('disabled', true);
    }

}

// hiển thị ảnh modal thông tin nhân viên
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#AnhNV-show').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

function tinhtongtien() {
    $tong = 0;
    $tax = $('#thue_donhang').val();
    $phantramthue = $tax / 100;
    $('.table-bill-details > tbody  > tr').each(function() {
        var qty = $(this).find(':input[type="number"]').val();
        var price = $(this).find('#price').val();
        var amount = (qty*price);
        $tongsp = number_format(amount,0,',','.');
        $tong+=amount;
        $(this).find('.amount').text($tongsp);
    });
    $tienthue = $tong*$phantramthue;
    $tongtien = $tong + $tienthue;
    $tientra = $('#thanhtoan_donhang').val();
    $giamtru = $('#giamtru_donhang').val();
    $conlai = $tongtien - $tientra - $giamtru;
    $('.subtotal-donhang').text(number_format($tong,0,',','.'));
    $('#tax-donhang').text(number_format($tienthue,0,',','.'));
    $('#thanhtien_donhang').val(number_format($tongtien,0,',','.')+' VNĐ');
    $('#thanhtien_donhang_hidden').val($tongtien);
    $('#conno_donhang').val(number_format($conlai,0,',','.')+' VNĐ');
}

function tinhtiennhapxuat() {
    $tong = 0;
    $('.table-nhapxuat-details > tbody  > tr').each(function() {
        var qty = $(this).find(':input[name="soluong_session"]').val();
        var price = $(this).find('.dongia_nhapxuat').val();
        var amount = (qty*price);
        $tongsp = number_format(amount,0,',','.');
        $tong+=amount;
        $(this).find('.amount_nhapxuat').text($tongsp);
    });
    $('#subtotal-donhang').text(number_format($tong,0,',','.'));
    $('#thanhtien_hidden_phieunhap').val($tong);
    $('#tongtien_phieunhap').val(number_format($tong,0,',','.')+' VNĐ');
}

function tinhtongthongke() {
    $tong = 0;
    $('.table-TKPX > tbody  > tr').each(function() {
        $thanhtien = $(this).find('.thanhtien_tkbc_nx').val();
        $tong += parseFloat($thanhtien);
    });
    $('#tongtien_tkbc_nx').text(number_format($tong,0,',','.'));
}

function tintienhoadon() {
    $tongtien = $('#thanhtien_hoadon_hidden').val();
    $thanhtoan = $('#thanhtoan_hoadon_edit').val();
    $giamtru = $('#giamtru_hoadon_edit').val();
    $no = $tongtien - $thanhtoan - $giamtru;
    ($no < 0 )? $no = 0 : $no = $no;
    $("#conno_hoadon").val(number_format($no,0,',','.'));
    if ($no == 0 || $no < 0) {
        $("#trangthai_hoadon_hidden").val(2);
        $("#trangthai_hoadon").html('<span style="color: #32C24D; font-weight: bold;">Đã trả</span>');
    } else {
        $("#trangthai_hoadon_hidden").val(1);
        $("#trangthai_hoadon").html('<span style="color: #D14424; font-weight: bold;">Còn nợ</span>');
    }
}

function dateformat(datetime)
{
    date = new Date(datetime);
    var year = date.getFullYear(),
    month = date.getMonth() + 1,
    day = date.getDate();

    return day+'/'+month+'/'+year;
}

function TrangThaiTk($trangthai)
{
    if($trangthai == 1 ) {
        return 'Hoạt động';
    } else {
        return 'Khóa';
    }
}

function GioiTinhNV($trangthai)
{
    if($trangthai == 1 ) {
        return 'Nam';
    } else {
        return 'Nữ';
    }
}

function afterNow($Date)
{
    $now = new Date();
    $date = new Date($Date);
    $nowDate = $now.getDate();
    $nowMonth = $now.getMonth();
    $nowYear = $now.getFullYear();
    $dateDate = $date.getDate();
    $dateMonth = $date.getMonth();
    $dateYear = $date.getFullYear();

    if ($dateDate < $nowDate || $dateMonth < $nowMonth || $dateYear < $nowYear) {
        return true;
    } else {
        return false;
    }
}

function requestYCSX()
{
    $name_yc = $('#name_yc_bill').val();
    $ngayhen = $('#ngayhen_bill').val();
    $ngaytra = $('#ngaytra_bill').val();
    $a = true;
    if ($name_yc == "") {
        alert(" Tên yêu cầu không được bỏ trống!");
        return $a = false; 
    } else if ($name_yc.length > 255) {
        alert(" Tên yêu cầu không vượt quá 255 ký tự!");
        return $a = false; 
    } else if ($ngayhen == "" || $ngaytra == "") {
        alert(" Ngày hẹn và ngày trả không được bỏ trống!");
        return $a = false; 
    } else if (afterNow($ngayhen) || afterNow($ngaytra)) {
        alert(" Ngày hẹn và ngày trả không được trước ngày hôm này!");
        return $a = false; 
    } else {
        return true;
    }
}



function LoadListNV()
{
    $url = '/admin/Load_nv';
    $data = { };
    $.get($url, $data, function(data) {
        $html = "";
        $.each(data, function($k,$v) {
            $html +=    '<tr>'
            $html +=     '<th scope="row"><input type="checkbox" data-id="'+$v['id']+'" name="checkbox-1"></th>'
            $html +=    '<td>'+$v['TenNV']+'</td>'
            $html +=    '<td>'+GioiTinhNV($v['GioiTinh'])+'</td>'
            $html +=    '<td>'+$v['QueQuan']+'</td>'
            $html +=    '<td>'+dateformat($v['NgaySinh'])+'</td>'
            $html +=    '<td>'+$v['DanToc']+'</td>'
            $html +=    '<td>'+$v['CMND']+'</td>'
            $html +=    '<td>'+$v['SDT']+'</td>'
            $html +=    '<td>'+$v['Mail']+'</td>'
            $html +=    '<td align="center"><a href="#" id="btn-select-nv"  data-id="'+$v['id']+'" data-toggle="modal" data-target="#modal-suaNV"><span class="ion-compose tacvu-icon"></span></a></td>'
            $html +=    '</tr>'
        });
        $('#table-nhanvien').html($html);
    });
    displaybuttonTK();
}



$(function(){

    tinhtongtien();
    tinhtiennhapxuat();
    tintienhoadon();
    displayActionPQ();
    displaybuttonTK();
    txtVatLieu();
    tinhtongthongke();

    $('#thue_donhang').change(function() {
        tinhtongtien();
    });

    $('#thanhtoan_donhang').change(function() {
        tinhtongtien();
    });

    $('#giamtru_donhang').change(function() {
        tinhtongtien();
    });

    // chọn ảnh bìa của post
    $('#select_image_post').change(function() {
        $val = $(this).val();
        if ($val.substring(3,11) == 'fakepath') {
            $val = $val.substring(12);
        }
        $('#name_image_post').text($val);
    });

    $(document).on('change', '#select_file_designs', function() {
        $val = $(this).val();
        $size = $('#select_file_designs')[0].files[0].size;
        $type =  $val.substr($val.indexOf(".") + 1)
        if ($val.substring(3,11) == 'fakepath') {
            $val = $val.substring(12);
        }
        $size = $size/1024;
        var n = parseFloat($size);
        $size = Math.round(n * 1000)/1000;
        $('#name_file_designs').text($val.substr(0,50));
        $('#size_file_designs').val($size+' KB');
        $('#size_file_designs_1').val($size);
        $('#type_file_designs').val('.'+$type);
    });

    $("#btn_create_ycsx_bill").click(function() {
      $a = requestYCSX();
      if ($a) {
        event.preventDefault();
        $('#form_create_ycsx_bill').submit();
      }
    });


    $("#files").change(function() {
      readURL(this);
    });

    $("#select_image_post").change(function() {
      readURL(this);
    });

    $(document).on('change', '#select_file_designs', function() {
        $val = $(this).val();
        $type =  $val.substr($val.indexOf(".") + 1)
        if ($type == 'png' || $type == 'jpg' || $type == 'JPG' || $type == 'PNG') {
            readURL(this);
        } else {
            $local = document.location.origin;
            $('#AnhNV-show').attr('src', $local+'/upload/icon/Docs-icon.png');
        }
        
    });

    $(document).on('change','#thanhtoan_hoadon_edit',function() {
        tintienhoadon();
    });

    $(document).on('change','#giamtru_hoadon_edit',function() {
        tintienhoadon();
    });


    $('#table-taikhoan tr th ').find(':input[type="checkbox"]').click(function() {
        displaybuttonTK();
    });

    $('#table-ncc tr th ').find(':input[type="checkbox"]').click(function() {
        displaybuttonTK();
    });

    $('#table-khachhang tr th ').find(':input[type="checkbox"]').click(function() {
        displaybuttonTK();
    });

    $('#table-tintuc tr th ').find(':input[type="checkbox"]').click(function() {
        displaybuttonTK();
    });

    $('#table-loaitt tr th ').find(':input[type="checkbox"]').click(function() {
        displaybuttonTK();
    });

    $('#table-loaisp tr th ').find(':input[type="checkbox"]').click(function() {
        displaybuttonTK();
    });

    $('#table-sanphamht tr th ').find(':input[type="checkbox"]').click(function() {
        displaybuttonTK();
    });

    $('#table-sanpham tr th ').find(':input[type="checkbox"]').click(function() {
        displaybuttonTK();
    });

    $(document).on( 'click', '.table-donhang-baohanh tr th :input[type="radio"]',function() {
        displaybuttonTK();
    });

    $(document).on( 'click', '.table-thietke tr th :input[type="radio"]',function() {
        displaybuttonTK();
    });

     $(document).on( 'click', '.table-donhang-ycsx tr th :input[type="radio"]',function() {
        displaybuttonTK();
    });

    $(document).on( 'click', '.table-donhang-hoadon tr th :input[type="radio"]',function() {
        displaybuttonTK();
    });

    $(document).on( 'click', '.tbody-search-kh tr th :input[type="radio"]',function() {
        displaybuttonTK();
    });

    $(document).on( 'click', '.table-sanpham-vt tr th :input[type="radio"]',function() {
        displaybuttonTK();
    });

    $(document).on('click','.tbody-search-sp tr th :input[type="radio"]',function() {
        displaybuttonTK();
    });

    $(document).on('click','.tbody-search-ncc tr th :input[type="radio"]',function() {
        displaybuttonTK();
    });

    $(document).on('click','#table-thietke tr th :input[type="checkbox"]',function() {
        displaybuttonTK();
    });

    $(document).on('click','#table-baohanh tr th :input[type="checkbox"]',function() {
        displaybuttonTK();
    });

    $(document).on('click','#table-vattu tr th :input[type="checkbox"]',function() {
        displaybuttonTK();
    });

    $(document).on('click','#table-donhang tr th :input[type="radio"]',function() {
        $tiendo = $(this).data('tiendo').toString();
        if ($tiendo == 1 ) {
            $('#btn-duyet').text('Duyệt đơn');
            $('#btn-duyet').val(1);
            $('#btn-duyet').prop('disabled', false);
            $('#btn-huyduyet').prop('disabled', true);
        } else if ($tiendo == 2) {
            $('#btn-duyet').text('Chờ sản xuất');
            $('#btn-duyet').val(2);
            $('#btn-duyet').attr('data-toggle','modal');
            $('#btn-duyet').attr('data-target','#modal_createYcsx');
            $('#btn-duyet').prop('disabled', false);
            $('#btn-huyduyet').prop('disabled', false);
        } else {
            $('#btn-duyet').prop('disabled', true);
            $('#btn-huyduyet').prop('disabled', true);
        }
        displaybuttonTK();
    });

    $(document).on('click','#table-donhang-customer tr th :input[type="radio"]',function() {
        displaybuttonTK();
    });

    //header stiky frontend
    $(window).ready(function(){
      $(".navbar-top").sticky({topSpacing:0});
    });

    // header stiky backend
    $(window).ready(function(){
      $(".navbar-backend").sticky({topSpacing:0});
    });

    // hiệu ứng dàn ảnh
    $('.grid').masonry({
      itemSelector: '.grid-item',
      percentPosition: true,
    });


    // hiệu ứng form phản hồi
    $('.form').find('input, textarea').on('keyup blur focus', function (e) {               
        var $this = $(this),
        label = $this.prev('label');
        if (e.type === 'keyup') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.addClass('active highlight');
            }
        } else if (e.type === 'blur') {
            if( $this.val() === '' ) {
                label.removeClass('active highlight'); 
            } else {
                label.removeClass('highlight');   
            }   
        } else if (e.type === 'focus') {     
            if( $this.val() === '' ) {
                label.removeClass('highlight'); 
            } else if( $this.val() !== '' ) {
                label.addClass('highlight');
            }
        }                
    }); 

    // chọn tất cả trong quản lý nhân viên
    $('#select-all').click(function(event) {   
        if(this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;                        
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;                       
            });
        }
        displaybuttonTK();
    });

    //tab trong quarn lý tài khoản
    $(document).ready(function() {
        $('.tabs-qltk .tab-links a').on('click', function(e)  {
            var currentAttrValue = $(this).attr('href');
            $('.tabs-qltk ' + currentAttrValue).show().siblings().hide();
            $(this).parent('li').addClass('active').siblings().removeClass('active');
            e.preventDefault();
        });
    });

    // tìm kiếm bảng trong đăng ký tài khoản
    $(document).ready(function() {
        $('#btn-search-nv').on('click', function() {

            $search = $('#search-nhanvien').val();

            $.ajax({
                url : "/admin/action",
                method: "GET",
                data : {
                    "search" : $search
                },
                async: false,
                success:function($data)
                {
                    console.log($data);
                    $text = '';
                    $stt = 1;
                    if ($data.length > 0) {
                        jQuery.each($data, function($key, $nv) {
                            ($nv['GioiTinh'] == 1 )? $nv['GioiTinh'] = 'Nam' : $nv['GioiTinh'] = 'Nữ';
                            $datetime = new Date($nv['NgaySinh']);
                            $text +='<tr class="dong" data-id="'+ $stt +'">'+
                                '<th scope="row"><input type="radio" id="rd-chon" data-id="'+$nv['id']+'" name="chon-nv"></th>'+
                                '<td>'+$nv['TenNV']+'</td>'+
                                '<td>'+$nv['GioiTinh']+'</td>'+
                                '<td>'+$nv['QueQuan']+'</td>'+
                                '<td>'+dateformat($datetime)+'</td>'+
                                '<td>'+$nv['DanToc']+'</td>'+
                                '<td>'+$nv['CMND']+'</td>'+
                                '<td>'+$nv['SDT']+'</td>'+
                                '<td>'+$nv['Mail']+'</td>'+
                            '</tr>';
                            $stt++;
                        }); 
                    } else {
                        $text = '<td align="center" colspan="9">Không tìm thấy nhân viên</td>'
                    }
                    $('.tbody-search-tk').html($text);
                    console.log("data: ",$data);
                },
                error: function (data,Status,thr) {
                    console.log("error: ",data,Status,thr);
                }
            })

        });
    });

    // tìm kiếm nhà cung cấp trong vật tư
    $(document).ready(function() {
        $('#btn-search-ncc').on('click', function() {

            $search = $('#search-ncc').val();

            $.ajax({
                url : "/admin/findncc",
                method: "GET",
                data : {
                    "search" : $search
                },
                async: false,
                success:function($data)
                {
                    $text = '';
                    $stt = 1;
                    if ($data.length > 0) {
                        jQuery.each($data, function($key, $nc) {
                            ($nc['mota'] == null )? $nc['mota'] = '' : $nc['mota'] = $nc['mota'].substr(0,50);
                            $text += '<tr>';
                            $text += '<th align="center" style="vertical-align: middle;" scope="row"><input type="radio" data-id="'+$nc['id']+'" data-name="'+$nc['name']+'"  name="radio-1"></th>';
                            $text += '<td align="center" style="vertical-align: middle;">'+$nc['name']+'</td>';
                            $text += '<td>'+$nc['address']+'</td>';
                            $text += '<td align="center" style="vertical-align: middle;">'+$nc['mail_address']+'</td>';
                            $text += '<td align="center" style="vertical-align: middle;">'+$nc['phone']+'</td>';
                            $text += '<td>'+$nc['mota']+'</td';
                            $text += '</tr>';
                        }); 
                    } else {
                        $text = '<td align="center" colspan="7">Không tìm thấy nhà cung cấp</td>'
                    }
                    $('.tbody-search-ncc').html($text);
                },
                error: function (data,Status,thr) {
                    console.log("error: ",data,Status,thr);
                }
            })

        });
    });

    $('#select_khohang_xuatkho').change(function() {
        $val = $(this).val();
        $.ajax({
            url : "/admin/chitietphieuxuat/session/selectKho",
            method: "GET",
            data : {
                "khohang_id" : $val
            },
            async: false,
            success:function($data)
            {
                $text = '';
                $stt = 1;
                if ($data.length > 0) {
                    jQuery.each($data, function($key, $nc) {
                        ($nc['mota'] == null )? $nc['mota'] = '' : $nc['mota'] = $nc['mota'].substr(0,50);
                        ($nc['loaivt'] == 1 )? $nc['loaivt'] = 'Vật liệu' : $nc['loaivt'] = 'Công cụ';
                        $text += '<tr>';
                        $text += '<th align="center" style="vertical-align: middle;" scope="row"><input type="radio" data-id="'+$nc['id']+'" data-name="'+$nc['name']+'" data-dongia="'+$nc['dongia']+'" name="radio-1"></th>'
                        $text += '<td align="center" style="vertical-align: middle;">'+$nc['name']+'</td>';
                        $text += '<td align="center" style="vertical-align: middle;">'+$nc['mausac']+'</td>';
                        $text += '<td align="center" style="vertical-align: middle;">'+$nc['soluong']+'</td>';
                        $text += '<td>'+$nc['mota']+'</td>';
                        $text += '<td align="center" style="vertical-align: middle;">'+$nc['thuonghieu']+'</td>';
                        $text += '<td align="center" style="vertical-align: middle;">'+$nc['ncc']+'</td>';
                        $text += '<td align="center" style="vertical-align: middle;">'+$nc['loaivt']+'</td>';
                        $text += '<td align="center" style="vertical-align: middle;">'+number_format($nc['dongia'],0,',','.')+' VNĐ</td>';
                        $text += '</tr>';
                    }); 
                } else {
                    $text = '<td align="center" colspan="8">Không có vật tư nào trong kho này</td>'
                }
                $('.table-sanpham-vt').html($text);
            },
            error: function (data,Status,thr) {
                console.log("error: ",data,Status,thr);
            }
        })
    });

    $('.soluong_cart').change(function() {
        $val = $(this).val();
        $id = $(this).data('id');
        $('.id_value').val($id);
        $('.qty_value').val($val);
        event.preventDefault();
        $('.qty_cart').submit();
    });

    $('#select_loaitk_tkbc').change(function() {
        event.preventDefault();
        $('#form_loaitk_tkbc').submit();
    });

    $('#select_loaitk_donhang').change(function() {
        event.preventDefault();
        $('#form_loaitk_donhang').submit();
    });

    $('.soluong_phieunhap').change(function() {
        $val = $(this).val();
        $id = $(this).data('id');
        $('#supplies_id_edit_phieunhap').val($id);
        $('#soluong_edit_phieunhap').val($val);
        event.preventDefault();
        $('#form_editsoluong_phieunhap').submit();
    });

    $(document).ready(function(){
        $('tbody').on('change','td .soluong_phieuxuat',function() {
            $val = $(this).val();
            $id = $(this).data('id');
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : "/admin/chitietphieuxuat/session/soluong",
                method: "POST",
                data : {
                    "id" : $id,
                    "soluong" : $val
                },
                async: false,
                success:function($data)
                {
                    console.log
                    refreshXuatkho();
                },
                error: function (data,Status,thr) {
                    console.log("error: ",data,Status,thr);
                }
            })
        });
    });

    $(document).ready(function(){
        $('tbody').on('change','td .soluong_yeucau',function() {
            $val = $(this).val();
            $id = $(this).data('id');
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : "/admin/chitietyeucaunx/session/soluong",
                method: "POST",
                data : {
                    "id" : $id,
                    "soluong" : $val
                },
                async: false,
                success:function($data)
                {
                    console.log
                    refreshyecau();
                },
                error: function (data,Status,thr) {
                    console.log("error: ",data,Status,thr);
                }
            })
        });
    });

    $('.baohanh_phieunhap').change(function() {
        $val = $(this).val();
        $id = $(this).data('id');
        $('#supplies_id_edit_bh_phieunhap').val($id);
        $('#soluong_edit_bh_phieunhap').val($val);
        event.preventDefault();
        $('#form_editbaohanh_phieunhap').submit();
    });

    $('#ngayht_donhang').change(function() {
        $val = $(this).val();
        $('#ngaytra_donhang').val($val);
    });

    $('#select_khohang_tonkho').change(function() {
        event.preventDefault();
        $('#form_khohang_tonkho').submit();
    });

    //sửa số lượng chi tiết hóa đơn
    $('.soluong_billdetails').change(function() {
        $val = $(this).val();
        $id = $(this).data('id');
        $bill_id = $(this).data('name');
        $('#id_edit_billdetails').val($id);
        $('#bill_id_edit_billdetails').val($bill_id);
        $('#soluong_billdetails').val($val);
        event.preventDefault();
        $('#edit_billdetails').submit();
    });

    //sửa số lượng chi tiết hóa đơn customer
    $('.soluong_billdetails_customer').change(function() {
        $val = $(this).val();
        $id = $(this).data('id');
        $bill_id = $(this).data('name');
        $('#id_edit_billdetails').val($id);
        $('#bill_id_edit_billdetails').val($bill_id);
        $('#soluong_billdetails').val($val);
        event.preventDefault();
        $('#edit_billdetails_customer').submit();
    });

    // sửa số lượng vật liệu của sản phẩm
    $('.soluong_vatlieu').change(function() {
        $val = $(this).val();
        $id = $(this).data('id');
        $('#sl_vatlieu_sanpham').val($val);
        $('#id_vattu_sanpham').val($id);
        event.preventDefault();
        $('#form-soluong-vatlieu').submit();
    });

    //sửa số lượng chi tiết yêu cầu sản xuất
    $('.soluong_yeucausanxuat').change(function() {
        $soluong = $(this).val();
        $id = $(this).data('id');
        $('#id_yeucausanxuat').val($id);
        $('#soluong_yeucausanxuat').val($soluong);
        event.preventDefault();
        $('#edit_yeucausanxuat').submit();
    });

    //logout đăng nhập
    $('.logout-btn').click(function() {
        event.preventDefault();
        $('#logout-form').submit();
    });

    
    $(document).ready(function() {
        function dateformat(date)
        {
            var year = date.getFullYear(),
            month = date.getMonth() + 1,
            day = date.getDate();

            return day+' / '+month+' / '+year;
        }
    });


    $(document).ready(function() {


        function setChecked($quyen)
        {
            if ($quyen==1) {
                return 'checked';
            }
        }

        // sắp xếp products hoàn thiện
        $('#fillter_product').change(function() {
           $val = $('#fillter_product option:selected').val();
           if ($val == 1) {
                $('#name_product_oderby').val('created_at');
                $('#order_product_oderby').val('ASC');
           } else if ($val == 2) {
                $('#name_product_oderby').val('created_at');
                $('#order_product_oderby').val('DESC');
           } else if ($val == 3) {
                $('#name_product_oderby').val('name');
                $('#order_product_oderby').val('ASC');
           } else if ($val == 4) {
                $('#name_product_oderby').val('name');
                $('#order_product_oderby').val('DESC');
           }
            event.preventDefault();
            $('#order_products').submit();
        });

        // sắp xếp products đặt
        $('#fillter_product').change(function() {
           $val = $('#fillter_product option:selected').val();
            if ($val == 1) {
                $('#name_product_oderby').val('created_at');
                $('#order_product_oderby').val('ASC');
            } else if ($val == 2) {
                $('#name_product_oderby').val('created_at');
                $('#order_product_oderby').val('DESC');
            } else if ($val == 3) {
                $('#name_product_oderby').val('name');
                $('#order_product_oderby').val('ASC');
            } else if ($val == 4) {
                $('#name_product_oderby').val('name');
                $('#order_product_oderby').val('DESC');
            } else if ($val == 5) {
                $('#name_product_oderby').val('dongia');
                $('#order_product_oderby').val('ASC');
            } else if ($val == 6) {
                $('#name_product_oderby').val('dongia');
                $('#order_product_oderby').val('DESC');
            }
            event.preventDefault();
            $('#order_products').submit();
        });


        // sắp xếp products đặt
        $('#select_search').change(function() {
            $val = $('#select_search option:selected').val();
            if ($val == 1) {
                $('#select_form').attr('action', 'http://127.0.0.1:8000/search');
            } else if ($val == 2) {
                $('#select_form').attr('action', 'http://127.0.0.1:8000/search/products');
            } else if ($val == 3) {
                $('#select_form').attr('action', 'http://127.0.0.1:8000/search/news');
            } 
            event.preventDefault();
            $('#select_form').submit();
        });


        //chọn loại tin
        $('#fillter_new').change(function() {
            $val = $('#fillter_new option:selected').val();
            if ($val!=0) {
              $('#id_news_oderby').val($val);  
            }
            event.preventDefault();
            $('#order_new').submit();
        });

        //chọn tiến đọ sản xuất
        $('#select_tdsx').change(function() {
            $val = $('#select_tdsx option:selected').data('name');
            $id = $('#select_tdsx option:selected').data('id');
            $max = $('#select_tdsx option:selected').data('max');
            $('#product_id_ttsx').val($val);
            $('#product_id_hidden_ttsx').val($id);
            $('#soluong_ttsx').attr('max',$max);
        });


        // chọn khách hàng để tạo hóa đơn
        $('#btn-select-kh').on('click', function() {
            $('.tbody-search-kh tr input[name="radio-kh"]').filter(function() {
                if (this.checked) {
                    $machon = $(this).data('id').toString();
                    $name = $(this).data('name').toString();
                    // alert($machon);
                    $('#tenkh_donhang').val($name);
                    $('#idkh_donhang').val($machon);
                }
            });
        });

        //in hóa đơn
        $('#print-invoice').on('click', function() {
            $id = $(this).data('id').toString();
            $url = document.location.origin+"/admin/quanlyhoadon/"+$id+"/print";
            window.open($url);
        });

        // chọn đơn hàng
        $('#btn-select-bh').on('click', function() {
            $('.table-donhang-baohanh tr input[name="radio-bh"]').filter(function() {
                if (this.checked) {
                    $id = $(this).data('id').toString();
                    $ma = $(this).data('ma').toString();
                    $('#bill').val($ma);
                    $('#bill_id_hidden').val($id);
                }
            });
        });

        $('#btn-select-ycsx').on('click', function() {
            $('.table-donhang-ycsx tr input[name="radio-yc"]').filter(function() {
                if (this.checked) {
                    $id = $(this).data('id').toString();
                    $('#bill').val('HĐ '+$id);
                    $('#bill_id_hidden').val($id);
                }
            });
        });

        // chọn nhà cung cấp
        $('#btn-select-ncc').on('click', function() {
            $('.tbody-search-ncc tr input[name="radio-1"]').filter(function() {
                if (this.checked) {
                    $id = $(this).data('id').toString();
                    $name = $(this).data('name').toString();
                    $('#ncc_name').val($name);
                    $('#ncc_id_hidden').val($id);
                }
            });
        });

        //Chọn đơn hàng ở hóa đơn
        $('#btn-select-hd').on('click', function() {
            $('.table-donhang-hoadon tr input[name="radio-bh"]').filter(function() {
                if (this.checked) {
                    $id = $(this).data('id').toString();
                    $customers_id = $(this).data('khach').toString();
                    $tenkh = $(this).data('tenkh').toString();
                    $('#dh_hoadon').val('HĐ '+$id);
                    $('#kh_hidden_hoadon').val($customers_id);
                    $('#tenkh_hoadon').val($tenkh);
                    $('#dh_hidden_hoadon').val($id);
                }
            });
        });

        //Tạo hóa đơn
        $('#btn-create-hoadon').on('click', function() {
            $bill_id = $("#id_donhang").val();
            $customer_id = $("#idkh_donhang").val();
            $thanhtien = $("#thanhtien_donhang_hidden").val();
            $('#bill_id_hoadon').val($bill_id);
            $('#customer_id_hoadon').val($customer_id);
            $('#thanhtien_hoadon').val($thanhtien);
            event.preventDefault();
            $('#create_hoadon_form').submit();
        });

        $(document).on('click', 'tr td #btn_chon_file', function() {
            $id = $(this).data('id').toString();
            $('.id_detail_bill').val($id);
        });

        //upload thiết kế
        $(document).on('click', 'tr td #btn_xem_file', function() {
            $id = $(this).data('id').toString();
            $.ajax({
                url : "/admin/findDesigns",
                method: "GET",
                data : {
                    "id" : $id
                },
                async: false,
                success:function($data)
                {
                    jQuery.each($data, function($key, $ds) {
                        ($ds['mota'] == null )? $ds['mota'] = '...' : $ds['mota'] = $ds['mota'];
                        $mota = $ds['mota'];
                        $type = $ds['type'];
                        $local =  document.location.origin;
                        var textArea = tinyMCE.get("form-mota");
                        textArea.setContent($mota);
                        $('#size_file_designs_xem').val($ds['size']+" KB");
                        $('#type_file_designs_xem').val($ds['type']);
                        $('#name_file_designs_xem').val($ds['file']);
                        $('#download_file_xem').attr('href',$local+'/upload/fileDesigns/'+$ds['file']+$ds['type']);
                        $('#download_file_xem').attr('download',$ds['file']+$ds['type']);
                        if ($type == '.png' || $type == '.jpg' || $type == '.JPG' || $type == '.PNG') {
                            $('.anhdesigns_show_xem #AnhNV-show').attr('src', $local+'/upload/fileDesigns/'+$ds['file']+$ds['type']);
                        } else {
                            $('.anhdesigns_show_xem #AnhNV-show').attr('src', $local+'/upload/icon/Docs-icon.png');
                        }
                    });
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
        });

         //showthietke thiết kế customer
        $(document).on('click', 'tr td #btn_xem_file_cus', function() {
            $id = $(this).data('id').toString();
            $.ajax({
                url : "/customer/design",
                method: "GET",
                data : {
                    "id" : $id
                },
                async: false,
                success:function($data)
                {
                    jQuery.each($data, function($key, $ds) {
                        ($ds['mota'] == null )? $ds['mota'] = '...' : $ds['mota'] = $ds['mota'];
                        $mota = $ds['mota'];
                        $type = $ds['type'];
                        $local =  document.location.origin;
                        var textArea = tinyMCE.get("form-mota");
                        textArea.setContent($mota);
                        $('#size_file_designs_xem').val($ds['size']+" KB");
                        $('#type_file_designs_xem').val($ds['type']);
                        $('#name_file_designs_xem').val($ds['file']);
                        $('#download_file_xem').attr('href',$local+'/upload/fileDesigns/'+$ds['file']+$ds['type']);
                        $('#download_file_xem').attr('download',$ds['file']+$ds['type']);
                        if ($type == '.png' || $type == '.jpg' || $type == '.JPG' || $type == '.PNG') {
                            $('.anhdesigns_show_xem #AnhNV-show').attr('src', $local+'/upload/fileDesigns/'+$ds['file']+$ds['type']);
                        } else {
                            $('.anhdesigns_show_xem #AnhNV-show').attr('src', $local+'/upload/icon/Docs-icon.png');
                        }
                    });
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
        });

        //chọn thiết kế đơn hàng
        $('#btn-select-thietke').on('click', function() {
            $('.table-thietke tr input[name="radio-tk"]').filter(function() {
                if (this.checked) {
                    $id = $('.id_detail_bill').val();
                    $design_id = $(this).data('id').toString();
                    $bill_id = $('#id_donhang').val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url : "/admin/quanlychitietdh/design",
                        method: "POST",
                        data : {
                            "id" : $id,
                            "design_id" : $design_id,
                            "bill_id" : $bill_id
                        },
                        async: false,
                        success:function($data)
                        {
                            // console.log($data);
                            location.reload();
                        },
                        error:function($data)
                        {
                            console.log('error: ',$data);
                        }
                    })

                }
            });
        });

        //chọn thiết kế yêu cầu sản xuất
        $('#btn-select-thietke-ycsx').on('click', function() {
            $('.table-thietke tr input[name="radio-tk"]').filter(function() {
                if (this.checked) {
                    $id = $('.id_detail_bill').val();
                    $design_id = $(this).data('id').toString();
                    $bill_id = $('#id_donhang').val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url : "/admin/editDesign",
                        method: "POST",
                        data : {
                            "id" : $id,
                            "design_id" : $design_id
                        },
                        async: false,
                        success:function($data)
                        {
                            // console.log($data);
                            location.reload();
                        },
                        error:function($data)
                        {
                            console.log('error: ',$data);
                        }
                    })

                }
            });
        });

        // chọn sản phẩm cho hóa đơn
        $('#btn-select-sp').on('click', function() {
            $('.tbody-search-sp tr input[name="radio-sp"]').filter(function() {
                if (this.checked) {
                    $product_id = $(this).data('id').toString();
                    $dongia = $(this).data('price').toString();
                    $bill_id = $('#id_donhang').val();
                    $('#bill_id_chonsp').val($bill_id);
                    $('#product_id_chonsp').val($product_id);
                    $('#dongia_chonsp').val($dongia);
                    event.preventDefault();
                    $('#create_billdetails').submit();
                }
            });
        });

        // chọn sản phẩm cho hóa đơn
        $('#btn-select-vt').on('click', function() {
            $('.table-sanpham-vt tr input[name="radio-1"]').filter(function() {
                if (this.checked) {
                    $supplie_id = $(this).data('id').toString();
                    $('#id_vatlieu_sanpham').val($supplie_id);
                    event.preventDefault();
                    $('#form-add-vatlieu').submit();
                }
            });
        });

        $('#btn-select-vt-pn').on('click', function() {
            $('.table-sanpham-vt tr input[name="radio-1"]').filter(function() {
                if (this.checked) {
                    $supplie_id = $(this).data('id').toString();
                    $name = $(this).data('name').toString();
                    $dongia = $(this).data('dongia').toString();
                    $soluong = 1;
                    $('#supplies_id_phieunhap').val($supplie_id);
                    $('#supplies_phieunhap').val($name);
                    $('#dongia_phieunhap').val($dongia);
                    event.preventDefault();
                    $('#form_phieunhap_details').submit();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url : "/admin/chitietphieuxuat/session",
                        method: "POST",
                        data : {
                            "supplies_id" : $supplie_id,
                            "name" : $name,
                            "dongia" : $dongia,
                            "soluong" : $soluong
                        },
                        async: false,
                        success:function($data)
                        {
                            refreshXuatkho();
                        },
                        error:function($data)
                        {
                            console.log('error: ',$data);
                        }
                    })
                }
            });
        });

        $('#btn-select-vt-yc').on('click', function() {
            $('.table-sanpham-vt tr input[name="radio-1"]').filter(function() {
                if (this.checked) {
                    $supplie_id = $(this).data('id').toString();
                    $name = $(this).data('name').toString();
                    $dongia = $(this).data('dongia').toString();
                    $soluong = 1;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url : "/admin/chitietyeucaunx/session",
                        method: "POST",
                        data : {
                            "supplies_id" : $supplie_id,
                            "name" : $name,
                            "dongia" : $dongia,
                            "soluong" : $soluong
                        },
                        async: false,
                        success:function($data)
                        {
                            refreshyecau();
                        },
                        error:function($data)
                        {
                            console.log('error: ',$data);
                        }
                    })
                }
            });
        });

        //chọn sản phẩm cho yêu cầu sản xuất
        $('#btn-select-sp').on('click', function() {
            $('.tbody-search-sp tr input[name="radio-sp"]').filter(function() {
                if (this.checked) {
                    $product_id = $(this).data('id').toString();
                    $dongia = $(this).data('price').toString();
                    $bill_id = $('#id_donhang').val();
                    $('#bill_id_chonsp').val($bill_id);
                    $('#product_id_chonsp').val($product_id);
                    $('#dongia_chonsp').val($dongia);
                    event.preventDefault();
                    $('#create_billdetails').submit();
                }
            });
        });



        // lưu thay đổi tên quyền
        $('#btn-edit-quyen').click( function() {
            $id = $('#edit-id').val();
            $TenPQ = $('#edit-TenPQ').val();
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : "/admin/changeNameRole",
                method: "POST",
                data : {
                    "id" : $id,
                    "TenPQ" : $TenPQ
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    location.reload();
                }
            })
        });


        // chọn quyền trong phần quyền
        $('#select-pq').change(function() {
            displayActionPQ();
            var $id = "";
            $('#select-pq option:selected').each(function() {
                $id = $(this).val();
            })
            $("#select-pq option[value='0']").remove();
            $.ajax({
                url : '/admin/findRole',
                method: "GET",
                data : {
                    "id" : $id
                },
                async: false,
                success:function($data)
                {
                    $html = '';

                    if ($data == '') {
                        $html += '<div class="group-quyen col-md-12">'
                        $html +=        '<h2 style="color:red;">Xin hãy chọn quyền</h2>'
                        $html +=    '</div>'
                    } else {
                        jQuery.each($data, function($key, $pq) {
                            $html += '<div class="group-quyen col-md-4">'
                            $html +=        '<h4>Quản lý danh mục</h4>'
                            $html +=        '<div class="list-QLDM">'
                            $html +=            '<p><input type="checkbox" data-id="Q1_1" '+setChecked($pq['Q1_1'])+'> Danh mục sản phẩm</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q1_2" '+setChecked($pq['Q1_2'])+'> Quản lý tin tức</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q1_3" '+setChecked($pq['Q1_3'])+'> Quản lý khách hàng</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q1_4" '+setChecked($pq['Q1_4'])+'> Quản lý hình ảnh</p>'
                            $html +=        '</div>'
                            $html +=    '</div>'
                            $html += '<div class="group-quyen col-md-4">'
                            $html +=        '<h4>Quản lý đặt hàng</h4>'
                            $html +=        '<div class="list-QLDM">'
                            $html +=            '<p><input type="checkbox" data-id="Q2_1" '+setChecked($pq['Q2_1'])+'> Quản lý sản phẩm đặt</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q2_2" '+setChecked($pq['Q2_2'])+'> Quản lý đơn hàng</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q2_3" '+setChecked($pq['Q2_3'])+'> Quản lý hóa đơn</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q2_4" '+setChecked($pq['Q2_4'])+'> Quản lý bảo hành</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q2_5" '+setChecked($pq['Q2_5'])+'> Quản lý thiết kế</p>'
                            $html +=        '</div>'
                            $html +=    '</div>'
                            $html += '<div class="group-quyen col-md-4">'
                            $html +=        '<h4>Quản lý sản xuất</h4>'
                            $html +=        '<div class="list-QLDM">'
                            $html +=            '<p><input type="checkbox" data-id="Q3_1" '+setChecked($pq['Q3_1'])+'> Yêu cầu sản xuất</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q3_2" '+setChecked($pq['Q3_2'])+'> Quản lý vật tư</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q3_3" '+setChecked($pq['Q3_3'])+'> Quản lý tiến độ</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q3_4" '+setChecked($pq['Q3_4'])+'> Quản lý sản phẩm</p>'
                            $html +=        '</div>'
                            $html +=    '</div>'
                            $html += '<div class="group-quyen col-md-4">'
                            $html +=        '<h4>Quản lý kho hàng</h4>'
                            $html +=        '<div class="list-QLDM">'
                            $html +=            '<p><input type="checkbox" data-id="Q4_1" '+setChecked($pq['Q4_1'])+'> Yêu cầu nhập/xuất</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q4_2" '+setChecked($pq['Q4_2'])+'> Quản lý nhập kho</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q4_3" '+setChecked($pq['Q4_3'])+'> Quản lý xuất kho</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q4_4" '+setChecked($pq['Q4_4'])+'> Quản lý tồn kho</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q4_5" '+setChecked($pq['Q4_5'])+'> Quản lý nhà cung cấp</p>'
                            $html +=        '</div>'
                            $html +=    '</div>'
                            $html += '<div class="group-quyen col-md-4">'
                            $html +=        '<h4>Báo cáo thống kê</h4>'
                            $html +=        '<div class="list-QLDM">'
                            $html +=            '<p><input type="checkbox" data-id="Q5_1" '+setChecked($pq['Q5_1'])+'> Báo cáo tồn kho</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q5_2" '+setChecked($pq['Q5_2'])+'> Thống kê nhập xuất</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q5_3" '+setChecked($pq['Q5_3'])+'> Thống kê website</p>'
                            $html +=        '</div>'
                            $html +=    '</div>'
                            $html += '<div class="group-quyen col-md-4">'
                            $html +=        '<h4>Quản lý danh mục</h4>'
                            $html +=        '<div class="list-QLDM">'
                            $html +=            '<p><input type="checkbox" data-id="Q6_1" '+setChecked($pq['Q6_1'])+'> Quản lý tài khoản</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q6_2" '+setChecked($pq['Q6_2'])+'> Quản lý phân quyền</p>'
                            $html +=            '<p><input type="checkbox" data-id="Q6_3" '+setChecked($pq['Q6_3'])+'> Quản lý phản hồi</p>'
                            $html +=        '</div>'
                            $html +=    '</div>'
                        }); 
                    }
                    $('#group-checkbox-quyen').html($html);
                },
                error:function($data){
                    console.log($data);
                }
            });
         });

        
        //nút duyệt đơn hàng
        $('#btn-duyet').on('click', function() {
            $a = $(this).val();
            $('#table-donhang tr th').find(':input[type="radio"]').each(function(){
                if ($(this).prop( "checked" )) {
                    $id = $(this).data("id").toString();
                    $ma = $(this).data("ma").toString();
                } 
            })
            if ($a == 1) {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                    url : "/admin/duyetBill",
                    method: "GET",
                    data : {
                        "id" : $id,
                        "tiendo" : 2
                    },
                    async: false,
                    success:function($data)
                    {
                        alert($data);
                        location.reload();
                    },
                    error:function($data)
                    {
                        console.log('error: ',$data);
                    }
                })
            } else {
                $('#bill_bill').val($ma);
                $('#bill_id_hidden_bill').val($id);
            }
        }); 


        //nút hủy duyệt đơn hàng
        $('#btn-huyduyet').on('click', function() {
            $a = $(this).val();
            $('#table-donhang tr th').find(':input[type="radio"]').each(function(){
                if ($(this).prop( "checked" )) {
                    $id = $(this).data("id").toString();
                } 
            })
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                url : "/admin/duyetBill",
                method: "GET",
                data : {
                    "id" : $id,
                    "tiendo" : 1
                },
                async: false,
                success:function($data)
                {
                    alert('Hủy duyệt thành công!');
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
                })
        });

        
        // thêm quyền
        $('#btn-add-quyen').on('click', function() {
            $TenPQ = $('#TenPQ').val();
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : "/admin/quanlyphanquyen/create",
                method: "GET",
                data : {
                    "TenPQ" : $TenPQ
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
        });

        //thêm loại tin tức
        $('#btn-add-loaitt').on('click', function() {
            $name = $('#add_name').val();
            $mota = $('#add_mota').val();
            $a = true;
            if ($name == "") {
                alert("Tên nhóm không thể bỏ trống!");
                return $a = false;
            } else if ($mota == "") {
                alert("Mô tả không thể bỏ trống!");
                return $a = false;
            } else if ($name.length > 255 || $mota.length >255) {
                alert("Số ký tự tối đa là 255 ký tự!");
                return $a = false;
            }

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            if ($a == true) {
                $.ajax({
                    url : "/admin/quanlyloaitintuc/create",
                    method: "GET",
                    data : {
                        "name" : $name,
                        "mota" : $mota
                    },
                    async: false,
                    success:function($data)
                    {
                        alert($data);
                        location.reload();
                    },
                    error:function($data)
                    {
                        console.log('error: ',$data);
                    }
                }) 
            }
        });

        //xem danh sách hóa đơn của khách
        $('#go_customerbill').on('click', function() {
            event.preventDefault();
            $('#customer-billindex').submit();
        });

        //thêm loại sản phẩm
        $('#btn-add-loaisp').on('click', function() {
            $name = $('#add_name').val();
            $mota = $('#add_mota').val();
            $a = true;
            if ($name == "") {
                alert("Tên nhóm không thể bỏ trống!");
                return $a = false;
            } else if ($mota == "") {
                alert("Mô tả không thể bỏ trống!");
                return $a = false;
            } else if ($name.length > 255 || $mota.length >255) {
                alert("Số ký tự tối đa là 255 ký tự!");
                return $a = false;
            }
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            if ($a == true) {
                $.ajax({
                    url : "/admin/quanlyloaisanpham/create",
                    method: "GET",
                    data : {
                        "name" : $name,
                        "mota" : $mota
                    },
                    async: false,
                    success:function($data)
                    {
                        alert($data);
                        location.reload();
                    },
                    error:function($data)
                    {
                        console.log('error: ',$data);
                    }
                }) 
            }
        });

        //hiển thị thông tin loại tin tức
        $('#table-loaitt').delegate('tr td #btn-select-loaitt','click', function() {
            $id = $(this).data('id');
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : "/admin/findCategoryPost",
                method: "GET",
                data : {
                    "id" : $id
                },
                async: false,
                success:function($data)
                {
                    $.each($data, function($key, $n) {
                        $("#edit_name").val($n['name']);
                        $("#edit_mota").val($n['mota']);
                        $("#edit_id").val($n['id']);
                    })
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
        });

        //hiển thị thông tin loại sản phẩm
        $('#table-loaisp').delegate('tr td #btn-select-loaisp','click', function() {
            $id = $(this).data('id');
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : "/admin/findCategoryProduct",
                method: "GET",
                data : {
                    "id" : $id
                },
                async: false,
                success:function($data)
                {
                    $.each($data, function($key, $n) {
                        $("#edit_name").val($n['name']);
                        $("#edit_mota").val($n['mota']);
                        $("#edit_id").val($n['id']);
                    })
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
        });

        //sửa loại tin tức
        $('#btn-edit-loaitt').on('click', function() {
            $name = $('#edit_name').val();
            $mota = $('#edit_mota').val();
            $id = $('#edit_id').val();
            $a = true;
            if ($name == "") {
                alert("Tên nhóm không thể bỏ trống!");
                $a = false;
            } else if ($mota == "") {
                alert("Mô tả không thể bỏ trống!");
                $a = false;
            } else if ($name.length > 255 || $mota.length >255) {
                alert("Số ký tự tối đa là 255 ký tự!");
                $a = false;
            }

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            if ($a == true) {
                $.ajax({
                    url : "/admin/updateCategoryPost",
                    method: "POST",
                    data : {
                        "name" : $name,
                        "mota" : $mota,
                        "id" : $id
                    },
                    async: false,
                    success:function($data)
                    {
                        alert($data);
                        location.reload();
                    },
                    error:function($data)
                    {
                        console.log('error: ',$data);
                    }
                })
            }
        });

        //sửa loại sản phẩm
        $('#btn-edit-loaisp').on('click', function() {
            $name = $('#edit_name').val();
            $mota = $('#edit_mota').val();
            $id = $('#edit_id').val();
            $a = true;
            if ($name == "") {
                alert("Tên nhóm không thể bỏ trống!");
                $a = false;
            } else if ($mota == "") {
                alert("Mô tả không thể bỏ trống!");
                $a = false;
            } else if ($name.length > 255 || $mota.length >255) {
                alert("Số ký tự tối đa là 255 ký tự!");
                $a = false;
            }

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            if ($a == true) {
                $.ajax({
                    url : "/admin/updateCategoryProduct",
                    method: "POST",
                    data : {
                        "name" : $name,
                        "mota" : $mota,
                        "id" : $id
                    },
                    async: false,
                    success:function($data)
                    {
                        alert($data);
                        location.reload();
                    },
                    error:function($data)
                    {
                        console.log('error: ',$data);
                    }
                })
            }
        });

        //sửa quyền 
        $('#edit-quyen').click(function(){
            $name = [];
            $val = [];
            $dem = '0';
            $('#group-checkbox-quyen').find(':input').each(function(){
                if ($(this).prop( "checked" )) {
                    $val[$dem] = 1;
                } else {
                    $val[$dem] = 0;
                }
                $name[$dem] = $(this).data("id").toString();
                $dem++;
            })
            $('#select-pq option:selected').each(function() {
                $id = $(this).val();
            })

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : "/admin/updateRole",
                method: "POST",
                data : {
                    "quyen": $name,
                    "val": $val,
                    "id": $id 
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
        });

        //xóa quyền
        $('#delete-pq').on('click', function() {
            $('#select-pq option:selected').each(function() {
                $id = $(this).val();
            })
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : "/admin/deleteRole",
                method: "POST",
                data : {
                    "id": $id 
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
        });

        // xóa vật tư session xuất kho
        $(document).on('click', '.btn_delete_session_xuatkho', function() {
            $id = $(this).data('id');
            $url = "/admin/chitietphieuxuat/session/"+$id;
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : $url,
                method: "POST",
                data: {
                    _method: 'delete'
                },
                async: false,
                success:function($data)
                {
                    refreshXuatkho();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            });
        });

        // xóa vật tư session yêu cầu
        $(document).on('click', '.btn_delete_session_yeucau', function() {
            $id = $(this).data('id');
            $url = "/admin/chitietyeucaunx/session/"+$id;
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : $url,
                method: "POST",
                data: {
                    _method: 'delete'
                },
                async: false,
                success:function($data)
                {
                    refreshyecau();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            });
        });


        $(document).on('click', '#btn_xoa_billdetails', function() {
            $id = $(this).data('id');
            $bill_id = $(this).data('name');
            $('#id_billdetails').val($id);
            $('#bill_id_billdetails').val($bill_id);
            event.preventDefault();
            $('#xoa_billdetails').submit();
        });

        $(document).on('click', '#btn_xoa_vatlieu', function() {
            $id = $(this).data('id');
            $('#id_vattu_xoa_sanpham').val($id);
            event.preventDefault();
            $('#form-delete-vatlieu').submit();
        });

        $(document).on('click', '#btn_xoa_billdetails_customer', function() {
            $id = $(this).data('id');
            $bill_id = $(this).data('name');
            $('#id_billdetails').val($id);
            $('#bill_id_billdetails').val($bill_id);
            event.preventDefault();
            $('#xoa_billdetails_customer').submit();
        });

        $(document).on('click', '#btn_xoa_yeucausanxuat', function() {
            $id = $(this).data('id');
            $('#id_xoa_yeucausanxuat').val($id);
            event.preventDefault();
            $('#xoa_yeucausanxuat').submit();
        });


        //mở form sửa thông tin tài khoản
        $('#table-taikhoan').delegate('tr td #btn-select-tk', 'click', function() {
            $id = $(this).data('id');
            $url = '/admin/quanlytaikhoan/'+$id;
            window.location.href = $url;
        });

        //mở form sửa thông tin tài khoản
        $('#table-ncc').delegate('tr td #btn-select-ncc-tba', 'click', function() {
            $id = $(this).data('id');
            $url = '/admin/quanlyncc/'+$id;
            window.location.href = $url;
        });

        //mở form sửa thông tin khách hàng
        $('#table-khachhang').delegate('tr td #btn-select-kh-tba', 'click', function() {
            $id = $(this).data('id');
            $url = '/admin/quanlykhachhang/'+$id;
            window.location.href = $url;
        });

        //mở form sửa thông tin bài viết
        $('#table-tintuc').delegate('tr td #btn-select-tt', 'click', function() {
            $id = $(this).data('id');
            $url = '/admin/quanlytintuc/'+$id;
            window.location.href = $url;
        });

        //mở form sửa thông tin sản phẩm hoàn thiện
        $('#table-sanphamht').delegate('tr td #btn-select-sanphamht', 'click', function() {
            $id = $(this).data('id');
            $url = '/admin/quanlysanphamht/'+$id;
            window.location.href = $url;
        });

        // mở form sửa thông tin sản phẩm đặt
        $('#table-sanpham').delegate('tr td #btn-select-sanpham', 'click', function() {
            $id = $(this).data('id');
            $url = '/admin/quanlysanpham/'+$id;
            window.location.href = $url;
        });

        //mở form sửa thông tin đon hàng
        $('#table-donhang').delegate('tr td #btn-select-donhang', 'click', function() {
            $id = $(this).data('id');
            $url = '/admin/quanlydonhang/'+$id;
            window.location.href = $url;
        });

        //mở form sửa thông tin đon hàng
        $('#table-vattu').delegate('tr td #btn-select-vattu', 'click', function() {
            $id = $(this).data('id');
            $url = '/admin/quanlyvattu/'+$id;
            window.location.href = $url;
        });

        //mở form sửa thông tin đon hàng từ phía khách
        $('#table-donhang-customer').delegate('tr td .btn-select-custome', 'click', function() {
            $id = $(this).data('id');
            $url = '/customer/bills/'+$id;
            window.location.href = $url;
        });

        //mở form sửa thông tin thiết kê
        $('#table-thietke').delegate('tr td #btn-select-thietke-tba', 'click', function() {
            $id = $(this).data('id');
            $url = '/admin/quanlythietke/'+$id;
            window.location.href = $url;
        });

        //mở form sửa thông tin thiết kê
        $('#table-baohanh').delegate('tr td #btn-select-baohanh', 'click', function() {
            $id = $(this).data('id');
            $url = '/admin/quanlybaohanh/'+$id;
            window.location.href = $url;
        });

        // modal thông tin nhân viên
        $('#table-nhanvien').delegate('tr td #btn-select-nv', 'click', function() {
            $id = $(this).data('id');
            $url = '/admin/find_NV';
            $local = document.location.origin;
            $.get($url, { "id": $id}, function(data) {
                $.each(data, function($key, $n) {
                    $('#id_nv').val($n['id']);
                    $('#AnhNV-show').attr("src",$local +'/upload/avatarNV/'+$n['AnhNV']);
                    $('#TenNV-md-nv').val($n['TenNV']);
                    $('.modal-body').find('#GioiTinh-md-nv').val($n['GioiTinh']);
                    $('#QueQuan-md-nv').val($n['QueQuan']);
                    $('#NgaySinh-md-nv').val($n['NgaySinh']);
                    $('.modal-body').find('#DanToc-md-nv').val($n['DanToc']);
                    $('#CMND-md-nv').val($n['CMND']);
                    $('#SDT-md-nv').val($n['SDT']);
                    $('#Mail-md-nv').val($n['Mail']);
                })
            });
        });

        function kiemtraMK($mk , $mk1) {
            $dk = true;
            if ($mk.length > 20 || $mk.length < 4 && $mk != "" && $mk12 != "") {
                alert('Mật khẩu dài hơn 4 ký tự và không vựt quá 20 ký tự!');
                return $dk = false;
            } 
            if ($mk == "" && $mk1 != "") {
                alert('Mật khẩu không được để trống!');
                return $dk = false;
            }
            if ($mk1 == "" && $mk != "") {
                alert('Mật khẩu nhập lại không được để trống!');
                return $dk = false;
            }
            if ($mk != $mk1 ) {
                alert('Mật khẩu và mật khẩu nhập lại phải giống nhau!');
                return $dk = false;
            }
            return $dk;
        }

        //lưu thông tin thay đổi
        $('#btn-edit-tk').click(function() {
            $id = $('#User-md-tk').val();
            $MaPQ_id = $('.modal-body').find('#MaPQ-md-tk').val();
            $TrangThai = $('.modal-body').find('#TrangThai-md-tk').val();
            $Passwork = $('#password-tk').val();
            $Password_confirmation = $('#taikhoan_confim-tk').val();
            $url = '/admin/edit_tk';
            $xet = kiemtraMK($Passwork, $Password_confirmation);
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            if ($xet) {
                if ($Password_confirmation =! "") {
                    $.post($url, { "User": $id, "MaPQ_id": $MaPQ_id, "TrangThai": $TrangThai, "password_confirmation": $Passwork }, function(data) {
                        alert(data);
                    });
                } else {
                    $.post($url, { "User": $id, "MaPQ_id": $MaPQ_id, "TrangThai": $TrangThai }, function(data) {
                        alert(data);
                    });
                }
            }
            // LoadListTK();
        });

        //xóa danh sách tài khoản
        $('#btn-delete-tk').click(function() {
            $val = [];
            $dem = 0;
            $('#table-taikhoan tr th').find(':input[type="checkbox"]').each(function(){
                if ($(this).prop( "checked" )) {
                    $val[$dem] = $(this).data("id").toString();
                    $dem++;
                } else {
                    $dem = $dem;
                }
            })
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : '/admin/quanlytaikhoan/destroy',
                method: "POST",
                data : {
                    "id": $val
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    $('#select-all-tk').prop('checked', false);
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
        });

        //xóa danh sách tài khoản
        $('#btn-delete-vattu').click(function() {
            $val = [];
            $dem = 0;
            $('#table-vattu tr th').find(':input[type="checkbox"]').each(function(){
                if ($(this).prop( "checked" )) {
                    $val[$dem] = $(this).data("id").toString();
                    $dem++;
                } else {
                    $dem = $dem;
                }
            })
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : '/admin/quanlyvattu/destroy',
                method: "POST",
                data : {
                    "id": $val
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
        });

         //xóa danh sách nhà cung cấp
        $('#btn-delete-ncc').click(function() {
            $val = [];
            $dem = 0;
            $('#table-ncc tr th').find(':input[type="checkbox"]').each(function(){
                if ($(this).prop( "checked" )) {
                    $val[$dem] = $(this).data("id").toString();
                    $dem++;
                } else {
                    $dem = $dem;
                }
            })
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : '/admin/quanlyncc/destroy',
                method: "POST",
                data : {
                    "id": $val
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
        });


        //xóa danh sách thiết kê
        $('#btn-delete-thietke').click(function() {
            $val = [];
            $dem = 0;
            $('#table-thietke tr th').find(':input[type="checkbox"]').each(function(){
                if ($(this).prop( "checked" )) {
                        $val[$dem] = $(this).data("id");
                        $dem++;
                    
                } else {
                    $dem = $dem;
                }
            })
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : '/admin/quanlythietke/destroy',
                method: "POST",
                data : {
                    "id": $val
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    $('#select-all-tk').prop('checked', false);
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
        });


        //xóa danh sách khách hàng
        $('#btn-delete-kh').click(function() {
            $val = [];
            $dem = 0;
            $('#table-khachhang tr th').find(':input[type="checkbox"]').each(function(){
                if ($(this).prop( "checked" )) {
                    $val[$dem] = $(this).data("id").toString();
                    $dem++;
                } else {
                    $dem = $dem;
                }
            })
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : '/admin/quanlykhachhang/destroy',
                method: "POST",
                data : {
                    "id": $val
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    $('#select-all').prop('checked', false);
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
            
        });

        //xóa danh sách bảo hành
        $('#btn-delete-baohanh').click(function() {
            $val = [];
            $dem = 0;
            $('#table-baohanh tr th').find(':input[type="checkbox"]').each(function(){
                if ($(this).prop( "checked" )) {
                    $val[$dem] = $(this).data("id").toString();
                    $dem++;
                } else {
                    $dem = $dem;
                }
            })
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : '/admin/quanlybaohanh/destroy',
                method: "POST",
                data : {
                    "id": $val
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
            
        });

        //xóa danh sách bài viết
        $('#btn-delete-tt').click(function() {
            $val = [];
            $dem = 0;
            $('#table-tintuc tr th').find(':input[type="checkbox"]').each(function(){
                if ($(this).prop( "checked" )) {
                    $val[$dem] = $(this).data("id").toString();
                    $dem++;
                } else {
                    $dem = $dem;
                }
            })
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : '/admin/quanlytintuc/destroy',
                method: "POST",
                data : {
                    "id": $val
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    $('#select-all').prop('checked', false);
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
            
        });


        //xóa đơn hàng
        $('#btn-delete-donhang').click(function() {
            $('#table-donhang tr th').find(':input[type="radio"]').each(function(){
                if ($(this).prop( "checked" )) {
                    $id = $(this).data("id").toString();
                } 
            })
            // alert($id);
            $url = '/admin/quanlydonhang/'+$id;
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : $url,
                method: "POST",
                data : {
                    "_method" : 'DELETE'
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
            
        });

        //xóa đơn hàng customer
        $('#btn-delete-donhang-customer').click(function() {
            $('#table-donhang-customer tr th').find(':input[type="radio"]').each(function(){
                if ($(this).prop( "checked" )) {
                    $id = $(this).data("id").toString();
                } 
            })
            // alert($id);
            $url = '/customer/bills/'+$id;
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : $url,
                method: "POST",
                data : {
                    "_method" : 'DELETE'
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
            
        });

        //xóa danh sách loại bài viết
        $('#btn-delete-loaitt').click(function() {
            $val = [];
            $dem = 0;
            $('#table-loaitt tr th').find(':input[type="checkbox"]').each(function(){
                if ($(this).prop( "checked" )) {
                    $val[$dem] = $(this).data("id").toString();
                    $dem++;
                } else {
                    $dem = $dem;
                }
            })
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : '/admin/quanlyloaitintuc/destroy',
                method: "POST",
                data : {
                    "id": $val
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    $('#select-all').prop('checked', false);
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
            
        });

        //xóa danh sách loại sản phẩm
        $('#btn-delete-loaisp').click(function() {
            $val = [];
            $dem = 0;
            $('#table-loaisp tr th').find(':input[type="checkbox"]').each(function(){
                if ($(this).prop( "checked" )) {
                    $val[$dem] = $(this).data("id").toString();
                    $dem++;
                } else {
                    $dem = $dem;
                }
            })
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : '/admin/quanlyloaisanpham/destroy',
                method: "POST",
                data : {
                    "id": $val
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    $('#select-all').prop('checked', false);
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
            
        });


        //xóa danh sách sản phẩm hoàn thiện
        $('#btn-delete-sanphamht').click(function() {
            $val = [];
            $dem = 0;
            $('#table-sanphamht tr th').find(':input[type="checkbox"]').each(function(){
                if ($(this).prop( "checked" )) {
                    $val[$dem] = $(this).data("id").toString();
                    $dem++;
                } else {
                    $dem = $dem;
                }
            })
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : '/admin/quanlysanphamht/destroy',
                method: "POST",
                data : {
                    "id": $val
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    $('#select-all').prop('checked', false);
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
            
        });

        //xóa danh sách sản phẩm đặt
        $('#btn-delete-sanpham').click(function() {
            $val = [];
            $dem = 0;
            $('#table-sanpham tr th').find(':input[type="checkbox"]').each(function(){
                if ($(this).prop( "checked" )) {
                    $val[$dem] = $(this).data("id").toString();
                    $dem++;
                } else {
                    $dem = $dem;
                }
            })
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url : '/admin/quanlysanpham/destroy',
                method: "POST",
                data : {
                    "id": $val
                },
                async: false,
                success:function($data)
                {
                    alert($data);
                    $('#select-all').prop('checked', false);
                    location.reload();
                },
                error:function($data)
                {
                    console.log('error: ',$data);
                }
            })
            
        });

        $('#btn-search-kh').on('click', function() {
            $search = $('#search-khachhang').val();
            $.ajax({
                url : "/admin/findkh",
                method: "GET",
                data : {
                    "search" : $search
                },
                async: false,
                success:function($data)
                {
                    $text= ' ';
                    if ($data.length > 0) {
                        jQuery.each($data, function($key, $kh) {
                            ($kh['gioitinh'] == 1 )? $kh['gioitinh'] = 'Nam' : $kh['gioitinh'] = 'Nữ';
                            $datetime = new Date($kh['ngaysinh']);
                            $text +='<tr class="dong">'
                            $text +='<th scope="row"><input type="radio" data-name="'+$kh['name']+'"  data-id="'+$kh['id']+'" name="radio-kh"></th>'
                            $text +='<td>'+$kh['mail_address']+'</td>'
                            $text +='<td>'+$kh['name']+'</td>'
                            $text +='<td>'+$kh['gioitinh']+'</td>'
                            $text +='<td>'+dateformat($datetime)+'</td>'
                            $text +='<td>'+$kh['address']+'</td>'
                            $text +='<td align="center">'+$kh['phone']+'</td>'
                            $text +='</tr>';
                        }); 
                    } else {
                        $text = '<td align="center" colspan="7">Không tìm thấy khách hàng</td>'
                    }
                    $('.tbody-search-kh').html($text);
                    displaybuttonTK();
                },
                error: function (data,Status,thr) {
                    console.log("error: ",data,Status,thr);
                }
            })

        });


        // modal tìm kiếm sản phẩm admin
        $('#btn-search-sp').on('click', function() {
            $search = $('#search-sanpham').val();
            $url = document.location.origin;
            $.ajax({
                url : "/admin/findsp",
                method: "GET",
                data : {
                    "search" : $search
                },
                async: false,
                success:function($data)
                {
                    $text= ' ';
                    if ($data.length > 0) {
                        jQuery.each($data, function($key, $sp) {
                            ($sp['trangthai'] == 1 )? $sp['trangthai'] = 'Hiển thị' : $sp['trangthai'] = 'Ẩn';
                            ($sp['mota'] == null )? $sp['mota'] = '' : $sp['mota'] = $sp['mota'].substr(0,50);
                            $text +='<tr>'
                            $text +='<th scope="row"><input type="radio"  data-price="'+$sp['dongia']+'" data-id="'+$sp['id']+'" name="radio-sp"></th>'
                            $text +='<td><div class="img_table"><img id="AnhNV-show" name="AnhNV_1" src="'+$url+'/upload/imageProducts/'+$sp['anh']+'"></div></td>'
                            $text +='<td>'+$sp['name']+'</td>'
                            $text +='<td>'+$sp['mota']+'</td>'
                            $text +='<td>'+$sp['vatlieu']+'</td>'
                            $text +='<td align="center">'+$sp['size']+'</td>'
                            $text +='<td align="center">'+$sp['baohanh']+' tháng</td>'
                            $text +='<td align="center">'+$sp['dongia']+'</td>'
                            $text +='<td align="center">'+$sp['trangthai']+'</td>'
                            $text +='<td align="center">'+$sp['loaisp']+'</td>'
                            $text +='</tr>';
                        }); 
                    } else {
                        $text = '<td align="center" colspan="9">Không tìm thấy khách hàng</td>'
                    }
                    $('.tbody-search-sp').html($text);
                    displaybuttonTK();
                },
                error: function (data,Status,thr) {
                    console.log("error: ",data,Status,thr);
                }
            })
        });


        // modal tìm kiếm sản phẩm customer
        $('#btn-search-sp-customer').on('click', function() {
            $search = $('#search-sanpham').val();
            $url = document.location.origin;
            $.ajax({
                url : "/customer/findsp",
                method: "GET",
                data : {
                    "search" : $search
                },
                async: false,
                success:function($data)
                {
                    $text= ' ';
                    if ($data.length > 0) {
                        jQuery.each($data, function($key, $sp) {
                            ($sp['trangthai'] == 1 )? $sp['trangthai'] = 'Hiển thị' : $sp['trangthai'] = 'Ẩn';
                            ($sp['mota'] == null )? $sp['mota'] = '' : $sp['mota'] = $sp['mota'].substr(0,50);
                            $text +='<tr>'
                            $text +='<th scope="row"><input type="radio"  data-price="'+$sp['dongia']+'" data-id="'+$sp['id']+'" name="radio-sp"></th>'
                            $text +='<td><div class="img_table"><img id="AnhNV-show" name="AnhNV_1" src="'+$url+'/upload/imageProducts/'+$sp['anh']+'"></div></td>'
                            $text +='<td>'+$sp['name']+'</td>'
                            $text +='<td>'+$sp['mota']+'</td>'
                            $text +='<td>'+$sp['vatlieu']+'</td>'
                            $text +='<td align="center">'+$sp['size']+'</td>'
                            $text +='<td align="center">'+$sp['baohanh']+' tháng</td>'
                            $text +='<td align="center">'+$sp['dongia']+'</td>'
                            $text +='<td align="center">'+$sp['trangthai']+'</td>'
                            $text +='<td align="center">'+$sp['loaisp']+'</td>'
                            $text +='</tr>';
                        }); 
                    } else {
                        $text = '<td align="center" colspan="9">Không tìm thấy khách hàng</td>'
                    }
                    $('.tbody-search-sp').html($text);
                    displaybuttonTK();
                },
                error: function (data,Status,thr) {
                    console.log("error: ",data,Status,thr);
                }
            })
        });   

        // modal tìm kiếm thiết kế
        $('#btn-search-tk').on('click', function() {
            $search = $('#search-thietke').val();
            $url = document.location.origin;
            $.ajax({
                url : "/admin/findListDesigns",
                method: "GET",
                data : {
                    "search" : $search
                },
                async: false,
                success:function($data)
                {
                    $text= ' ';
                    if ($data.length > 0) {
                        jQuery.each($data, function($key, $sp) {
                            ($sp['mota'] == null )? $sp['mota'] = '' : $sp['mota'] = $sp['mota'].substr(0,50);
                            $text +='<tr>'
                            $text +='<th scope="row" style="vertical-align: middle;"><input type="radio" data-id="'+$sp['id']+'" data-name="'+$sp['file']+'" name="radio-tk"></th>'
                            if ($sp['type'] == '.jpg' || $sp['type'] == '.png' || $sp['type'] == '.PNG' || $sp['type'] == '.JPG') {
                                $text +='<td><div class="img_table"><img id="AnhNV-show" name="AnhNV_1" src="'+$url+'/upload/fileDesigns/'+$sp['file']+$sp['type']+'"></div></td>'
                            } else {
                                $text +='<td><div class="img_table"><img id="AnhNV-show" name="AnhNV_1" src="'+$url+'/upload/icon/Docs-icon.png"></div></td>'
                            }
                            $text +='<td align="center" style="vertical-align: middle;">'+$sp['file']+'</td>'
                            $text +='<td align="center" style="vertical-align: middle;">'+$sp['type']+'</td>'
                            $text +='<td align="center" style="vertical-align: middle;">'+$sp['size']+'</td>'
                            $text +='<td>'+$sp['mota']+'</td>'
                            $text +='</tr>';
                        }); 
                    } else {
                        $text = '<td align="center" colspan="8">Không tìm thấy thiết kế</td>'
                    }
                    $('.table-thietke').html($text);
                },
                error: function (data,Status,thr) {
                    console.log("error: ",data,Status,thr);
                }
            })
        }); 


    });

});
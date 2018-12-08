<?php

namespace App\Helper;

class Helper 
{
    public function toUpperCase($string)
    {
        return mb_strtoupper($string);
    }

    public function formatDate($Date)
    {
        return date("d/m/Y", strtotime($Date));
    }

    public function formatDate_namefile($Date)
    {
        return date("d-m-Y", strtotime($Date));
    }

    public function formatCreate_at($Date)
    {
        return date("d/m/Y", strtotime($Date));
    }

    public function formatDashboard($Date)
    {
        return date("d/m", strtotime($Date));
    }

    public function formatimeReports($Date)
    {
        return date("d/m/Y H:i:s", strtotime($Date));
    }

    public function GioiTinh($gioitinh)
    {
        if($gioitinh == 1 ) {
        	return 'Nam';
        } else {
        	return 'Nữ';
        }
    }

    public function trangthaiTT($trangthai)
    {
        if($trangthai == 1 ) {
            return 'Hiển thị';
        } else {
            return 'Ẩn';
        }
    }

    public function trangthaiDH($trangthai)
    {
        if($trangthai == 1 ) {
            return '<span style="color: #8DD35F; ">Hoạt động</span>';
        } elseif ($trangthai == 2) {
            return '<span style="color: #F68A1E; ">Tạm dừng</span>';
        } else {
            return '<span style="color: #D24525; ">Hủy đơn</span>';
        }
    }

    public function trangthaiSX($trangthai)
    {
        if($trangthai == 1 ) {
            return '<span style="color: #8DD35F; ">Hoạt động</span>';
        } else {
            return '<span style="color: #F68A1E; ">Dừng</span>';
        } 
    }

    public function Tien($tien)
    {
        return number_format($tien,0,',','.');
    }

    public function trangthaiproducts($trangthai)
    {
        if($trangthai == 1 ) {
            return 'Có thể đặt';
        } else {
            return 'không thể đặt';
        }
    }

    public function tiendo($tiendo)
    {
        switch ($tiendo) {
            case 1:
                return '<span style="color: #F8A81B; font-weight: bold;">Chờ duyệt</span>';
                break;
            case 2:
                return '<span style="color: #74BE43; font-weight: bold;">Đã duyệt</span>';
                break;
            case 3:
                return '<span style="color: #07A5B0; font-weight: bold;">Chờ sản xuất</span>';
                break;
            case 4:
                return '<span style="color: #F37736; font-weight: bold;">Đang sản xuất</span>';
                break;            
            default:
                return '<span style="color: #428BCA; font-weight: bold;">Hoàn thành</span>';
                break;
        }
    }

    public function tiendosanxuat($tiendo)
    {
        switch ($tiendo) {
            case 1:
                return '<span style="color: #F37736; font-weight: bold;">Đang sản xuất</span>';
                break;
            case 2:
                return '<span style="color: #428BCA; font-weight: bold;">Hoàn thành</span>';
                break;
        }
    }

    public function trangthaibaohanh($trangthai)
    {
        if($trangthai == 1 ) {
            return 'Chưa thanh toán';
        } else {
            return 'Đã thanh toán';
        }
    }

    public function tinhtrangtonkho($trangthai)
    {
        if($trangthai < 1 ) {
            return '<span style="font-weight: bold; color: white;">Hết hàng</span>';
        } else {
            return '<span style="font-weight: bold; color: white;">Còn hàng</span>';
        }
    }

    public function loaivattu($trangthai)
    {
        if($trangthai == 1 ) {
            return 'Vật liệu';
        } else {
            return 'Công cụ';
        }
    }

    public function loaitt($trangthai)
    {
        if($trangthai == 1 ) {
            return 'Tiền mặt';
        } else {
            return 'Chuyển khoản';
        }
    }

    public function trangthaisanxuat($trangthai)
    {
        if($trangthai == 1 ) {
            return '<span style="color: #07A5B0; font-weight: bold;">Chờ sản xuất</span>';
        } elseif ($trangthai == 2) {
            return '<span style="color: #F37736; font-weight: bold;">Đang sản xuất</span>';
        } else {
            return '<span style="color: #428BCA; font-weight: bold;">Hoàn thành</span>';
        }
    }

    public function trangthaiHD($trangthai)
    {
        if($trangthai == 1 ) {
            return '<span style="color: #D14424; font-weight: bold;">Còn nợ</span>';
        } else {
            return '<span style="color: #32C24D; font-weight: bold;">Đã trả</span>';
        }
    }

    public function LoaiPhieu($trangthai)
    {
        if($trangthai == 1 ) {
            return '<span style="color: #3399FF; font-weight: bold;">Yêu cầu xuất</span>';
        } else {
            return '<span style="color: #32C24D; font-weight: bold;">Yêu cầu nhập</span>';
        }
    }
}
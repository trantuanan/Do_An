<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/print.css') }}">
	<style type="text/css">
		body{
	background-color: #F6F6F6; 
	}
	.brandSection{
	  background-color: #1F555B;
	  border:1px solid #1F555B;
	}
	.headerLeft h1{
	  color:#fff;
	  margin: 0px;
	  font-size:28px;
	}
	.header{
	  border-bottom: 2px solid #1F555B;
	  padding: 10px;
	}
	.headerRight p{
	  margin: 0px;
	  font-size:10px;
	  color:#FCF012;
	  text-align: right;
	}
	.contentSection{
	  background-color: #fff;
	  padding: 0px;
	}
	.content{
	  background-color: #fff;
	  padding:20px;
	}
	.content h1{
	  font-size:22px;
	  margin:0px;
	}
	.content p{
	  margin: 0px;
	  font-size: 11px;
	}
	.content span{
	  font-size: 11px;
	  color:#F2635F;
	}
	.panelPart{
	  background-color: #fff;
	}
	.panel-body{
	  background-color: #1F555B;
	  color:#fff;
	  padding: 5px;
	}
	.panel-footer {
	  background-color:#fff; 
	}
	.panel-footer h1{
	  font-size: 20px;
	  padding:15px;
	  border:1px dotted #DDDDDD;
	}
	.panel-footer p{
	  font-size:13px;
	  background-color: #F6F6F6;
	  padding: 5px;
	}
	.tableSection{
	  background-color: #fff;
	}
	.tableSection h1{
	  font-size:18px;
	  margin:0px;
	}
	th{
	  background-color: #383C3D;
	  color:#fff;
	}
	.table{
	  padding-bottom: 10px;
	  margin:0px;
	  border:1px solid #DDDDDD;
	}
	td:nth-child(2){
	  text-align: left;
	}
	td { 
	  height: 100%;
	}
	.bg {
	 background-color: #f00;
	  width: 100%; 
	  height: 100%; 
	  display: block; 
	}
	.lastSectionleft{
	  background-color: #fff;
	  padding-top:20px;
	}
	.Sectionleft p{
	  border:1px solid #DDDDDD;
	  height:140px;
	  padding: 5px;
	}
	.Sectionleft span{
	  color:#42A5C5;
	}
	.lastPanel{
	  text-align:center;
	}
	.panelLastLeft p,.panelLastRight p{
	  font-size:11px;
	  padding:5px 2px 5px 10px;
	}
	</style>
  <script type="text/javascript">
window.print();
 </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 brandSection">
                <div class="row">
                    <div class="col-md-12 col-sm-12 header">
                        <div class="col-md-3 col-sm-3 headerLeft">
                           <img src="{{ asset('upload/img/logo.png') }}" id="logo-top" alt="logo công ty" style="width: 100%;">
                        </div>
                        <div class="col-md-9 col-sm-9 headerRight">
                            <p>www.sieuledviet.vn</p>
                            <p>cuongaa@gmail.com</p>
                            <p>0982 26 26 26</p>
                        </div>
                    </div>
                    @foreach($invoices as $iv)
                    <div class="col-md-12 col-sm-12 content">
                        <h1>Mã hóa đơn<strong> {{ $iv->mahd }}</strong></h1>
                        <p>14/07/2018</p>
                    </div>
                    <div class="col-md-12 col-sm-12 panelPart">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 panelPart">
                              <div class="panel panel-default">
                                  <div class="panel-body">
                                      Thông tin khách hàng
                                  </div>
                                  <div class="panel-footer">
                                      <div class="row">
                                          <div class="col-md-12 col-sm-6 col-xs-6">
                                            <p><span style="font-weight: bold;"> Đơn hàng:</span> {{ $iv->madh }}</p>
                                            <p><span style="font-weight: bold;"> khách hàng:</span> {{ $iv->tenkh }}</p>
                                            <p><span style="font-weight: bold;"> Số điện thoại:</span> {{ $iv->sdt }}</p>
                                            <p><span style="font-weight: bold;"> Địa chỉ:</span> {{ $iv->diachi }}</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 panelPart">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        Thông tin hóa đơn
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-6 col-xs-6">
                                              <p><span style="font-weight: bold;"> Người tạo HĐ:</span> {{ $iv->ngtao }}</p>
                                              <p><span style="font-weight: bold;"> Ngày tạo HĐ:</span> {{ Helper::formatimeReports($iv->created_at) }}</p>
                                              <p><span style="font-weight: bold;"> Ngày cập nhât HĐ:</span> {{ Helper::formatimeReports($iv->updated_at) }}</p>
                                              <p><span style="font-weight: bold;"> Loại thanh toán:</span> {{ Helper::loaitt($iv->loaitt) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12 col-sm-12 tableSection">
                            <table class="table text-center">
                              <thead>
                                <tr class="tableHead">
                                  <th style="width:20px;">STT</th>
                                  <th>Sản phẩm</th>
                                  <th style="width:150px; text-align: center;">Đơn giá</th>
                                  <th style="width:100px; text-align: center;">Số lượng</th>
                                  <th style="width:150px; text-align:center;">Tổng tiền</th>
                                </tr>
                              </thead>
                              @php
                              	$tong = 0;
                              @endphp
                              @foreach($invoiceDetails as $bd)
                              <tbody>
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ substr(strip_tags($bd->name), 0, 50)}}</td>
                                  <td>{{ Helper::Tien($bd->dongia) }}</td>
                                  <td>{{ $bd->soluong }}</td>
                                  <td>{{ Helper::Tien($bd->soluong*$bd->dongia) }}</td>
                                </tr>
                              </tbody>
                              @php
                              	$tong += ($bd->soluong*$bd->dongia)
                              @endphp
                              @endforeach
                          </table>
                        </div>
                        <div class="col-md-12 col-sm-12 lastSectionleft "> 
                            <div class="row">
                              <div class="col-md-7 col-sm-6 Sectionleft">
                                    <p><i>{{ $iv->mota }}</i></p>
                                </div>
                                <div class="col-md-5 col-sm-6"> 
                                  <div class="panel panel-default">
                                      <div class="panel-footer lastFooter">
                                          <div class="row">
                                              <div class="col-md-5 col-sm-6 col-xs-6 panelLastLeft">
                                                <p>Tổng</p>
                                                <p>Thuế</p>
                                                <p>Thành tiền</p>
                                                <p>Giảm trừ</p>
                                                <p>Thanh toán</p>
                                              </div>
                                              <div class="col-md-7 col-sm-6 col-xs-6 panelLastRight">
                                                <p>{{ Helper::Tien($tong) }} VNĐ</p>
                                                <p>{{ Helper::Tien($tong*0.1) }} VNĐ</p>
                                                <p>{{ Helper::Tien($iv->thanhtien) }} VNĐ</p>
                                                <p>{{ Helper::Tien($iv->giamtru) }} VNĐ</p>
                                                <p><strong>{{ Helper::Tien($iv->thanhtoan) }} VNĐ</strong></p>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>  
    </div>      
</body>
</html>
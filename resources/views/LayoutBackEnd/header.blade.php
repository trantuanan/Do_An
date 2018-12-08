<div class="tab">
    <div class="thongtin-login">
      <div class="thongtin-user">
        <div class="anh-dd">
            <img id="anh-auth" data-id="" src="{{ asset('/upload/avatarNV') }}/{{ Auth::user()->anh }}">
        </div>
      </div>
      <div class="thongtin-ten">
          <p class="name"><b>{{ Auth::user()->name }}</b></p>
 <!--          <p class="roles"><i>{{ Auth::user()->role_id}}</i></p> -->
          <p ><span class="trangthai">online</span></p>
      </div>
    </div>
    <a class="navbar-toggler" data-toggle="collapse" data-target="#tab-quanlydanhmuc" aria-controls="tab-quanlydanhmuc" aria-label="Toggle navigation">
      <img src="{{ asset('upload/icon/Menu_16px.png') }}">
      Quản lý danh mục
    </a>
    <div class="pos-f-t">
      <div class="collapse" id="tab-quanlydanhmuc">
        <div class="p-4">
          @can('Q1_1')
          <a href="{{route('quanlysanphamht.index')}}"><img src="{{ asset('upload/icon/Product_16px.png') }}">Danh mục sản phẩm</a>
          @endcan

          @can('Q1_2')
          <a href="" class="navbar-toggler" data-toggle="collapse" data-target="#tab-quanlytintuc" aria-controls="tab-quanlytintuc" aria-label="Toggle navigation"><img src="{{ asset('upload/icon/News_16px.png') }}">Quản lý tin tức</a>
          <div class="pos-f-t">
            <div class="collapse" id="tab-quanlytintuc">
              <div class="p-5">
                <a href="{{route('quanlytintuc.index')}}"><span class="ion-arrow-right-b"></span> Danh mục tin tức</a>
                <a href="{{route('quanlyloaitintuc.index')}}"><span class="ion-arrow-right-b"></span> Danh mục loại tin tức</a>
              </div>
            </div>
          </div>
          @endcan

          @can('Q1_3')
          <a href="{{route('quanlykhachhang.index')}}"><img src="{{ asset('upload/icon/Customer_16px.png') }}">Quản lý khách hàng</a>
          @endcan

          @can('Q1_4')
          <a href="#"><img src="{{ asset('upload/icon/Picture_16px.png') }}">Quản lý hình ảnh</a>
          @endcan

          @can('Q4_5')
          <a href="{{route('quanlyncc.index')}}"><img src="{{ asset('upload/icon/Tags_16px.png') }}">Quản lý nhà cung cấp</a>
          @endcan

          @can('Q3_2')
          <a href="{{route('quanlyvattu.index')}}"><img src="{{ asset('upload/icon/Layers_16px.png') }}">Quản lý Vật tư</a>
          @endcan
        </div>
      </div>
    </div>
    <a class="navbar-toggler" data-toggle="collapse" data-target="#tab-quanlydathang" aria-controls="tab-quanlydathang" aria-label="Toggle navigation">
      <img src="{{ asset('upload/icon/Shopping Cart_16px.png') }}">
      Quản lý đặt hàng
    </a>
    <div class="pos-f-t">
      <div class="collapse" id="tab-quanlydathang">
        <div class="p-4">
          @can('Q2_1')
          <a href="#" class="navbar-toggler" data-toggle="collapse" data-target="#tab-quanlysanphamdat" aria-controls="tab-quanlysanphamdat" aria-label="Toggle navigation"><img src="{{ asset('upload/icon/New Product_16px.png') }}">Quản lý sản phẩm đặt</a>
          <div class="pos-f-t">
            <div class="collapse" id="tab-quanlysanphamdat">
              <div class="p-5">
                <a href="{{route('quanlysanpham.index')}}"><span class="ion-arrow-right-b"></span> Danh mục SP đặt</a>
                <a href="{{route('quanlyloaisanpham.index')}}"><span class="ion-arrow-right-b"></span> Danh mục loại SP</a>
              </div>
            </div>
          </div>
          @endcan

          @can('Q2_2')
          <a href="{{route('quanlydonhang.index')}}"><img src="{{ asset('upload/icon/Ingredients_16px.png') }}">Quản lý đơn hàng</a>
          @endcan

          @can('Q2_2')
          <a href="{{route('quanlyhoadon.index')}}"><img src="{{ asset('upload/icon/Receipt_16px.png') }}">Quản lý hóa đơn</a>
          @endcan

          @can('Q2_4')
          <a href="{{route('quanlybaohanh.index')}}"><img src="{{ asset('upload/icon/Support_16px.png') }}">Quản lý bảo hành</a>
          @endcan

          @can('Q2_5')
          <a href="{{route('quanlythietke.index')}}"><img src="{{ asset('upload/icon/Drawing Compass_16px.png') }}">Quản lý thiết kế</a>
          @endcan

        </div>
      </div>
    </div>
    <a class="navbar-toggler" data-toggle="collapse" data-target="#tab-quanlysanxuat" aria-controls="tab-quanlysanxuat" aria-label="Toggle navigation">
      <img src="{{ asset('upload/icon/Work_16px.png') }}">
      Quản lý sản xuất
    </a>
    <div class="pos-f-t">
      <div class="collapse" id="tab-quanlysanxuat">
        <div class="p-4">
          @can('Q3_1')
          <a href="{{route('yeucausanxuat.index')}}"><img src="{{ asset('upload/icon/Maintenance_16px.png') }}">Yêu cầu sản xuất</a>
          @endcan

          @can('Q3_2')
          <a href="{{route('kehoachvattu.index')}}"><img src="{{ asset('upload/icon/Layers_16px.png') }}">Kế hoạch vật tư</a>
          @endcan

          @can('Q3_3')
          <a href="{{route('quanlytiendo.index')}}"><img src="{{ asset('upload/icon/Ratings_16px.png') }}">Quản lý tiến độ</a>
          @endcan

          @can('Q3_4')
          <a href="#" class="navbar-toggler" data-toggle="collapse" data-target="#tab-quanlysanpham" aria-controls="tab-quanlysanpham" aria-label="Toggle navigation"><img src="{{ asset('upload/icon/Deployment_16px.png') }}">Quản lý sản phẩm</a>
          <div class="pos-f-t">
            <div class="collapse" id="tab-quanlysanpham">
              <div class="p-5">
                <a href="{{route('quanlysanphamsx.index')}}"><span class="ion-arrow-right-b"></span> Thực tế sản xuất</a>
                <a href="{{route('quanlysanphamloi.index')}}"><span class="ion-arrow-right-b"></span> Sản phẩm lỗi</a>
              </div>
            </div>
          </div>
          @endcan
        </div>
      </div>
    </div>
    <a class="navbar-toggler" data-toggle="collapse" data-target="#tab-quanlykhohang" aria-controls="tab-quanlykhohang" aria-label="Toggle navigation">
      <img src="{{ asset('upload/icon/Warehouse_16px.png') }}">
      Quản lý kho hàng</a>
    <div class="pos-f-t">
      <div class="collapse" id="tab-quanlykhohang">
        <div class="p-4">
          @can('Q4_1')
          <a href="{{route('yeucauxuatnhap.index')}}"><img src="{{ asset('upload/icon/Repository_16px.png') }}">Yêu cầu nhập/xuất</a>
          @endcan

          @can('Q4_2')
          <a href="{{route('quanlyphieunhap.index')}}"><img src="{{ asset('upload/icon/Import_16px.png') }}">Quản lý nhập kho</a>
          @endcan

          @can('Q4_3')
          <a href="{{route('quanlyphieuxuat.index')}}"><img src="{{ asset('upload/icon/Export_16px.png') }}">Quản lý xuất kho</a>
          @endcan

          @can('Q4_4')
          <a href="#" class="navbar-toggler" data-toggle="collapse" data-target="#tab-quanlytonkho" aria-controls="tab-quanlytonkho" aria-label="Toggle navigation"><img src="{{ asset('upload/icon/Trolley_16px.png') }}">Quản lý tồn kho</a>
          <div class="pos-f-t">
            <div class="collapse" id="tab-quanlytonkho">
              <div class="p-5">
                <a href="{{route('quanlykhohang.index')}}"><span class="ion-arrow-right-b"></span> Quản lý kho hàng</a>
                <a href="{{route('danhsachtonkho.index')}}"><span class="ion-arrow-right-b"></span> Danh sách tồn kho</a>
              </div>
            </div>
          </div>
          @endcan

        </div>
      </div>
    </div>
    <a class="navbar-toggler" data-toggle="collapse" data-target="#tab-thongkebaocao" aria-controls="tab-thongkebaocao" aria-label="Toggle navigation">
      <img src="{{ asset('upload/icon/Combo Chart_16px.png') }}">
      Báo cáo thống kê
    </a>
    <div class="pos-f-t">
      <div class="collapse" id="tab-thongkebaocao">
        <div class="p-4">
          @can('Q5_1')
          <a h href="#" class="navbar-toggler" data-toggle="collapse" data-target="#tab-baocaotonkho" aria-controls="tab-baocaotonkho" aria-label="Toggle navigation"><img src="{{ asset('upload/icon/Pie Chart_16px.png') }}">Báo cáo tồn kho</a>
          <div class="pos-f-t">
            <div class="collapse" id="tab-baocaotonkho">
              <div class="p-5">
                <a href="{{route('baocaotonkho.index')}}"><span class="ion-arrow-right-b"></span> Thống kê tồn kho</a>
                <a href="{{route('baocaotonkho.phieunhap')}}"><span class="ion-arrow-right-b"></span> Thống kê nhập kho</a>
                <a href="{{route('baocaotonkho.phieuxuat')}}"><span class="ion-arrow-right-b"></span> Thống kê Xuất kho</a>
              </div>
            </div>
          </div>
          @endcan

          @can('Q5_2')
          <a href="{{route('thongkesanxuat.index')}}"><img src="{{ asset('upload/icon/Area Chart_16px.png') }}">Thống kê sản xuất</a>
          @endcan

          @can('Q5_3')
          <a href="{{route('thongkewebsite.index')}}"><img src="{{ asset('upload/icon/Bar Chart_16px.png') }}">Thống kê website</a>
          @endcan
        </div>
      </div>
    </div>
    <a class="navbar-toggler" data-toggle="collapse" data-target="#tab-quanlyhethong" aria-controls="tab-quanlyhethong" aria-label="Toggle navigation">
      <img src="{{ asset('upload/icon/Settings_16px.png') }}">
      Quản lý hệ thống
    </a>
    <div class="pos-f-t">
      <div class="collapse" id="tab-quanlyhethong">
        <div class="p-4">
          <a href="{{route('quanlytaikhoan.profile')}}"><img src="{{ asset('upload/icon/Profiles_16px.png') }}">Thông tin tài khoản</a>
          @can('Q6_1')
          <a href="{{route('quanlytaikhoan.index')}}"><img src="{{ asset('upload/icon/User Account_16px.png') }}">Quản lý tài khoản</a>
          @endcan
          
          @can('Q6_2')
          <a href="{{route('quanlyphanquyen.index')}}"><img src="{{ asset('upload/icon/Checked User Male_16px.png') }}">Quản lý phân quyền</a>
          @endcan
          
          @can('Q6_3')
          <a href="{{route('quanlyphanhoi.index')}}"><img src="{{ asset('upload/icon/Chat_16px.png') }}">Quản lý phản hồi</a>
          @endcan
        </div>
      </div>
    </div>
</div>
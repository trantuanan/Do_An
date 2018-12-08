@extends('layouts.default')

@section('title', 'Dự án hoàn thiện')

@section('content')
@include('layouts.slide_top')
<div id="product-page">
	<div id="wrapper-website">
		<div class="row">
		  <div class="col-2 tab-left">
		  	<div class="brg-menu">
		  		<div class="nav flex-column nav-pills" aria-orientation="vertical">
			      <a class="nav-link" href="/products">Tất cả sản phẩm</a>
			      <a class="nav-link" href="/products/CNC" aria-selected="false">Đèn nội thất</a>
			      <a class="nav-link" href="/products/LED" aria-selected="false">Biển quảng cáo led</a>
			      <a class="nav-link" href="/products/GC" aria-selected="false">Gia công chữ </a>
			      <a class="nav-link" href="/products/TT" aria-selected="false">Trang trí tòa nhà</a>
			      <a class="nav-link" href="/products/TL" aria-selected="false">Biển tấm lớn</a>
			      <a class="nav-link" href="/products/CD" aria-selected="false">Đèn phong cách Nhật-和風ランプ</a>
			    </div>
		  	</div>
		  </div>
		  <div class="col-10 cont-right">
		    @yield('content-1')
		  </div>
		</div>
	</div>
</div>
@endsection
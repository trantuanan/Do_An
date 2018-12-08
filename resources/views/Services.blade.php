@extends('layouts.default')

@section('title', 'Dịch vụ cung cấp')

@section('content')
@include('layouts.slide_top')
<div id="services-page">
	<div id="wrapper-website">
		<div class="services-btn">
			<div class="row">
				<div class="col-md-2">
					<button type="button" onclick="javascript:location.href='/services/LED'" class="btn btn-outline-primary">Biển quảng cáo led</button>
				</div>
				<div class="col-md-2">
					<button type="button" onclick="javascript:location.href='/services/TL'" class="btn btn-outline-secondary">Biển tấm lớn các loại</button>
				</div>
				<div class="col-md-2">
					<button type="button" onclick="javascript:location.href='/services/TT'" class="btn btn-outline-success">Trang trí kiến trúc</button>
				</div>
				<div class="col-md-2">
					<button type="button" onclick="javascript:location.href='/services/GC'" class="btn btn-outline-danger">Gia công chữ quảng cáo</button>
				</div>
				<div class="col-md-2">
					<button type="button" onclick="javascript:location.href='/services/CNC'" class="btn btn-outline-warning">Đèn nội thất</button>
				</div>
				<div class="col-md-2">
					<button type="button" onclick="javascript:location.href='/services/CD'" class="btn btn-outline-info">Đèn Nhật-和風ランプ</button>
				</div>			
			</div>
		</div>
		<div class="services-contect">
			@yield('content-2')
		</div>
	</div>
</div>
@endsection
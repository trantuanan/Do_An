@extends('layouts.default')
@foreach($products as $pd)
@section('title',  $pd->name )

@section('content')
<div class="single_page">
	<div id="wrapper-website">
		<div class="content_all row">
		
			<div class="content_item col-md-6">
					<img src="{{ asset('upload/imageProducts') }}/{{ $pd->anh }}">
			</div>
			
			<div class="title_item col-md-6">
				<form action="{{route('cart.store')}}" method="POST">
          			{{ csrf_field() }}
          			<input type="hidden" name="id" value="{{$pd->id}}">
			        <input type="hidden" name="name" value="{{$pd->name}}">
			        <input type="hidden" name="dongia" value="{{$pd->dongia}}">
			        <input type="hidden" name="image" value="{{$pd->anh}}">
			        <input type="hidden" name="size" value="{{$pd->size}}">
			        <input type="hidden" name="vatlieu" value="{{$pd->vatlieu}}">
					<h2 style="color: #007BFF;"> {{ $pd->name }} </h2>
					<p><span style="font-weight: bold;">Loại sản phẩm:</span> {{ $pd->loaisp }}</p>
      				<p><span style="font-weight: bold;">Mô tả:</span> {!! $pd->mota !!}</p>
      				<p><span style="font-weight: bold;">Kích thước:</span> {{ $pd->size }}</p>
      				<p><span style="font-weight: bold;">Vật liệu:</span> {{ $pd->vatlieu }}</p>
      				<p><span style="font-weight: bold;">Bảo Hành:</span> {{ $pd->baohanh }} tháng</p>
      				<p><span style="font-weight: bold;">Tình trạng:</span> {{ Helper::trangthaiproducts($pd->trangthai) }}</p>
      				<p ><span style="font-weight: bold;">Đơn giá:</span> <span style="font-weight: bold; color: red;">{{ Helper::Tien($pd->dongia) }}</span> VND</p> 
			        <button type="submit" class="btn btn-danger"><i class="icon ion-android-cart"></i> CHO VÀO GIỎ</button>
      				<button type="button" class="btn btn-warning"><i class="icon ion-ios-telephone"></i> LIÊN HỆ NGAY</button>
      			</form>
			</div>
			
		@endforeach
		<h3 class="td_product_lq form-group"> Sản phẩm liên quan </h3>
		<div class="products_all row">
		  @if(isset($products_lq))
		    @foreach($products_lq as $lq)
		    <div class="col-md-3 ">
		      <div class="product_item">
		        <img title="{{$lq->name}}" src="{{ asset('upload/imageProducts') }}/{{ $lq->anh }}">
		        <div class="container_product_item">
		          <a href="{{route('singleProduct',$lq->id)}}" title="{{$lq->name}}"><h4><b>{{ substr(strip_tags($lq->name), 0, 30)}}{{ strlen(strip_tags($lq->name)) > 30? '...': ''}}</b></h4></a> 
		          <p class="gia_product"><span style="font-weight: bold;">Đơn giá:</span> <span style="font-weight: bold; color: red;">{{ Helper::Tien($lq->dongia) }}</span> VND</p> 
		          <p class="kichthuoc_product"><span style="font-weight: bold;">Kích thước:</span> {{ $lq->size }}</p>
		          <p class="vatlieu_product"><span style="font-weight: bold;">Vật liệu:</span> {{ substr(strip_tags($lq->vatlieu), 0, 30)}}{{ strlen(strip_tags($lq->vatlieu)) > 30? '...': ''}}</p>
		        </div>
		        <button type="button" id="btn-add-cart" class="btn btn-primary">Thêm vào giò hàng</button>
		      </div>
		    </div>
		    @endforeach
		  @else
		      <p style="margin: 50px auto;">Không có dữ liệu.</p>
		  @endif
		  <div style="width: 100%;">
		    {!! $products_lq->links() !!}
		  </div>
		</div>
		</div>
	</div>
</div>

@endsection
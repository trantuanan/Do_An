@extends('layouts.default')
@foreach($products as $pd)
@section('title',  $pd->name )

@section('content')
<div class="single_page">
	<div id="wrapper-website">
		<div class="content_all row">
		
			<div class="content_item col-md-6">
					<img src="{{ asset('upload/imageProductComplete') }}/{{ $pd->anh }}">
			</div>
			<div class="title_item col-md-6">
					<h2 style="color: #007BFF;"> {{ $pd->name }} </h2>
					<p><span style="font-weight: bold;">Loại sản phẩm:</span> {{ $pd->loaisp }}</p>
      				<p><span style="font-weight: bold;">Mô tả:</span> {!! $pd->mota !!}</p>
      				<p><span style="font-weight: bold;">Địa điểm:</span> {{ $pd->diadiem }}</p>
      				<p><span style="font-weight: bold;">Thời gian:</span> {{ $pd->thoigian }}</p>
      				<p><span style="font-weight: bold;">Tác giả:</span> {{ $pd->ngtao }}</p>
      				<p><span style="font-weight: bold;">Tình trạng:</span> {{ Helper::trangthaiTT($pd->trangthai) }}</p>
      				<button type="button" class="btn btn-warning"><i class="icon ion-ios-telephone"></i> LIÊN HỆ NGAY</button>
			</div>
		@endforeach
		<h3 class="td_product_lq form-group"> Sản phẩm liên quan </h3>
		<div class="grid">
		  @if(isset($products_lq))
		    @foreach($products_lq as $lq)
		    <div class="grid-item">
		          <img class="card-img-top" src="{{ asset('upload/imageProductComplete') }}/{{ $lq->anh }}" alt="Card image cap">
		          <div class="overlay">
		              <div class="text"><a href="{{route('singleProductComplete',$lq->id)}}">{{ substr(strip_tags($lq->name), 0, 40)}}{{ strlen(strip_tags($lq->name)) > 40? '...': ''}}</a></div>
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
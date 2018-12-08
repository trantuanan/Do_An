@extends('layouts.default')
@foreach($posts as $pt)
@section('title',  $pt->title )

@section('content')
<div class="single_page">
	<div id="wrapper-website">
		<div class="content_all row">
			<div class="content_post col-md-8">
					<h2 style="color: #007BFF;"> {{ $pt->title }} </h2>
					<div class="container" style="margin-left: 0 !important; padding: 0px !important;">
						<div class="row">
							<p class="col-3"> {{ $pt->created_at }}</p>
							<p class="col-4"><span style="font-weight: bold;">Tác giả:</span> {{ $pt->tacgia }}</p>
						</div>
					</div>
					
					<h4> {!! $pt->mota !!}</h4>
					<img src="{{ asset('upload/imagePost') }}/{{ $pt->anh }}">
					
					<div style="text-align: left;">
						<p> {!! $pt->noidung !!}</p>
					</div>
			</div>
			@endforeach
			<div class="col-md-4" >
				<h3 class="td_product_lq form-group"> Tin tức liên quan </h3>
				<div class="products_all container" >
				  @if(isset($posts_lq))
				    @foreach($posts_lq as $lq)
				    <div class=" News-item row">
		                <img src="{{ asset('upload/imagePost') }}/{{ $lq->anh }}" class=" col-md-6" style="width:100%; max-height: 150px !important;">
		                <div class="contect-tt  col-md-6">
		                    <a href="{{route('singlePost',$lq->id)}}"><h4> {{ substr(strip_tags($lq->title), 0, 40)}}{{ strlen(strip_tags($lq->title)) > 40? '...': ''}} </h4></a>
		                    <p><span class="icon ion-android-time"></span> {{ $lq->updated_at }} </p>
		                    <p>{{ substr(strip_tags($lq->mota), 0, 70)}}{{ strlen(strip_tags($lq->mota)) > 70? '...': ''}}</p>
		                </div>
		            </div>
				    @endforeach
				  @else
				      <p style="margin: 50px auto;">Không có dữ liệu.</p>
				  @endif
				  <div style="width: 100%; margin: 5px 0px;">
				    {!! $posts_lq->links() !!}
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
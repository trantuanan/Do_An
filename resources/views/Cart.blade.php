@extends('layouts.default')

@section('title', 'Giỏ hàng')

@section('content')
<div id="services-page" style="padding-bottom: 50px;">
	<div id="wrapper-website">
		<h2 style="padding: 20px 0px;">Chi tiết giỏ hàng</h2>
		@include('flash::message')
		@if(count($cart))
		<table class="table table-bordered">
		  	<thead class="thead-dark">
			    <tr>
				    <th scope="col" style="width: 3%">STT</th>
				    <th scope="col" style="width: 30%" >Tên sản phẩm</th>
				    <th scope="col" style="width: 10%" >Đơn giá</th>
				    <th scope="col" style="width: 10%" >Số lượng</th>
				    <th scope="col" style="width: 10%" >Tổng</th>
				    <th  scope="col" style="width: 5%; text-align: center;" ><a>Xóa</a></th>
			    </tr>
		  	</thead>
		  	<tbody>
			  	@foreach($cart as $item)
			    <tr>
			      	<th scope="row" style="vertical-align:middle; text-align: center;">{{ $loop->iteration }}</th>
			      	<td>
			      		<div class="row">
			      			<div class="col-md-2" id="cart_item_img">
			      				<img  title="{{$item->name}}" src="{{ asset('upload/imageProducts') }}/{{ $item->options->image }}">
			      			</div>
			      			<div class="col-md-10 tt_cart">
			      				<a  href="{{route('singleProduct',$item->id)}}" title="{{$item->name}}" >{{ $item->name }}</a>
			      				<p><span style="font-weight: bold;">Kích thước:</span> {{ $item->options->size }}</p>
			      				<p><span style="font-weight: bold;">Vật liệu:</span> {{ $item->options->vatlieu }}</p>
			      			</div>
			      		</div>
			     	</td>
			      	<td style="vertical-align:middle; text-align: center;">
			      		<span style="font-weight: bold;">{{ Helper::Tien($item->price) }}</span> VNĐ
			      	</td>
			      	<td style="vertical-align:middle; text-align: center;">
			      		<input type="number" class="form-control soluong_cart" data-id="{{ $item->rowId }}" value="{{ $item->qty }}">
			      	</td>
			      	<td style="vertical-align:middle; text-align: center;"><span style="font-weight: bold;">{{ Helper::Tien($item->subtotal)}}</span> VNĐ</td>
			      	<td align="center"  style="vertical-align:middle;">
			      		<form action="{{route('cart.destroy',$item->rowId)}}" method="POST">
			      			{{ csrf_field() }}
			      			{{ method_field('DELETE') }}
			      			<button type="submit" class="btn btn-primary"><span class="icon ion-ios-trash""></span></button>
			      		</form>
			      	</td>
			    </tr>
			    @endforeach
		  	</tbody>
		  	<tfoot>
			  	<tr>
			  		<td colspan="4" style="text-align: right;"><span style="font-weight: bold;">Tổng tiền:</span></td>
			  		<td colspan="2" >
			  			<span style="font-weight: bold; color: red; font-size: 16px;">{{ Cart::subtotal(0,',','.') }}</span> VNĐ
			  		</td>
			  	</tr>
			  	<tr>
			  		<td colspan="4" style="text-align: right;"><span style="font-weight: bold;">Thuế (10%):</span></td>
			  		<td colspan="2" >
			  			<span style="font-weight: bold; color: red; font-size: 16px;">{{ Cart::tax(0,',','.') }}</span>  VNĐ
			  		</td>
			  	</tr>
			  	<tr>
			  		<td colspan="4" style="text-align: right;"><span style="font-weight: bold;">Thành tiền:</span></td>
			  		<td colspan="2" > 
			  			<span style="font-weight: bold; color: red; font-size: 16px;">{{ Cart::total(0,',','.') }}</span> VNĐ
			  		</td>
			  	</tr>
		 	 </tfoot>
		</table>


		<div class="row">
		    <form class="col-6" action="{{ route('home') }}">
		        <button type="submit" class="btn btn-success btn-lg" id="btn-tieptuc-donhang"><span class="ion-ios-home"></span> Tiếp tục mua hàng</button>
		    </form>
		    <form class="col-6" action="{{ route('customer.create.bill') }}" method="GET">
		        <button type="submit" class="btn btn-danger btn-lg pull-right" id="btn-tao-donhang">Gửi đơn hàng <span class="ion-arrow-right-b"></span></button>
		    </form>
		</div>


		@else
        <p>Bạn không có mặt hàng nào trong giỏ.</p>
        <a href="{{route('home')}}">Quay lại trang chủ ></a>
        @endif
	</div>
	<form action="{{route('cart.update')}}" method="POST" class="qty_cart">
	{{ csrf_field() }}
		<input type="hidden" name="id" class="id_value">
		<input type="hidden" name="qty" class="qty_value">
	</form>
</div>
@endsection
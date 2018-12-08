@extends('layouts.default')

@section('title', 'Gửi đơn hàng')

@section('content')
<div id="services-page">
	<div id="wrapper-website" style="padding-bottom: 50px;">
		    <div id="register">
		        <p class="h2" align="center" style="margin: 20px;"> THÔNG TIN ĐƠN HÀNG</p>
		        <form method="POST" action="{{ route('customer.create.submit') }}" enctype="multipart/form-data">
		            @csrf
		            <input type="hidden" name="customer_id" id="idkh_donhang" value="{{ Auth::user()->id }}">
		            <input type="hidden" name="giamtru"  value="0">
		            <input type="hidden" name="thanhtoan"  value="0">
		            <input type="hidden" name="thanhtien"  value="{{ Cart::total(0,'','') }}">
            		<input type="hidden" name="tiendo" id="congdoan_donhang" value="1">
            		<input type="hidden" name="thue"  value="10">
		            <div class="container" style="width: 1200px !important;">
		                <div class="form-row">
		                    <div class="form_post col-md-12">
			                    <div class="form-group row">
			                        <div class="col-md-6">
			                          <label for="tenkh_donhang">{{ __('Tên khách hàng') }}</label>
			                          <input type="text" class="form-control  {{ $errors->has('customer_id') ? ' is-invalid' : '' }}" id="tenkh_donhang" placeholder="Nhập tên khách hàng" readonly="true"  value="{{Auth::user()->name}}">
			                          @if ($errors->has('customer_id'))
			                            <span class="invalid-feedback">
			                                <strong>{{ $errors->first('customer_id') }}</strong>
			                            </span>
			                          @endif
			                        </div>
			                        <div class="col-md-3">
			                          <label for="tenkh_donhang">{{ __('Ngày hẹn (dự kiến)') }}</label>
			                          <input type="date" class="form-control {{ $errors->has('ngayht') ? ' is-invalid' : '' }}" id="ngayht_donhang" name="ngayht" value="{{ old('ngayht') }}">
				                        @if ($errors->has('ngayht'))
				                            <span class="invalid-feedback">
				                                <strong>{{ $errors->first('ngayht') }}</strong>
				                            </span>
				                        @endif
			                        </div>
			                         <div class="col-md-3">
			                          <label for="tenkh_donhang">{{ __('Ngày trả (dự kiến)') }}</label>
			                          <input type="date" class="form-control {{ $errors->has('ngaytra') ? ' is-invalid' : '' }}" id="ngaytra_donhang" name="ngaytra" value="{{ old('ngaytra') }}" readonly="true">
				                        @if ($errors->has('ngaytra'))
				                            <span class="invalid-feedback">
				                                <strong>{{ $errors->first('ngaytra') }}</strong>
				                            </span>
				                        @endif
			                        </div>
			                    </div>

			                     <div class="form-group row">
			                        <div class="col-md-6">
			                          <label for="tenkh_donhang">{{ __('Số điện thoại') }}</label>
			                          <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"  name="phone" value="{{ old('phone') }}">
				                        @if ($errors->has('phone'))
				                            <span class="invalid-feedback">
				                                <strong>{{ $errors->first('phone') }}</strong>
				                            </span>
				                        @endif
			                        </div>
			                        <div class="col-md-6">
			                          <label for="tenkh_donhang">{{ __('Địa chỉ') }}</label>
			                          <input type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"  name="address" value="{{ old('address') }}">
				                        @if ($errors->has('address'))
				                            <span class="invalid-feedback">
				                                <strong>{{ $errors->first('address') }}</strong>
				                            </span>
				                        @endif
			                        </div>
			                    </div>

			                    <div class="form-group row">
			                        <div class="col-md-12">
			                          	<label for="form-noidung">Ghi chú</label>
                        				<textarea style="height: 150px; color: black !important; font-size: 15px !important;" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" placeholder="Ghi chú thông tin...">{{ old('mota') }}</textarea>
			                        </div>
			                    </div>
			                </div>
		            	</div>
		            </div>

		            <h4 style="padding-bottom: 20px;">Chi tiết giỏ hàng</h4>
		            <table class="table table-bordered">
					  	<thead class="thead-dark">
						    <tr>
							    <th scope="col" style="width: 3%">STT</th>
							    <th scope="col" style="width: 30%" >Tên sản phẩm</th>
							    <th scope="col" style="width: 10%" >Đơn giá</th>
							    <th scope="col" style="width: 10%" >Số lượng</th>
							    <th scope="col" style="width: 10%" >Tổng</th>
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
						      		<input type="number" class="form-control soluong_cart" data-id="{{ $item->rowId }}" value="{{ $item->qty }}" readonly="true">
						      	</td>
						      	<td style="vertical-align:middle; text-align: center;"><span style="font-weight: bold;">{{ Helper::Tien($item->subtotal)}}</span> VNĐ</td>
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
					    <div class="col-6">
					        <button type="button" onclick="javascript:location.href='/cart'" class="btn btn-success btn-lg" id="btn-tieptuc-donhang"><span class="ion-arrow-left-b"></span>	Về giỏ hàng </button>
					    </div>
					    <div class="col-6" >
					        <button type="submit" class="btn btn-danger btn-lg pull-right" id="btn-tao-donhang"> Đặt hàng <span class="ion-arrow-right-b"></span></button>
					    </div>
					</div>
		        </form>
		    </div>
	</div>
</div>
@endsection
@extends('Services')

@section('content-2')
<div class="row">
	@foreach($categories as $ct)
	<div class="anh-mau col-md-6">
  		<img class="card-img-top" src="{{ asset('upload/imageCategoryProduct') }}/{{ $ct->anh }}" alt="Card image cap">
  	</div>
  	<div class="col-md-6">
  		<div class="thongso-sanpham ">
      		<h2 style="color: #007BFF;"> {{ $ct->name }} </h2>
      		<p><span style="font-weight: bold;">Mô tả:</span> {{ $ct->mota }}</p>
      	</div>
  	</div>
  	@endforeach
</div>
<h3 class="td_product form-group"> Sản phẩm đặt </h3>
<div class="form-row">
    <div class="form-group">
        <select class="form-control form-control-sm" id="fillter_product">
          <option> -- Sắp xếp -- </option>
          <option value="1"> Mới nhất </option>
          <option value="2"> Cũ nhất </option>
          <option value="3"> Tên: A > Z </option>
          <option value="4"> Tên: A < Z </option>
          <option value="5"> Giá: thấp > cao </option>
          <option value="6"> Giá: thấp < cao </option>
        </select>
        <form action="{{route('services.LED')}}" method="GET" id="order_products">
            <input type="hidden" value="" name="name" id="name_product_oderby">
            <input type="hidden" value="" name="order" id="order_product_oderby">
        </form>
    </div>
</div>
<div class="products_all row">
	@foreach($products as $pd)
	<div class="col-md-3 ">
		<div class="product_item">
		  <img title="{{$pd->name}}" src="{{ asset('upload/imageProducts') }}/{{ $pd->anh }}">
		  <div class="container_product_item">
		    <a href="{{route('singleProduct',$pd->id)}}" title="{{$pd->name}}"><h4><b>{{ substr(strip_tags($pd->name), 0, 30)}}{{ strlen(strip_tags($pd->name)) > 30? '...': ''}}</b></h4></a> 
		    <p class="gia_product"><span style="font-weight: bold;">Đơn giá:</span> <span style="font-weight: bold; color: red;">{{ Helper::Tien($pd->dongia) }}</span> VND</p> 
		    <p class="kichthuoc_product"><span style="font-weight: bold;">Kích thước:</span> {{ $pd->size }}</p>
		    <p class="vatlieu_product"><span style="font-weight: bold;">Vật liệu:</span> {{ substr(strip_tags($pd->vatlieu), 0, 30)}}{{ strlen(strip_tags($pd->vatlieu)) > 30? '...': ''}}</p>
		  </div>
      <form action="{{route('cart.store')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{$pd->id}}">
          <input type="hidden" name="name" value="{{$pd->name}}">
          <input type="hidden" name="dongia" value="{{$pd->dongia}}">
          <input type="hidden" name="image" value="{{$pd->anh}}">
          <input type="hidden" name="size" value="{{$pd->size}}">
          <input type="hidden" name="vatlieu" value="{{$pd->vatlieu}}">
        <button type="submit" id="btn-add-cart" class="btn btn-primary">CHO VÀO GIỎ</button>
      </form>
		</div>
	</div>
	@endforeach
</div>
<div style="width: 100%;">
    {!! $products->links() !!}
  </div>
@endsection
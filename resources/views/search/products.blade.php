@extends('Search')

@section('content-1')
<h3 class="td_product form-group"> Dịch vụ </h3>
<div class="products_all row">
  @if(isset($products))
    @foreach($products as $pd)
    <div class="col-md-3 ">
      <div class="product_item">
        <img title="{{$pd->name}}" src="{{ asset('upload/imageProducts') }}/{{ $pd->anh }}">
        <div class="container_product_item">
          <a href="" title="{{$pd->name}}"><h4><b>{{ substr(strip_tags($pd->name), 0, 30)}}{{ strlen(strip_tags($pd->name)) > 30? '...': ''}}</b></h4></a> 
          <p class="gia_product"><span style="font-weight: bold;">Đơn giá:</span> <span style="font-weight: bold; color: red;">{{ Helper::Tien($pd->dongia) }}</span> VND</p> 
          <p class="kichthuoc_product"><span style="font-weight: bold;">Kích thước:</span> {{ $pd->size }}</p>
          <p class="vatlieu_product"><span style="font-weight: bold;">Vật liệu:</span> {{ substr(strip_tags($pd->vatlieu), 0, 30)}}{{ strlen(strip_tags($pd->vatlieu)) > 30? '...': ''}}</p>
        </div>
        <button type="button" id="btn-add-cart" class="btn btn-primary">Thêm vào giò hàng</button>
      </div>
    </div>
    @endforeach
  @else
      <p style="margin: 50px auto;">Không có dữ liệu.</p>
  @endif
</div>

@endsection
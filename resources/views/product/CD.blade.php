@extends('Product')

@section('content-1')
<h2 align="center">ĐÈN PHONG CÁCH NHẬT-和風ランプ </h2>
<div id="fillter-product">
    <div class="form-row">
        <div class="form-group">
            <select class="form-control form-control-sm" id="fillter_product">
              <option> -- Sắp xếp -- </option>
              <option value="1"> Mới nhất </option>
              <option value="2"> Cũ nhất </option>
              <option value="3"> Tên: A > Z </option>
              <option value="4"> Tên: A < Z </option>
            </select>
            <form action="{{route('products.CD')}}" method="GET" id="order_products">
                <input type="hidden" value="" name="name" id="name_product_oderby">
                <input type="hidden" value="" name="order" id="order_product_oderby">
            </form
        </div>
    </div>   
</div>
<div class="grid">
  @foreach($products as $pd)
    <div class="grid-item">
          <img class="card-img-top" src="{{ asset('upload/imageProductComplete') }}/{{ $pd->anh }}" alt="Card image cap">
          <div class="overlay">
              <div class="text"><a href="{{route('singleProductComplete',$pd->id)}}">{{ substr(strip_tags($pd->name), 0, 40)}}{{ strlen(strip_tags($pd->name)) > 40? '...': ''}}</a></div>
          </div>
    </div>
  @endforeach
</div>
{!! $products->links() !!}
@endsection
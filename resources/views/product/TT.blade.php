@extends('Product')

@section('content-1')
<h2 align="center"> TRANG TRI KIẾN TRÚC</h2>
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
            <form action="{{route('products.TT')}}" method="GET" id="order_products">
                <input type="hidden" value="" name="name" id="name_product_oderby">
                <input type="hidden" value="" name="order" id="order_product_oderby">
            </form
        </div>
    </div>   
</div>
<div class="product-list" data-liffect="flipInY">
  @foreach($products as $pd)
    <div  class="product-detail">
          <div class="fix-img card-img-top" style="background-image: url({{ asset('upload/imageProductComplete') }}/{{ $pd->anh }});">
          </div>
          <div class="overlay">
              <div class="text"><a href="{{route('singleProductComplete',['id' => $pd->id, 'locale' => App::getLocale()])}}">{{ substr(strip_tags($pd->name), 0, 40)}}{{ strlen(strip_tags($pd->name)) > 40? '...': ''}}</a></div>
          </div>
    </div>
  @endforeach
</div>
{!! $products->links() !!}
@endsection
@extends('Search')

@section('content-1')
<h3 class="td_product form-group"> Sản phẩm </h3>
<div class="grid">
  @if(isset($products))
    @foreach($products as $pd)
      <div class="grid-item">
            <img class="card-img-top" src="{{ asset('upload/imageProductComplete') }}/{{ $pd->anh }}" alt="Card image cap">
            <div class="overlay">
                <div class="text"><a href="#">{{ substr(strip_tags($pd->name), 0, 40)}}{{ strlen(strip_tags($pd->name)) > 40? '...': ''}}</a></div>
            </div>
      </div>
    @endforeach
  @else
      <p style="margin: 50px;" align="center">Không có dữ liệu.</p>
  @endif
</div>
<div style="width: 100%;">
   
</div>
@endsection
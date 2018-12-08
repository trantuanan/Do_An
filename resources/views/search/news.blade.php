@extends('Search')

@section('content-1')
<h3 class="td_product form-group"> Tin tức </h3>
<div class="products_all row">
  @if(isset($posts))
    @foreach($posts as $pt)
    <div class="col-md-3 News-item">
        <img src="{{ asset('upload/imagePost') }}/{{ $pt->anh }}">
        <div class="contect-tt">
            <p><span class="icon ion-android-time"></span> {{ $pt->updated_at }} </p>
            <a href="#"><h4> {{ substr(strip_tags($pt->title), 0, 40)}}{{ strlen(strip_tags($pt->title)) > 40? '...': ''}} </h4></a>
            <p>{{ substr(strip_tags($pt->mota), 0, 70)}}{{ strlen(strip_tags($pt->mota)) > 70? '...': ''}}</p>
        </div>
    </div>
    @endforeach
  @else
    <p style="margin: 50px auto;">Không có dữ liệu.</p>
  @endif
</div>
@endsection
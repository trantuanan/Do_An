@extends('layouts.default')

@section('title', 'Tin tức')

@section('content')
@include('layouts.slide_top')
<div id="news-page">
    <div id="wrapper-website">
        <h2 align="center">TIN TỨC</h2>
        <div id="fillter-product">
            <div class="form-row">
                <div class="form-group">
                    <select class="form-control " id="fillter_new">
                      <option> -- chọn loại tin tức -- </option>
                      <option value="0"> Tất cả các tin</option>
                      @foreach($categories as $ct)
                      <option value="{{ $ct->id }}"> {{ $ct->name }} </option>
                      @endforeach
                    </select>
                    <form action="{{route('news')}}" method="GET" id="order_new">
                        <input type="hidden" name="id" id="id_news_oderby">
                    </form>
                </div>

            </div>   
        </div>
        <div class="row" >
            @if($posts->count() > 0)
                @foreach($posts as $pt)
                <div class="col-md-3 News-item">
                    <img src="{{ asset('upload/imagePost') }}/{{ $pt->anh }}">
                    <div class="contect-tt">
                        <p><span class="icon ion-android-time"></span> {{ $pt->updated_at }} </p>
                        <a href="{{route('singlePost',$pt->id)}}"><h4> {{ substr(strip_tags($pt->title), 0, 40)}}{{ strlen(strip_tags($pt->title)) > 40? '...': ''}} </h4></a>
                        <p>{{ substr(strip_tags($pt->mota), 0, 70)}}{{ strlen(strip_tags($pt->mota)) > 70? '...': ''}}</p>
                    </div>
                </div>
                @endforeach
            @else 
                <div class="alert alert-info" role="alert" align="center" style="margin: 30px auto; width: 80%;">
                  <h4 class="alert-heading">Thông báo.</h4>
                  <hr>
                  <p>Không tìm thấy tin tức nào cho loại tin này.</p>
                </div>
            @endif
        </div>
        {!! $posts->links() !!}
    </div>
</div>
@endsection
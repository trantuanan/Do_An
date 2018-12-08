@extends('layouts.default')

@section('title', 'Công ty TNHH NOI THAT 24H')
{{-- <a href="{!! route('user.change-language', ['jp']) !!}">English</a>
<a href="{!! route('user.change-language', ['vi']) !!}">Vietnam</a> --}}
@section('content')
@include('layouts.slide_top')
<div id="home-page">
    <div id="about-us">
        <div id="wrapper-website">
            <div class="row content-about">
                <div class="text-about col-md-6">
                        <h2 align="center">{{ __('labels.ve_chung_toi') }}</h2>
                        <p>Thay mặt ban lãnh đạo công ty TNHH Noi That 24H, tôi xin chân thành cảm ơn Quý khách hàng và đối tác đã luôn tin tưởng và đồng hành cùng chúng tôi trong suốt thời gian qua. Trong suốt chặng đường phát triển, dưới sự lãnh đạo của Ban Giám đốc công ty, cùng sự đồng tâm hiệp lực của đội ngũ cán bộ, công nhân viên giàu kinh nghiệm, tận tụy, giỏi tay nghề, đã mang lại cho Nội Thất 24H những thành tựu đáng kể và đã từng bước khẳng định vị trí của mình trên thị trường truyền thông quảng cáo tại Việt Nam. Với đội ngũ Nhân lực tận tâm cùng khả năng sáng tạo không ngừng nghỉ, cộng với việc áp dụng phương pháp thi công tiên tiến Nội Thất 24H quyết tâm mang lại cho khách hàng những sản phẩm với ý tưởng độc đáo mang kiểu dáng hiện đại, thẩm mỹ cao, chất lượng tốt với giá thành hợp lý.</p>
                        <div class="button-text-about">
                            <a href="/About" type="button" class="btn btn-outline-info"> Thông tin chi tiết</a>
                        </div>    
                </div>
                <div class="image-about col-md-6">
                      <img src="{{ asset('upload/img/about-img.jpg') }}" class="img-about" alt="logo công ty">
                </div>
            </div>
        </div>
    </div>

    <div id="service">
        <div id="wrapper-website">
            <h2 align="center">DỊCH VỤ CUNG CẤP</h2>
            <div class="row" >
                @foreach($categories as $ct)
                <div class="col-md-4 item-col-service">
                    <div class="card" style="width: 22rem;">
                        <div class="anh-category-index">
                            <img class="card-img-top" src="{{ asset('upload/imageCategoryProduct') }}/{{ $ct->anh }}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $ct->name }}</h5>
                            <p class="card-text">{{ substr(strip_tags($ct->mota), 0, 70)}}{{ strlen(strip_tags($ct->mota)) > 70? '...': ''}}</p>
                            <a href="/services" class="btn btn-outline-primary"><span class="ion-arrow-right-b"></span> Xem chi tiết</a>
                            </div>
                        </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>

    <div id="product">
        <div id="wrapper-website">
            <h2 align="center">DỰ ÁN TIÊU BIỂU</h2>
            <div class="grid" data-liffect="flipInY">
              <!-- do not use banner in Masonry layout -->
                @foreach($products as $pd)
                  <div class="grid-item">
                        <img class="card-img-top" src="{{ asset('upload/imageProductComplete') }}/{{ $pd->anh }}" alt="Card image cap">
                        <div class="overlay">
                            <div class="text"><a href="{{route('singleProductComplete',$pd->id)}}">{{ substr(strip_tags($pd->name), 0, 40)}}{{ strlen(strip_tags($pd->name)) > 40? '...': ''}}</a></div>
                        </div>
                  </div>
                @endforeach
            </div>
            <div class="button-text-product">
                <button onclick="javascript:location.href='/product'" type="button" class="btn btn-outline-info" >Xem thêm dự án</button>
            </div>   
        </div>
    </div>

    <div id="News">
        <div id="wrapper-website">
            <h2 align="center">TIN TỨC NỔI BẬT</h2>
            
            <div class="row" >
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
               
                <div class="button-text-news">
                    <button  onclick="javascript:location.href='/news'" type="button" class="btn btn-outline-info">Xem thêm tin tức</button>
                </div> 
            </div>
            
        </div>
    </div>
    <div id="map-report">
        <div id="wrapper-website">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.7270654220097!2d105.86143821443484!3d20.963473095380927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac32714ade4b%3A0xd528c983b1198bd2!2zSGF0ZWNvIEhvw6BuZyBNYWkgKFgyQS1Zw6puIFPhu58p!5e0!3m2!1svi!2s!4v1538109507664" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            
        </div>
    </div>
</div>
@endsection



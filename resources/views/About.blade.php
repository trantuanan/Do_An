@extends('layouts.default')

@section('title', 'Giới thiệu về chúng tôi')

@section('content')
@include('layouts.slide_top')
<div id="about-page">
	<div id="wrapper-website">
        <h2 align="center">VỀ CHÚNG TÔI</h2>
        <div class="hoso">
           <span style="font-size: 28px" align="center">Công ty TNHH Nội Thất 24H là công ty hoạt động trong lĩnh vực sản xuất và kinh doanh đồ nội thất, đồ trang trí, gia dụng trong gia đình từ năm 2018. Nội Thất 24H là thành viên của TCT Group, một tập đoàn hoạt động trong các lĩnh vực như bán lẻ, kinh doanh bất động sản, sản xuất, xuất khẩu, kinh doanh nhà hàng, khách sạn và xây dựng nội thất. Cho tới nay TCT Group đã bao gồm  gần 20 công ty thành viên với hàng loạt các chuỗi hệ thống quen thuộc như nhà hàng (PHỐ BIỂN, VẠN HOA, ĐỆ NHẤT, MAMMA MIA, HOLA, MARUTA), trung tâm thể thao (Fit24 Fitness & Yoga), siêu thị (AEON FIVIMART), siêu thị nội thất (NHÀ ĐẸP)…
           Với phương châm: “Mang đến sự hài lòng cho tất cả các khách hàng”, Nội Thất 24H không chỉ đề cao chất lượng của từng sản phẩm mà còn đặc biệt chú trọng đến các dịch vụ đi kèm như tư vấn thiết kế, vận chuyển, lắp đặt, chăm sóc khách hàng, bảo hành, bảo trì …Chúng tôi luôn mong muốn khách hàng khi đến với Nhà Đẹp sẽ có được những lợi ích tốt nhất trước và sau khi sử dụng sản phẩm của công ty.</span>
            <img height="700" width="1200" src="{{ asset('upload/img/gioithieu.jpg') }}" class="img-about" alt="gioi thieu công ty">
           <span style="font-size: 32px" align="center">Hệ thống sản phẩm của Nội Thất 24H bao gồm đồ nội thất, đồ trang trí, gia dụng với mẫu mã, giá cả đa dạng, phù hợp với nhiều phong cách nội thất và kinh tế của từng gia đình. Đến với chúng tôi, chắc chắn bạn sẽ hoàn toàn hài lòng bởi những gì bạn cần cho tổ ấm của mình đều có tại Nội Thất 24H.
           Sản phẩm của Nội Thất 24H đa dạng về mẫu mã, hợp lý về giá cả. Dù bạn đang sở hữu một ngôi nhà sang trọng, rộng rãi hay một căn hộ chung cư với diện tích vừa phải, bạn đều có thể lựa chọn cho mình những sản phẩm nội thất, gia dụng phù hợp và đồng bộ nhất cho ngôi nhà của mình tại Nội Thất 24H. Bất cứ phong cách nội thất nào bạn yêu thích, Nội Thất 24H sẽ luôn là điểm đến tin cậy cho sự lựa chọn của bạn.</span>
        </div>
	</div>
</div>
@endsection
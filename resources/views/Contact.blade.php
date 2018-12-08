@extends('layouts.default')

@section('title', 'liên hệ với chúng tôi')

@section('content')
@include('layouts.slide_top')
<div id="contact-page">
	<div id="wrapper-website">
        <h2 align="center">THÔNG TIN LIÊN HỆ</h2>
        @include('flash::message') 
        <div class="noidung-contact">
        	<!-- <img src="{{ asset('upload/img/sieuledviet.jpg') }}"> -->
        	<div class="row">
        		<div class="col-md-3">
        			<div class="phone-contact">
        				<h3>ĐIỆN THOẠI : </h3>
        				<p><span class="icon ion-ios-telephone">0967193281</p>
        				<p><span class="icon ion-ios-telephone">0913 21 1139</p>
        			</div>
        			<div class="email-contact">
        				<h3>THƯ ĐIỆN TỬ : </h3>
        				<p><span class="icon ion-email">bopdan2@gmail.com</p>
        				<p><span class="icon ion-email">bopdan3@gmail.com</p>
        			</div>
        			<div class="location-contact">
        				<h3>ĐỊA CHỈ : </h3>
        				<p><span class="icon ion-ios-location"> Chung cư Hateco, đường Vành đai 3, P.Yên Sở, Q.Hoàng Mai, TP. Hà Nội</span></p>
        			</div>
        		</div>
        		<div class="col-md-9 form-contact">
        			<div class="form">  
		                <div id="signup">   
		                      <h4>Phản hồi với chúng tôi</h4>
		                      <form action="{{ route('quanlyphanhoi.create') }}" method="post">   
		                      @csrf      
		                          <div class="field-wrap">
		                            <label>
		                              Họ tên<span class="req">*</span>
		                            </label>
		                            <input type="text" required autocomplete="off" name="name" />
		                          </div>

		                          <div class="field-wrap">
		                            <label>
		                              Địa chỉ Email<span class="req">*</span>
		                            </label>
		                            <input type="email" required autocomplete="off" name="mail_address" />
		                          </div>
		                       
		                          <div class="field-wrap">
		                            <label>
		                              Phản hồi của quý khách<span class="req">*</span>
		                            </label>
		                            <textarea rows="3" name="noidung" required></textarea>
		                          </div>
		                       
		                            <button type="submit" class="button button-block"/><span>Gửi Phản Hồi</span></button>
		                      </form>        
		                </div>
		            </div>
        		</div>
        	</div>
        	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.7270654220097!2d105.86143821443484!3d20.963473095380927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac32714ade4b%3A0xd528c983b1198bd2!2zSGF0ZWNvIEhvw6BuZyBNYWkgKFgyQS1Zw6puIFPhu58p!5e0!3m2!1svi!2s!4v1538109507664" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
	</div>
</div>
@endsection
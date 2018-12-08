@extends('Customer')

@section('content-1')
<h2>Phản hồi đến doanh nghiệp</h2>
<div id="reports-form-customer" class="container">
  @foreach($reports as $rp)
  <div class="row">
    <div class="alert alert-success col-12" role="alert">
      <div style="display: inline-block; width: 100%;">
        <p style="float: left; margin-bottom: 0px;"><strong>{{ $rp->name }}</strong> - <i>{{ $rp->mail_address }}</i> </p> <p style="float: right; margin-bottom: 0px;"><span class="ion-android-time"></span><i> {{ Helper::formatimeReports($rp->created_at) }}</i></p>
      </div>
      <hr>
      <p class="mb-0">{{ $rp->noidung }}</p>
    </div>
  </div>
  @endforeach
</div>
<form action="{{ route('customer.createReports') }}" method="post">   
@csrf   
      <input type="hidden" name="name" value="{{ Auth::user()->name }}">
      <input type="hidden" name="mail_address" value="{{ Auth::user()->mail_address }}">
      <textarea rows="3" name="noidung" style="color: black !important;" required></textarea>
      <button type="submit" class="btn btn-primary" style="margin-top: 10px;" /><span>Gửi Phản Hồi</span></button>
</form>
@endsection
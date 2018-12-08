@extends('BackEnd')

@section('title', 'quản lý phản hồi')

@section('content-backend')
<p class="h2"><img src="{{ asset('upload/icon/Chat_30px.png') }}"> quản lý phản hồi</p>
<div class="row" style="margin-top: 20px;">
    <form class="col-4" action="{{route('quanlyphanhoi.index')}}" method="GET">
        <div id="search_user">
            <div class="form-row">
                <div class="form-group col-8">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Tên hoặc thư điện tử" name="search" value="{{  old('search') }}">
                </div>
                <div class="form-group col-4">
                    <input type="submit" class="btn btn-primary form-control" value="Tìm Kiếm">    
                </div>
            </div>   
        </div>
    </form>
</div>
<div id="reports-form" class="container">
	@foreach($reports as $rp)
	<div class="row">
		<div class="alert alert-success col-11" role="alert">
		  <div style="display: inline-block; width: 100%;">
		  	<p style="float: left; margin-bottom: 0px;"><strong>{{ $rp->name }}</strong> - <i>{{ $rp->mail_address }}</i> </p> <p style="float: right; margin-bottom: 0px;"><span class="ion-android-time"></span><i> {{ Helper::formatimeReports($rp->created_at) }}</i></p>
		  </div>
		  <hr>
		  <p class="mb-0">{{ $rp->noidung }}</p>
		</div>
		<form class="col-1" action="{{route('quanlyphanhoi.delete',$rp->id)}}" method="POST">
	      @csrf
	      {{ method_field('DELETE') }}
	      <button type="submit" class="btn btn-danger btn-sm" id="btn-delete-hoadon"><span class="ion-trash-a tacvu-icon"></span></button>
	    </form>
	</div>
	
	@endforeach
</div>

@endsection
@extends('BackEnd')

@section('title', 'Quản lý tình trạng sản xuất')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Ratings_30px.png') }}"> Quản lý tình trạng sản xuất</p>

<div class="row" style="margin-top: 15px;">
    <form class="col-4" action="{{route('quanlytiendo.index')}}" method="GET">
        <div id="search_user">
            <div class="form-row">
                <div class="form-group col-8">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Tên yêu cầu" name="search" value="{{  old('search') }}">
                </div>
                <div class="form-group col-4">
                    <input type="submit" class="btn btn-primary form-control" value="Tìm Kiếm">    
                </div>
            </div>   
        </div>
    </form>
</div>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col" style="width: 5%">Mã TĐ</th>
      <th scope="col" style="width: 5%">Mã YC</th>
      <th scope="col" style="width: 10%">Tên yêu cầu</th>
      <th scope="col" style="width: 13%">Sản phẩm</th>
      <th scope="col" style="width: 8%">Số cần</th>
      <th scope="col" style="width: 8%">Đã có</th>
      <th scope="col" style="width: 8%">Còn lại</th>
      <th scope="col" style="width: 10%">Thiết kế</th>
      <th scope="col" style="width: 10%">Ngày hẹn</th>
      <th scope="col" style="width: 10%">Ngày trả</th>
      <th scope="col" style="width: 10%">Tiến độ</th>
      <th scope="col" style="width: 5%">Tác vụ</th>
    </tr>
  </thead>
  <tbody id="table-vattu">
    @foreach ($tdsxs as $td)
    <tr>
      <td align="center" style="vertical-align: middle;">{{ $td->matdsx}}</td>
      <td align="center" style="vertical-align: middle;">{{ $td->maycsx}}</td>
      <td>{{ substr(strip_tags($td->tenyc), 0, 50)}}{{ strlen(strip_tags($td->tenyc)) > 50? '...': ''}}</td>
      <td>{{ $td->tensp}}</td>
      <td align="center" style="vertical-align: middle;">{{ $td->soluong }}</td>
      <td align="center" style="vertical-align: middle;">{{ $td->soluong - $td->conlai }}</td>
      <td align="center" style="vertical-align: middle;">
        @if($td->conlai == 0 && $td->tiendo == 1)
        <div style="padding-left: 0px !important; margin: auto;">
          <form action="{{route('quanlytiendo.done', $td->id)}}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <input type="hidden" name="ycsx_id" value="{{ $td->ycsx_id }}">
            <button type="submit" class="btn btn-success btn-sm"> Xong </button>
          </form>
        </div>
        @else
        {{ $td->conlai }}
        @endif
      </td>
      <td align="center" style="vertical-align: middle;">
        <div class="col-md-7 tt_cart" style="padding-left: 0px !important; margin: auto;">
          <button type="button" class="btn btn-info btn-sm" id="btn_xem_file" data-toggle="modal" data-target="#modal_design_upload" data-id="{{ $td->design_id }}">Xem</button>
        </div>
      </td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($td->created_at)}}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($td->ngayht)}}</td>
      <td align="center" style="vertical-align: middle;">{!! Helper::tiendosanxuat($td->tiendo) !!}</td>
      <td align="center" style="vertical-align: middle;">
        <form action="{{route('quanlytiendo.destroy', $td->id)}}" method="POST">
          @csrf
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-danger btn-sm"><span class="ion-trash-a tacvu-icon"></span></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $tdsxs->links() !!}

<!-- Modal upload thiết kế -->
<div class="modal_customer_donhang">
    <div class="modal fade bd-example-modal-lg" id="modal_design_upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered  modal-lg" style="width: 800px !important" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalCenterTitle">Danh sách thiết kế</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i aria-hidden="true">&times;</i>
            </button>
          </div>
          <div class="modal-body">
            <script type="text/javascript">
                tinymce.init({
                    selector: '#form-mota',
                    readonly : 1
                })
            </script>
            <form method="POST" action="{{ route('quanlythietke.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="row">
                  <div class="form_post col-md-8">
                      <div class="form-group row">
                          <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('File') }}</label>

                          <div class="col-md-10">
                              <div class="custom-file">
                                <input id="name_file_designs_xem" type="text" class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}" name="file" value="{{ old('vatlieu') }}"  readonly="true">
                                @if ($errors->has('file'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('file') }}</strong>
                                  </span>
                                  @endif
                              </div>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="vatlieu" class="col-md-2 col-form-label text-md-right">{{ __('Type') }}</label>

                          <div class="col-md-10">
                              <input id="type_file_designs_xem" type="text" class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('vatlieu') }}"  readonly="true">

                              @if ($errors->has('type'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('type') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="size" class="col-md-2 col-form-label text-md-right">{{ __('Size') }}</label>

                          <div class="col-md-10">
                              <input id="size_file_designs_xem" type="text" class="form-control {{ $errors->has('size') ? ' is-invalid' : '' }}" value="{{ old('size') }}" readonly="true">
                              <input id="size_file_designs_1_xem" type="hidden" class="form-control" name="size" value="{{ old('size') }}" readonly="true">
                              @if ($errors->has('size'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('size') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                  </div>

                  <div class=" col-md-3">
                      <div class="anhdesigns_show_xem">
                          <img id="AnhNV-show" src="{{ asset('/upload/imagePost') }}/default_avatar.jpg">
                      </div>
                      <div style="margin-top: 10px;">
                        <a href="" download="" id="download_file_xem">
                          <button type="button" class="btn form-control btn-primary">Tải xuống</button>
                        </a>
                      </div>
                  </div>
              </div>

              <div class="form-group row">
                <div class="form-group row col-md-8">
                  <label for="form-noidung" class="col-md-2 col-form-label text-md-right">{{ __('Mô tả') }}</label>

                  <div class="col-md-10">
                      <textarea style="height: 150px;" class="form-control{{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" id="form-mota" ></textarea>

                      @if ($errors->has('mota'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('mota') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>
              </div>
          </form>
          </div>

        </div>
      </div>
    </div>
</div>
@endsection

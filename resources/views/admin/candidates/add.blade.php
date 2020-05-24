@extends('admin.layout.index')
@section('content')
    <!-- general form elements -->
    <div class="card card-dark">
        @if(count($errors)>0)
            <div class="alert ">
                @foreach($errors->all() as $err)
                    {{$err}} <br>
                @endforeach
            </div>
        @endif
        @if(session('thongbao'))
            <div class="alert">
                {{session('thongbao')}}
            </div>
        @endif
        <div class="card-header">
            <h3 class="card-title">Thêm ứng viên </h3>
        </div>

        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="admin/candidate/add" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên ứng viên</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                </div>

                <div class="form-group">
                    <label >Vị trí ứng cử</label>
                    <select name="position" class="form-control">
                        @foreach($positions as $p)
                            <option value="{{$p->id}}">{{$p->position_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->

    </div>

@endsection

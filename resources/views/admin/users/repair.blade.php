@extends('admin.layout.index')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Sửa thông tin tài khoản</h1>
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

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Sửa tài khoản Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="quickForm" action="admin/users/repair/{{$customer->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{$customer->email}}" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label >Tên</label>
                                    <input type="text" name="name" class="form-control" value="{{$customer->name}}" placeholder="Tên sử dụng">
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label name="role" for="role">Vai trò</label>--}}
{{--                                    --}}
{{--                                    <select class="form-control" name="role" id="role">--}}
{{--                                        @if($customer->role == 1)--}}
{{--                                        <option value="1" selected >Admin</option>--}}
{{--                                        <option value="0">User</option>--}}
{{--                                        @else--}}
{{--                                            <option value="1"  >Admin</option>--}}
{{--                                            <option value="0" selected>User</option>--}}
{{--                                         @endif--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mật khẩu của bạn</label>
                                    <input type="password" name="_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <br>


                                <hr>
                                <h4>Nếu đổi mật khẩu của tài khoản này hãy nhập</h4>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mật khẩu mới</label>
                                    <input type="password" name="password" class="form-control" value="" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
                                    <input type="password" name="re_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

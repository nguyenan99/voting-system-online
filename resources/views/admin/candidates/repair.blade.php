@extends('admin.layout.index')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Sửa thông tin ứng viên</h1>
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
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="quickForm" action="admin/candidate/repair/{{$candidate->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$candidate->candidate_name}}" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label name="positon_id" for="positon_id">Vị trí ứng tuyển</label>

                                    <select class="form-control" name="positon_id" id="role">
                                        @foreach($positions as $pos)
                                        @if($pos->id == $candidate->position_id)
                                            <option value="{{$pos->id}}" selected >{{$pos->position_name}}</option>

                                        @else
                                            <option value="{{$pos->id}}"  >{{$pos->position_name}}</option>

                                        @endif
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
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

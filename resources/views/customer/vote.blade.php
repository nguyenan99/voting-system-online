@extends('admin.layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">


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
                            <h3 class="card-title">Bầu cử cho vị trí {{$positionVote->position_name}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="quickForm" action="customer/start-vote" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label name="role" for="role">Chọn ứng viên</label>
                                    <select class="form-control" name="candidate_id" id="role">
                                        @foreach($cadidateVote as $can)
                                            <option name="candidate_id" value="{{$can->id}}" selected >{{$can->candidate_name}}</option>

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

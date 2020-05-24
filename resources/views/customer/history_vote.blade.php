@extends('admin.layout.index')
@section('content')
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="card-header col-xs-6" >
                    <h3 class="card-title">Danh sách bầu cử </h3>
                </div>
{{--                <div class="card-header col-xs-6 display-flex" style="left: 60%" >--}}
{{--                    <div class="addB" style="padding: 5px">--}}
{{--                        <hr  width="100%" size="5px" align="center" />--}}
{{--                        <button type="button" class="btn btn-info"><a style="text-decoration: none;color:#ffffff"  href="admin/candidate/add">Thêm</a></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Position</th>
                    <th>Trạng thái bầu cử</th>
                    <th style="width: 40px;text-align: center">Hành động</th>


                </tr>
                </thead>
                <tbody id="bodyData">
               <?php
               $i = 1;

                ?>
                @foreach($position as $po)
                    <?php
                    //more PHP code
                        $m = 0;
                        $k = 0;
                    ?>
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$po->position_name}}</td>

                                @foreach($vote as $vote_candidate)

                                @if($vote_candidate->position_id == $po->id)
                                <td> {{$vote_candidate->candidate_name}}</td>
                                <td>
                                    <button type="button" class="btn btn-danger"> Đã bầu cử</button>
                                </td>
                                    <?php
                                    $m = 1
                                    ?>
                                @break
                                @endif

                                @endforeach
                            @if($m==0)
                            <td>  Bạn chưa bầu cử cho vị trí này </td>
                            <td>
                                <button type="button" class="btn btn-success"> <a style="text-decoration: none;color:#ffffff"  href="customer/start-vote/{{$po->id}}">Bầu cử</a></button>
                            </td>
                                @endif
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection



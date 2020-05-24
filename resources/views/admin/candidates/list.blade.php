{{--@extends('admin.layout.index')--}}
{{--@section('content')--}}
{{--    <div class="card">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="card-header col-xs-6" >--}}
{{--                    <h3 class="card-title">Danh sách ứng viên</h3>--}}
{{--                </div>--}}
{{--                <div class="card-header col-xs-6 display-flex" style="left: 60%" >--}}
{{--                    <div class="addB" style="padding: 5px">--}}
{{--                        <hr  width="100%" size="5px" align="center" />--}}
{{--                        <button type="button" class="btn btn-info"><a style="text-decoration: none;color:#ffffff"  href="admin/candidate/add">Thêm</a></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- /.card-header -->--}}
{{--        <div class="card-body">--}}
{{--            <table class="table table-bordered">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th style="width: 10px">#</th>--}}
{{--                    <th>Cadidate</th>--}}
{{--                    <th>Position</th>--}}
{{--                    <th style="width: 40px;text-align: center">Sửa</th>--}}
{{--                    <th style="width: 40px;text-align: center">Xóa</th>--}}

{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody id="bodyData">--}}
{{--                @foreach($candidates as $cd)--}}
{{--                <tr>--}}
{{--                    <td>{{$cd->id}}</td>--}}
{{--                    <td>{{$cd->candidate_name}}</td>--}}
{{--                    <td>--}}
{{--                        @foreach($positisons as $posi)--}}
{{--                            @if($posi->id == $cd->position_id )--}}
{{--                                {{$posi->position_name}}--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <button type="button"  class="btn btn-info"><a style="text-decoration: none;color:#ffffff"  href="admin/candidate/repair/{{$cd->id}}">Sửa</a></button>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <button type="button" class="btn btn-danger"> <a style="text-decoration: none;color:#ffffff" onclick="return confirm('Are you sure?')" href="admin/candidate/delete/{{$cd->id}}">Xóa</a></button>--}}
{{--                    </td>--}}

{{--                </tr>--}}
{{--                @endforeach--}}

{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--        <!-- /.card-body -->--}}
{{--        <div class="card-footer clearfix">--}}
{{--            <ul class="pagination pagination-sm m-0 float-right">--}}
{{--                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
@extends('admin.layout.index')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                        <tr>
                                            <th style="width: 10px">ID</th>
                                            <th>Tên ứng viên</th>
                                            <th>Vị trí ứng cử</th>
                                            <th style="width: 40px;text-align: center">Sửa</th>
                                            <th style="width: 40px;text-align: center">Xóa</th>

                                        </tr>
                        </thead>
                        <tbody>
                        @foreach($candidates as $cd)
                                        <tr>
                                            <td>{{$cd->id}}</td>
                                            <td>{{$cd->candidate_name}}</td>
                                            <td>
                                                @foreach($positisons as $posi)
                                                    @if($posi->id == $cd->position_id )
                                                        {{$posi->position_name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <button type="button"  class="btn btn-info"><a style="text-decoration: none;color:#ffffff"  href="admin/candidate/repair/{{$cd->id}}">Sửa</a></button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger"> <a style="text-decoration: none;color:#ffffff" onclick="return confirm('Are you sure?')" href="admin/candidate/delete/{{$cd->id}}">Xóa</a></button>
                                            </td>

                                        </tr>
                                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Tên Ứng Viên</th>
                            <th>Vị trí ứng cử</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('sc')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                }
            });
        });
    </script>



@endsection



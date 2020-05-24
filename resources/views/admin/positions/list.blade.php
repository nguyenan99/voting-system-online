{{--@extends('admin.layout.index')--}}
{{--@section('content')--}}
{{--    <div class="card">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="card-header col-xs-6" >--}}
{{--                    <h3 class="card-title">Danh sách vị trí ứng tuyển</h3>--}}
{{--                </div>--}}
{{--                <div class="card-header col-xs-6 display-flex" style="left: 60%" >--}}
{{--                    <div class="addB" style="padding: 5px">--}}
{{--                        <hr  width="100%" size="5px" align="center" />--}}
{{--                        <button type="button" class="btn btn-info"><a style="text-decoration: none;color:#ffffff"  href="admin/position/add">Thêm</a></button>--}}
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

{{--                    <th>Position</th>--}}
{{--                    <th style="width: 40px;text-align: center">Xóa</th>--}}

{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody id="bodyData">--}}
{{--                @foreach($position as $posi)--}}
{{--                    <tr>--}}
{{--                        <td>{{$posi->id}}</td>--}}
{{--                        <td>{{$posi->position_name}}</td>--}}
{{--                        <td>--}}
{{--                            <button type="button" class="btn btn-danger"> <a style="text-decoration: none;color:#ffffff" onclick="return confirm('Are you sure?')" href="admin/position/delete/{{$posi->id}}">Xóa</a></button>--}}
{{--                        </td>--}}

{{--                    </tr>--}}
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
                                            <th style="width: 10px">id</th>

                                            <th>Vị trí bầu cử</th>
                                            <th style="width: 40px;text-align: center">Xóa</th>

                                        </tr>
                        </thead>
                        <tbody>
                        @foreach($position as $posi)
                                            <tr>
                                                <td>{{$posi->id}}</td>
                                                <td>{{$posi->position_name}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger"> <a style="text-decoration: none;color:#ffffff" onclick="return confirm('Are you sure?')" href="admin/position/delete/{{$posi->id}}">Xóa</a></button>
                                                </td>

                                            </tr>
                                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Vị trí bầu cử</th>


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



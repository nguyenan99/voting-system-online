{{--@extends('admin.layout.index')--}}

{{--@section('content')--}}
{{--    <div class="card">--}}
{{--        <div class="card-header">--}}
{{--            @if(session('thongbao'))--}}

{{--                <div class="alert">--}}
{{--                    {{session('thongbao')}}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <h3 class="card-title">DANH SÁCH TÀI KHOẢN</h3>--}}

{{--            <div class="card-tools">--}}
{{--                <div class="input-group input-group-sm" style="width: 150px;">--}}
{{--                    <input  type="text" name="table_search" class="form-control float-right" placeholder="Search">--}}

{{--                    <div class="input-group-append">--}}
{{--                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- /.card-header -->--}}
{{--        <div class="card-body table-responsive p-0">--}}
{{--            <table class="table table-hover text-nowrap">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th>ID</th>--}}
{{--                    <th>Tên</th>--}}
{{--                    <th>Email</th>--}}
{{--                    <th>Vai trò</th>--}}
{{--                    <th style="width: 40px;text-align: center">Sửa</th>--}}
{{--                    <th style="width: 40px;text-align: center">Xóa</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach($users as $u)--}}
{{--                <tr>--}}
{{--                    <td>{{$u->id}}</td>--}}
{{--                    <td>--}}
{{--                        {{$u->name}}--}}
{{--                        @if($u->id == $currentlyUserId)--}}
{{--                            <div class="" style="background-color: #1b4b72; padding: 2px;color: white; height: 30px;width: 200px;text-align: center">Tài khoản của bạn</div>--}}
{{--                        @endif--}}
{{--                    </td>--}}
{{--                    <td>{{$u->email}}</td>--}}
{{--                    <td>@if($u->role == true)--}}
{{--                            Admin--}}
{{--                        @else--}}
{{--                            user--}}
{{--                        @endif</td>--}}
{{--                    <td>--}}
{{--                        <button type="button"  class="btn btn-info"><a style="text-decoration: none;color:#ffffff"  href="admin/users/repair/{{$u->id}}">Sửa</a></button>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <button type="button" class="btn btn-danger"> <a style="text-decoration: none;color:#ffffff" onclick="return confirm('Are you sure?')" href="admin/users/delete/{{$u->id}}">Xóa</a></button>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}

{{--            </table>--}}
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
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th style="width: 40px;text-align: center">Sửa</th>
                            <th style="width: 40px;text-align: center">Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $u)
                                        <tr>
                                            <td>{{$u->id}}</td>
                                            <td>
                                                {{$u->name}}
                                                @if($u->id == $currentlyUserId)
                                                    <div class="" style="background-color: #1b4b72; padding: 2px;color: white; height: 30px;width: 200px;text-align: center">Tài khoản của bạn</div>
                                                @endif
                                            </td>
                                            <td>{{$u->email}}</td>
                                            <td>@if($u->role == true)
                                                    Admin
                                                @elseif($u->role == false)
                                                    user
                                                @endif</td>
                                            <td>
                                                <button type="button"  class="btn btn-info"><a style="text-decoration: none;color:#ffffff"  href="admin/users/repair/{{$u->id}}">Sửa</a></button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger"> <a style="text-decoration: none;color:#ffffff" onclick="return confirm('Are you sure?')" href="admin/users/delete/{{$u->id}}">Xóa</a></button>
                                            </td>
                                        </tr>
                                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Vai trò</th>
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




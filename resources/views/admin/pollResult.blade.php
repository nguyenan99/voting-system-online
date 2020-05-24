@extends('admin.layout.index')
@section('content')
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="card-header col-xs-6" >
                    <h3 class="card-title">Kết quả bỏ phiếu</h3>
                </div>

            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Cadidate</th>
                    <th>Position</th>
                    <th>Progress</th>
                    <th style="width: 40px">Percent</th>
                </tr>
                </thead>
                <tbody id="bodyData">
                {{--                <tr>--}}
                {{--                    <td>1.</td>--}}
                {{--                    <td>Update software</td>--}}
                {{--                    <td>Director</td>--}}
                {{--                    <td>--}}
                {{--                        <div class="progress progress-xs">--}}
                {{--                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>--}}
                {{--                        </div>--}}
                {{--                    </td>--}}
                {{--                    <td><span class="badge bg-danger">55%</span></td>--}}
                {{--                </tr>--}}

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
@endsection
@section('scipt')


    <script>
        $(document).ready(function() {
            {{--var url = "{{URL('userData')}}";--}}
            $.ajax({
                url: "http://127.0.0.1:8000/api/candidates",
                type: "GET",
                data: {
                    {{--_token: '{{ csrf_token() }}'--}}
                },
                dataType: 'json',
                success: function (dataResult) {
                    console.log(dataResult);

                    var bodyData = '';


                    // var percent =  (row.count_vote/row.count_vote_position)*100;
                    var i = 1;
                    $.each(dataResult, function (index, row) {
                        // var editUrl = url + '/' + row.id + "/edit";


                        bodyData += "<tr>"
                        bodyData += "<td>" + i++ + "</td><td>" + row.candidate_name + "</td><td>" + row.position_name + "</td>"
                        bodyData += "<td>" +  "  <div class=\"progress progress-xs\">"
                        bodyData += "<div class=\"progress-bar progress-bar-danger\" style=\"width:" +  row.percen +"%" + "\">"
                        bodyData +=  "</div>"
                        bodyData +=  "</div>"
                        bodyData += " </td>"
                        bodyData += "<td>"
                        bodyData +=  " <span class=\"badge bg-danger\">"
                        bodyData += row.percen
                        bodyData += "%"
                        bodyData += "</span>"
                        bodyData +=  "</td>"
                        bodyData += "</tr>"
                    })
                    $("#bodyData").append(bodyData);
                }
            })
        })


    </script>
@endsection

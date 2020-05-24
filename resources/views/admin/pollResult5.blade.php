
@extends('admin.layout.index')
@section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Ứng viên</th>
                                <th>Vị trí ứng cử</th>
                                <th>Tổng số phiếu bầu</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($candidates as $candi)
                            <tr>

                                <td>{{$candi->id}}</td>
                                <td>{{$candi->candidate_name}}</td>
                                <td>{{$candi->position_name}}</td>
                                <td>{{$candi->countVote}}</td>

                            </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Tên</th>
                                <th>Vị trí ứng cử</th>
                                <th>Số phiếu bầu</th>
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



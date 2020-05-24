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
                    <th>Winner</th>
                    <th>Position</th>
                    <th>Count of vote</th>
                    
                </tr>
                </thead>
                <tbody id="bodyData">
                <?php
                    $index = 0;
                ?>
                @foreach($position as $posi)
                                <tr>
                                    <td>
                                        <?php
                                        $index ++;
                                        ?>
                                    </td>
                                    <td>{{$posi->nameMax }}</td>
                                    <td>{{$posi->position_name}}</td>
                                    <td>{{$posi->maxOfPosition}}</td>


                                </tr>
                @endforeach

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

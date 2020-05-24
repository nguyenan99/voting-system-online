@extends('admin.layout.index')
@section('content')
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="card-header col-xs-6" >
                    <h3 class="card-title">Kết quả bỏ phiếu của vị trí : {{$posiId->position_name}}</h3>
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
                    <th>Count Votes</th>

                </tr>
                </thead>
                <?php
                    $i = 0;
                ?>
                <tbody id="bodyData">
                @foreach($posiId->candidateList as $poca)
                                <tr>
                                    <td>
                                        <?php
                                        $i  ++;
                                        ?>
                                        {{$i}}
                                    </td>
                                    <td>{{$poca->candidate_name }}</td>

                                    <td>
                                        {{$poca->countVote}}
                                    </td>

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


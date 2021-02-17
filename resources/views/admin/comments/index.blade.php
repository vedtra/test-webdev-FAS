@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Comment</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {{--<a href="create.html" class="btn btn-success">Добавить</a>--}}
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Теxt</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{csrf_field()}}
                        @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td>{!!$comment->text!!}</td>
                            <td>
                                @if($comment->status == 1)
                                    <a href="{{route('comment.status', $comment->id)}}" class="fa fa-lock" title="blok!"></a>
                                @else
                                    <a href="{{route('comment.status', $comment->id)}}" class="fa fa-thumbs-o-up" title="setujui!"></a>
                                @endif
                                <a href="{{route('comment.destroy', $comment->id)}}" class="fa fa-remove" title="remove"></a>
                                    <a href="{{route('comment.edit', $comment->id)}}" class="fa fa-pencil"></a>
                            </td>
                        </tr>

                        @endforeach
                        {{--</tfoot>--}}
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
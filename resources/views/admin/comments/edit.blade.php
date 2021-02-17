@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        </section>

        <!-- Main content -->
        <section class="content">

        <!-- Default box -->
            {{Form::open(['route'=>['comment.update', $comment->id],
                                'method' => 'post'
                    ])}}
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Comment</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Тext Comment</label>
                                <textarea name="text" id="" cols="30" rows="10" class="form-control">{!!$comment->text!!}</textarea>
                                <input type="hidden" name="id" value="{{$comment->id}}">
                            </div>
                        </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Update</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{Form::close()}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

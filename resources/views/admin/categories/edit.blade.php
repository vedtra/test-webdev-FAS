@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit category</h3>
                </div>
                @include('admin.errors')
                <div class="box-body">
                    {{Form::open(['route'=>['categories.update', $category->id],
                    'method' => 'put'])}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$category->title}}">

                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                   
                    <button class="btn btn-warning pull-right">Save</button>
                </div>
                <!-- /.box-footer-->
                {{Form::close()}}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

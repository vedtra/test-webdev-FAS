@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">
    @include('admin.errors')
    @include('pages.alerts_message')
    {{Form::open(['route'=>['subscribers.store']])}}
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Add Subscriber</h3>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
               
                <button class="btn btn-success pull-right">Save</button>
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

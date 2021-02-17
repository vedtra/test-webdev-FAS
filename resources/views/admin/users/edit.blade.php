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
                    <h3 class="box-title">Edit User</h3>
                </div>
                @include('admin.errors')
                <div class="box-body">
                    <div class="col-md-6">
                        {{Form::open(['route' => ['users.update', $user->id],
                            'method' => 'put',
                            'files' => true,
                            ])}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="text" class="form-control" name="email" id="exampleInputEmail1" placeholder="" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">sign</label>
                            <input type="text" class="form-control" id="sign" name="sign"
                                   placeholder="" value="{{$user->sign}}">
                        </div>

                        <div class="form-group">
                            <img src="{{$user->getAvatar()}}"  alt="" width="200" class="img-responsive">
                            <label for="exampleInputFile">Photo</label>
                            <input name="avatar" type="file" id="exampleInputFile">

                            <p class="help-block">image format..</p>
                        </div>


                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Update</button>
                </div>
                {{Form::close()}}
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

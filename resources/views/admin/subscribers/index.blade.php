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
                    <h3 class="box-title">List Subscriber</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        @include('admin.errors')
                        <a href="{{route('subscribers.create')}}" class="btn btn-success">Add Subscriber</a>
                        {{csrf_field()}}
                       
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Action</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subscribers as $subscriber)
                        <tr>

                                <td>{{$subscriber->id}}</td>
                                <td>{{$subscriber->email}}</td>
                                <td><a href="" class="fa fa-pencil"></a>
                                    {{Form::open(['route'=>['subscribers.destroy', $subscriber->id], 'method'=>'delete'])}}
                                    <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                        <i class="fa fa-remove"></i>
                                    </button>

                                {{Form::close()}}
                            

                        </tr>

                        @endforeach
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

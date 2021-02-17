@extends('admin.layout')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            
        </section>

        <!-- Main content -->
        <section class="content">
            {{Form::open(['route'=> 'posts.store', 'files' => true])}}
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Post</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control"  name="title" value="{{old('title')}}" id="exampleInputEmail1" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Photo</label>
                            <input type="file" name="image" id="exampleInputFile">

                            <p class="help-block">image format..</p>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            {{Form::select('category_id',
                            $categories,
                            null,
                            ['class' => 'form-control select2']
                            )}}

                        </div>
                        <div class="form-group">
                            <label>Тag</label>
                            {{Form::select('tags[]',
                            $tags,
                            null,
                            ['class' => 'form-control select2','data-placeholder' => 'Select tag', 'multiple' => 'multiple']
                            )}}

                        </div>
                        <!-- Date -->
                        <div class="form-group">
                            <label>Tanggal:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="date" value="{{old('date')}}" class="form-control pull-right" id="datepicker">
                            </div>
                            <!-- /.input group -->
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="is_featured" class="minimal">
                            </label>
                            <label>
                                Is featured?
                            </label>
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="status" class="minimal">
                            </label>
                            <label>
                                Is draft?
                            </label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description Content</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                   
                    <div class="col-md-12">
                        <div align="center"><h3>SEO</h3></div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description for search engines</label>
                            <textarea name="description" id="" cols="30" rows="10" maxlength="160" placeholder="" class="form-control">{{old('description')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Keywords</label>
                            <textarea name="keywords" id="" cols="30" rows="30"  class="form-control">{{old('description')}}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    
                    <button class="btn btn-success pull-right">save</button>
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

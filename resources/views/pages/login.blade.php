@extends('layout')

@section('content')
    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="leave-comment mr0"><!--leave comment-->
                        @include('pages.alerts_message')
                        <h3 class="text-uppercase">Login</h3>
                        @include('admin.errors')
                        <br>
                        <form class="form-horizontal contact-form" role="form" method="post" action="login">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}"
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="password">
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn send-btn">Login</button>
                            <a href="{{ url('auth/google') }}"><button type="button" style="background:#4285f4; color:white; border:none; width:110px; height:40px; border-radius:3%;"><img src="https://www.iconfinder.com/data/icons/social-media-2210/24/Google-512.png" style="width:30px; background:white; border-radius:50%;" alt=""><b style="top: -10px; left: 5px; position: relative">Google</b></button></a>
                        </form>
                    </div><!--end leave comment-->
                </div>
                @include('pages._sidebar')
            </div>
        </div>
    </div>
    <!-- end main content-->
@endsection

@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Form elements </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Admin Details</h4>
                        @include('message')
                        
                        <form class="forms-sample" action="" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputUsername1">Username</label>
                                <input type="text" value="{{old('name')}}" style="color:white" class="form-control" name="name"" id="exampleInputUsername1"
                                    placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" value="{{old('email')}}" style="color:white" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                                <p class="text-danger">{{$errors->first('email')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" value="{{old('password')}}" style="color:white" class="form-control" name="password" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            
                            
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-dark"><a href="{{url('admin/admin/list')}}" class="nav-link">Cancel</a></button>
                        </form>
                    </div>
                </div>
            </div>
            
            
            
            
        </div>
    </div>
@endsection

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
                        <h4 class="card-title">Student Details</h4>
                        @include('message')

                        <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">First Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" value="{{ old('name') }}" style="color:white"
                                            class="form-control" name="name" required id="exampleInputUsername1"
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Last Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" required value="{{ old('last_name') }}" style="color:white"
                                            class="form-control" name="last_name" id="exampleInputUsername1"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Admission Number <span
                                                class="text-danger">*</span> </label>
                                        <input type="text" value="{{ old('admission_number') }}" style="color:white"
                                            class="form-control" name="admission_number" required id="exampleInputUsername1"
                                            placeholder="Admission number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Roll Number <span
                                                class="text-danger">*</span></label>
                                        <input type="text" required value="{{ old('roll_number') }}" style="color:white"
                                            class="form-control" name="roll_number" id="exampleInputUsername1"
                                            placeholder="Roll Number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Class <span class="text-danger">*</span> </label>
                                        <select name="class_id" required style="color:white" class="form-control"
                                            id="exampleInputUsername1">
                                            <option value="0" class="form-control">Select class</option>
                                            @foreach($getClass as $value)
                                            <option value="{{$value->id}}" class="form-control">{{$value->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Gender <span class="text-danger">*</span>
                                        </label>
                                        <select name="gender" required style="color:white" class="form-control"
                                            id="exampleInputUsername1">
                                            <option value="0" class="form-control">Select gender</option>
                                            <option value="male" class="form-control">Male</option>
                                            <option value="female" class="form-control">Female</option>
                                            <option value="other" class="form-control">Other</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">DOB <span class="text-danger">*</span> </label>
                                        <input type="date" value="{{ old('date_of_birth') }}" style="color:white"
                                            class="form-control" name="date_of_birth" required id="exampleInputUsername1"
                                            placeholder="Date Of Birth">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Caste <span
                                                class="text-danger">*</span></label>
                                        <input type="text" required value="{{ old('caste') }}" style="color:white"
                                            class="form-control" name="caste" id="exampleInputUsername1"
                                            placeholder="Caste">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Religion <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" value="{{ old('religion') }}" style="color:white"
                                            class="form-control" name="religion" required id="exampleInputUsername1"
                                            placeholder="Religion">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <input type="text" required value="{{ old('mobile_number') }}"
                                            style="color:white" class="form-control" name="mobile_number"
                                            id="exampleInputUsername1" placeholder="Mobile Number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Admission Date <span
                                                class="text-danger">*</span> </label>
                                        <input type="date" value="{{ old('admission_date') }}" style="color:white"
                                            class="form-control" name="admission_date" required
                                            id="exampleInputUsername1" placeholder="Admission Date">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Status</label>
                                        <select name="status" style="color:white" class="form-control"
                                            id="exampleInputUsername1">
                                            <option value="0" class="form-control">Active</option>
                                            <option value="1" class="form-control">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Profile Pic<span class="text-danger">*</span>
                                        </label>
                                        <input type="file" value="{{ old('profile_pic') }}" style="color:white"
                                            class="form-control" name="profile_pic" required id="exampleInputUsername1"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Blood Group <span
                                                class="text-danger">*</span></label>
                                        <input type="text" required value="{{ old('blood_group') }}"
                                            style="color:white" class="form-control" name="blood_group"
                                            id="exampleInputUsername1" placeholder="Blood Group">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Height <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" value="{{ old('height') }}" style="color:white"
                                            class="form-control" name="height" required id="exampleInputUsername1"
                                            placeholder="Student Height">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Weight <span
                                                class="text-danger">*</span></label>
                                        <input type="number" required value="{{ old('weight') }}" style="color:white"
                                            class="form-control" name="weight" id="exampleInputUsername1"
                                            placeholder="Student Weight">
                                    </div>
                                </div>
                            </div>
                            <hr>

                            

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" value="{{ old('email') }}" style="color:white"
                                    class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" value="{{ old('password') }}" style="color:white"
                                    class="form-control" name="password" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>


                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-dark"><a href="{{ url('admin/admin/list') }}"
                                    class="nav-link">Cancel</a></button>
                        </form>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection

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
                        <h4 class="card-title">Assigned Subject Details</h4>
                        @include('message')

                        <form class="forms-sample" action="" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleInputUsername1">ClassName</label>
                                <select name="class_id" style="color:white" class="form-control" id="exampleInputUsername1">
                                    <option value="" class="form-control">Select class</option>
                                    @foreach ($getClass as $class)
                                        <option {{ $getRecord->class_id == $class->id ? 'selected' : '' }}
                                            value="{{ $class->id }}" class="form-control">{{ $class->name }}</option>
                                    @endforeach
                                    <option value="1" class="form-control">Inactive</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputUsername1">Subjectname</label>
                                <select name="subject_id" style="color:white" class="form-control" id="exampleInputUsername1">
                                    <option value="" class="form-control">Select class</option>
                                    @foreach ($getSubject as $subject)
                                        <option {{ $getRecord->subject_id == $subject->id ? 'selected' : '' }}
                                            value="{{ $subject->id }}" class="form-control">{{ $subject->name }}</option>
                                    @endforeach
                                    <option value="1" class="form-control">Inactive</option>
                                </select>
                            </div>

                            
                            <div class="form-group">
                                <label for="exampleInputUsername1">Status</label>
                                <select name="status" style="color:white" class="form-control" id="exampleInputUsername1">
                                    <option {{ $getRecord->status == 0 ? 'selected' : '' }} value="0"
                                        class="form-control">Active</option>
                                    <option {{ $getRecord->status == 1 ? 'selected' : '' }} value="1"
                                        class="form-control">Inactive</option>
                                </select>
                            </div>



                            <button type="submit" class="btn btn-primary me-2">Update</button>
                            <button class="btn btn-dark"><a href="{{ url('admin/assign_subject/list') }}"
                                    class="nav-link">Cancel</a></button>
                        </form>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection

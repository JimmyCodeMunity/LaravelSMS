@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Basic Tables </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <form action="" method="get">
                <div class="row">

                    <div class="col-md-3">
                        <ul class="navbar-nav w-100">
                            <li class="nav-item w-100">
                                <div class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                    <input type="text" name="class_name" class="form-control"
                                        value="{{ Request::get('class_name') }}" placeholder="Search classname">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="navbar-nav w-100">
                            <li class="nav-item w-100">
                                <div class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                    <input type="text" name="subject_name" class="form-control"
                                        value="{{ Request::get('subject_name') }}" placeholder="Search subject name">
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <ul class="navbar-nav w-100">
                            <li class="nav-item w-100">
                                <div class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                    <input type="date" name="date" class="form-control"
                                        value="{{ Request::get('date') }}" placeholder="Search date">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="navbar-nav w-100">
                            <li class="nav-item w-100">
                                <div class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                    <button type="submit" class="btn btn-primary btn-md">Search</button>
                                    <a href="{{ url('admin/assign_subject/list') }}"
                                        class="btn btn-info mx-3 btn-md">Clear</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </form>



            @include('message')


            <div class="col-lg-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">Classes</h4>
                        <div class="col-sm-2">
                            <a class="nav-link btn btn-success create-new-button text-black"
                                href="{{ url('admin/assign_subject/add') }}">+ Assign new Class</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> Subject </th>
                                        <th> ClassName </th>
                                        <th> Created_by </th>
                                        <th> Created_date </th>
                                        <th>Status</th>
                                        <th> Actions </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>



                                            <td style="color:white;"> {{ $value->subjectname }} </td>
                                            <td style="color:white;"> {{ $value->classname }} </td>
                                            <td style="color:white;"> {{ $value->username }} </td>
                                            <td style="color:white;">
                                                {{ date('d-m-Y H:i A', strtotime($value->created_at)) }} </td>
                                            @if ($value->status == 1)
                                                <td style="color:white;"> Inactive </td>
                                            @else
                                                <td style="color:white;"> active </td>
                                            @endif


                                            <td style="color:white;">
                                                <a href="{{ url('admin/assign_subject/edit', $value->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ url('admin/assign_subject/edit_single', $value->id) }}"
                                                    class="btn btn-primary">Edit Single</a>
                                                <a href="{{ url('admin/assign_subject/delete', $value->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="bg-red" style="float:right;padding:10px;">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

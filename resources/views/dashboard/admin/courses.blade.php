@extends('dashboard/admin/home')
@section('content')
<div class="container courses mt-0 ml-5">
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3>COURSES</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm border table-hover">
                        <thead>
                        
                            <tr>
                                <th>Courses Name</th>
                                <th>Courses Price</th>
                                <th>Courses Description</th>
                                <th>
                                    Instructor name
                                </th>
                                
                            </tr>
                        </thead>
                        @foreach($courses as $course)
                        <tbody>
                        <tr>
                        <td>
                            {{$course->cname}}
                        </td>
                        <td>{{$course->cprice}}</td>
                        <td>{{$course->description}}</td>
                        <td>{{$course->instructor_name}}</td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </main>
</div>
@endsection
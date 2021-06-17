@extends('dashboard/admin/home')
@section('content')
<div class="container users mt-0 ml-5">
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
                    <h1 class="h2">Users</h1>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        
                            <tr>
                                <th>User Name</th>
                                <th>User Email</th>
                                
                                
                            </tr>
                        </thead>
                        @foreach($users as $user)
                        <tbody>
                        <tr>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>{{$user->email}}</td>
                        
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </main>
</div>
@endsection
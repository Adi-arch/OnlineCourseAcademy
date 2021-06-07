@extends('layouts.app')
@section('content')
    


    <div id="wrapper">
        {{-- <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><span>Skills university</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a><a class="nav-link" href="#"><i class="fas fa-table"></i><span>Create Course</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav> --}}
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <h3><br>Skills University Course Creation<br><br></h3>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" action="&quot;/videos&quot;" method="post" enctype="multipart/form-data">
                            <div class="input-group"></div>
                        </form>
                    </div>
                </nav>
                <form><label class="form-label">Course Title</label><input class="form-control" type="text"><label class="form-label">Course Description</label><input class="form-control" type="text"></form>
                <div class="files color form-group mb-3"><label class="form-label">Tutorial uploader</label><input type="file" multiple="" name="files"></div><button class="btn btn-primary" type="button">Upload</button>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    

@endsection
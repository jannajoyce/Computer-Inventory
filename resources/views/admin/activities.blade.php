<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Activities</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/ionicons.min.css')}}">
</head>

<body id="page-top">
<div id="wrapper">
    <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark" style="background: rgb(133, 135, 150);">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#"><img src="{{ asset('img/Group 3.png') }}" style="width: 150px;">
                <div class="sidebar-brand-icon rotate-n-15"></div>
                <div class="sidebar-brand-text mx-3"></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}" style="padding-top: 16px;"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.inventories') }}"><i class="fas fa-table"></i><span>Inventories</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.users') }}"><i class="fas fa-tachometer-alt"></i><span>Users</span></a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('admin.activities') }}"><i class="fas fa-table"></i><span>Activities</span></a></li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('admin.logout') }}" id="logout-form">
                        @csrf
                        <a class="nav-link" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon ion-log-out"></i><span>Logout</span>
                        </a>
                    </form>
            </ul>
            <div class="text-center d-none d-md-inline"></div>
        </div>
    </nav>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold" style="color: rgb(133, 135, 150);"><span style="color: rgb(133, 135, 150);">Activities</span></p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                </div>
                            </div>
                            <div class="container">
                                <ul class="list-group">
                                    @forelse ($activities as $activity)
                                        <li class="list-group-item">
                                            <strong>{{ $activity->created_at->diffForHumans() }}:</strong>
                                            {{ $activity->user->name }} - {{ $activity->description }}
                                        </li>
                                    @empty
                                        <li class="list-group-item">No activities found.</li>
                                    @endforelse
                                </ul>
                            </div>

                                {{--                                {{ $items->links() }}--}}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#" style="color: navy;"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active" style="opacity: 1;"><a class="page-link" href="#" style="color: white; background: navy; ">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#" style="color: navy;">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#" style="color: navy;">3</a></li>
                                            <li class="page-item"><a class="page-link" aria-label="Next" href="#" style="color: navy;"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © LogWeb 2024</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bs-init.js')}}"></script>
    <script src="{{asset('js/theme.js')}}"></script>
</div>
</body>


</html>

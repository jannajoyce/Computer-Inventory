<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Users Management</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/ionicons.min.css')}}">
</head>

<div id="page-top">
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
                <li class="nav-item"><a class="nav-link active" href="{{ route('admin.users') }}"><i class="fas fa-tachometer-alt"></i><span>Users</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.activities') }}"><i class="fas fa-table"></i><span>Activities</span></a></li>
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
    <div class="position-relative d-flex flex-column" id="content-wrapper" style="background-image: url('{{ asset('img/BRP-Jose-Rizal-HHI.jpg') }}'); background-size: cover; background-position: center;">
                <div class="container-fluid" style="padding-top: 60px;">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold" style="color: rgb(133, 135, 150);"><span style="color: rgb(133, 135, 150);">List of Users</span></p>
                        </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <form method="GET" action="{{ route('adminUsers.dropdown') }}" class="d-inline-block">
                                        <label class="form-label">Show&nbsp;
                                            <select name="per_page" onchange="this.form.submit()" class="form-select form-select-sm d-inline-block">
                                                <option value="3" {{ request('per_page') == 3 ? 'selected' : '' }}>3</option>
                                                <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                                                <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                                                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                                            </select>&nbsp;
                                        </label>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" style="margin-right: 0px;margin-left: 0px;padding-right: 0px;" method="GET" action="{{ route('adminUsers.search') }}">
                                            <div class="input-group" style="width: 300px;">
                                                <input class="form-control" type="search" name="query" placeholder="Search for...">
                                                <button class="btn btn-primary py-0" type="submit" style="background: rgb(133, 135, 150); border: rgb(133, 135, 150); "><i class="fas fa-search"></i></button>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                                @csrf
                                @if(session()->has('success'))
                                    <div class="alert alert-success mb-3" style="padding-top: 4px;padding-bottom: 4px; color: white; background: navy;" >
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <table class="table my-0" id="dataTable">
                                        <thead>
                                        <tr>
                                            <th style="width: 50px;">NO.</th>
                                            <th style="width: 200px;">USER</th>
                                            <th style="width: 200px;">E-MAIL</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>
                                                    <button
                                                        type="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#userItemsModal-{{ $user->id }}"
                                                        style="width: 100%; background: none; border: none; text-align: left; padding: 0; cursor: pointer;">
                                                        {{ $user->name }}
                                                    </button>
                                                    @include('admin.user_itemsModal', ['user' => $user, 'items' => $user->user_items])
                                                </td>
                                                <td>{{ $user->email }}</td>
                                        @endforeach
                                        </tr>
                                        </tbody>
                                    </table>

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

        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
</div>
</div>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bs-init.js')}}"></script>
    <script src="{{asset('js/theme.js')}}"></script>

</html>

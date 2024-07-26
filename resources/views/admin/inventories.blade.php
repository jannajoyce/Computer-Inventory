<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Inventories Management</title>
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
                <li class="nav-item"><a class="nav-link" href='/analytics' style="padding-top: 16px;"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                <li class="nav-item"><a class="nav-link active" href='/users'><i class="fas fa-tachometer-alt"></i><span>Users</span></a></li>
                <li class="nav-item"><a class="nav-link active" href='/inventories'><i class="fas fa-table"></i><span>Inventories</span></a></li>
                <li class="nav-item"><a class="nav-link active" href='/activities'><i class="fas fa-table"></i><span>Activities</span></a></li>
                <li class="nav-item"><a class="nav-link" href='/logout'><i class="icon ion-log-out"></i><span>Logout</span></a></li>
            </ul>
            <div class="text-center d-none d-md-inline"></div>
        </div>
    </nav>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light">
                <div class="container-fluid">
                    <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" style="margin-right: 0px;margin-left: 0px;padding-right: 0px;">
                        <div class="input-group" style="width: 300px;"><a class="btn btn-primary" role="button" style="background: rgb(0, 0, 128); border: rgb(0, 0, 128);" href="{{route('item.create')}}">ADD NEW ITEM</a></div>
                    </form>
                    <div class="input-group" style="width: 300px;"><button class="btn btn-primary" type="button" style="background: rgb(0, 0, 128); border: rgb(0, 0, 128); margin-right: 0px;margin-left: 200px;"><i class="far fa-arrow-alt-circle-down"></i>&nbsp; PRINT</button></div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold" style="color: rgb(133, 135, 150);"><span style="color: rgb(133, 135, 150);">Computer Inventories</span></p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                                <form method="GET" action="{{ route('dropdown') }}" class="d-inline-block">
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
                                    <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" style="margin-right: 0px;margin-left: 0px;padding-right: 0px;" method="GET" action="{{ route('search') }}">
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
                                        <th style="width: 200px;">ARTICLE/ITEM</th>
                                        <th style="width: 220px;">DESCRIPTION/BRAND</th>
                                        <th style="width: 220px;">PROPERTY NUMBER</th>
                                        <th style="width: 150px;">UNIT</th>
                                        <th style="width: 150px;">UNIT VALUE</th>
                                        <th style="width: 150px;">QUANTITY</th>
                                        <th style="width: 250px;">LOCATION</th>
                                        <th style="width: 150PX;">CONDITION</th>
                                        <th style="width: 150PX;">REMARKS</th>
                                        <th style="width: 200PX;">P.O. NUMBER</th>
                                        <th style="width: 300PX;">DEALER</th>
                                        <th style="width: 200PX;">DATE ACQUIRED</th>
                                        <th style="width: 150px;">ACTIONS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->brand }}</td>
                                            <td>{{ $item->property_number }}</td>
                                            <td>{{ $item->unit }}</td>
                                            <td>{{ $item->unit_value }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->location }}</td>
                                            <td>{{ $item->condition }}</td>
                                            <td>{{ $item->remarks }}</td>
                                            <td>{{ $item->po_number }}</td>
                                            <td>{{ $item->dealer }}</td>
                                            <td>{{ $item->date_acquired }}</td>
                                            <td>
                                                <a href="{{ route('item.edit', $item->id) }}" class="btn btn-primary btn-sm" style="background: rgb(0, 0, 128); border: rgb(135, 135, 150);">Edit</a>
                                                <form action="{{ route('item.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="background: rgb(135, 135, 150); border: rgb(135, 135, 150);"  onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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

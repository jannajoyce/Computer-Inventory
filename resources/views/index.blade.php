<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Inventories</title>
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
                <li class="nav-item"><a class="nav-link" href="{{ route('analytics.user') }}" style="padding-top: 16px;"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('dashboard') }}"><i class="fas fa-table"></i><span>Inventories</span></a></li>
                <!-- Updated Logout Link with Form -->
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon ion-log-out"></i><span>Logout</span>
                        </a>
                    </form>
                </li>
            </ul>
            <div class="text-center d-none d-md-inline"></div>
        </div>
    </nav>

    <div class="d-flex flex-column" id="content-wrapper" style="background-image: url('{{ asset('img/wp4213758.jpg') }}'); background-size: cover; background-position: center;">
        <div id="content">
            <div class="d-flex flex-row" style="padding: 20px;">
                <div class="p-2" style="width: 300px;">
                    <a class="btn btn-primary" role="button" style="background: rgb(0, 0, 128); border: rgb(0, 0, 128);" href="{{ route('item.create') }}">ADD NEW ITEM</a>
                </div>
                <div class="p-2 ms-auto" style="width: 300px; margin-right: -205px;">
                    <button class="btn btn-primary" type="button" onclick="window.open('{{ route('printInventory.index') }}', '_blank', 'width=800,height=600');" style="background: rgb(0, 0, 128); border: rgb(0, 0, 128);"><i class="far fa-arrow-alt-circle-down"></i>&nbsp; PRINT</button>
                </div>
            </div>



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
                                <div class="alert alert-success mb-3" style="padding-top: 4px; padding-bottom: 4px; color: white; background: navy;">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                           {{-- <form method="POST" action="{{ route('items.bulkDelete') }}" id="bulk-delete-form">
                                @csrf
                                @method('DELETE') --}}
                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <table class="table my-0" id="dataTable">
                                        <thead>
                                        <tr>
                                         {{--   <th><input type="checkbox" id="select-all"></th> --}}
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
                                            <th style="width: 250PX;">MODE OF PROCUREMENT</th>
                                            <th style="width: 200PX;">DATE ACQUIRED</th>
                                            <th style="width: 200PX;">DATE ISSUED</th>
                                           {{-- <th style="width: 150px;">ACTIONS</th> --}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                               {{-- <td><input type="checkbox" name="ids[]" value="{{ $item->id }}"></td> --}}
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
                                                <td>{{ $item->mode_of_procurement }}</td>
                                                <td>{{ $item->date_acquired }}</td>
                                                <td>{{ $item->date_issued }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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

        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bs-init.js')}}"></script>
    <script src="{{asset('js/theme.js')}}"></script>
</body>

</html>

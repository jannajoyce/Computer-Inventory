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
    <style>
        #print-button {
            position: absolute;
            top: 16px; /* Adjust top margin as needed */
            right: 20px; /* Adjust left margin as needed */
            z-index: 1000; /* Ensure it stays on top of other content */
        }
    </style>
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
                <li class="nav-item"><a class="nav-link active" href="{{ route('admin.inventories') }}"><i class="fas fa-table"></i><span>Inventories</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.users') }}"><i class="fas fa-tachometer-alt"></i><span>Users</span></a></li>
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
    <div class="position-relative d-flex flex-column" id="content-wrapper" style="background-image: url('{{ asset('img/5fa4da31b6c3a4385dfd4000_Philippine-navy-ships.jpeg') }}'); background-size: cover; background-position: center;">
        <div id="print-button">
            <button class="btn btn-primary" type="button" onclick="window.open('{{ route('adminInventories.print', ['accountname_with_accountcode' => request('accountname_with_accountcode')]) }}', '_blank', 'width=800,height=600');" style="background: rgb(0, 0, 128); border: rgb(0, 0, 128);"><i class="far fa-arrow-alt-circle-down"></i>&nbsp; PRINT</button>
        </div>
            <div class="container-fluid" style="padding-top: 60px;">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold" style="color: rgb(133, 135, 150);"><span style="color: rgb(133, 135, 150);">Computer Inventories</span></p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                                <form method="GET" action="{{ route('adminInventories.dropdown') }}" >
                                    <label class="form-label">Show&nbsp
                                        <select name="accountname_with_accountcode" onchange="this.form.submit()" class="form-select form-select-sm d-inline-block">
                                            <option value="">All</option>
                                            <option value="ICT/1-06-05-030" {{ request('accountname_with_accountcode') == 'ICT/1-06-05-030' ? 'selected' : '' }}>ICT/1-06-05-030</option>
                                            <option value="Comms/1-06-05-070" {{ request('accountname_with_accountcode') == 'Comms/1-06-05-070' ? 'selected' : '' }}>Comms/1-06-05-070</option>
                                            <option value="Office Equipment/1-06-05-020" {{ request('accountname_with_accountcode') == 'Office Equipment/1-06-05-020' ? 'selected' : '' }}>Office Equipment/1-06-05-020</option>
                                            <option value="Machinery/1-06-05-010" {{ request('accountname_with_accountcode') == 'Machinery/1-06-05-010' ? 'selected' : '' }}>Machinery/1-06-05-010</option>
                                            <option value="Other Structures/1-06-04-990" {{ request('accountname_with_accountcode') == 'Other Structures/1-06-04-990' ? 'selected' : '' }}>Other Structures/1-06-04-990</option>
                                            <option value="BLDG/1-06-04-010" {{ request('accountname_with_accountcode') == 'BLDG/1-06-04-010' ? 'selected' : '' }}>BLDG/1-06-04-010</option>
                                            <option value="Comms Network/1-06-03-060" {{ request('accountname_with_accountcode') == 'Comms Network/1-06-03-060' ? 'selected' : '' }}>Comms Network/1-06-03-060</option>
                                            <option value="Power Supply System/1-06-03-050" {{ request('accountname_with_accountcode') == 'Power Supply System/1-06-03-050' ? 'selected' : '' }}>Power Supply System/1-06-03-050</option>
                                            <option value="Construction and Heavy Equipment/1-06-05-080" {{ request('accountname_with_accountcode') == 'Construction and Heavy Equipment/1-06-05-080' ? 'selected' : '' }}>Construction and Heavy Equipment/1-06-05-080</option>
                                            <option value="Firearms(Regular)/1-06-05-100" {{ request('accountname_with_accountcode') == 'Firearms(Regular)/1-06-05-100' ? 'selected' : '' }}>Firearms(Regular)/1-06-05-100</option>
                                            <option value="Firearms(Modernization)/1-06-05-100" {{ request('accountname_with_accountcode') == 'Firearms(Modernization)/1-06-05-100' ? 'selected' : '' }}>Firearms(Modernization)/1-06-05-100</option>
                                            <option value="Technical & Scientific Equipment/1-06-05-140" {{ request('accountname_with_accountcode') == 'Technical & Scientific Equipment/1-06-05-140' ? 'selected' : '' }}>Technical & Scientific Equipment/1-06-05-140</option>
                                            <option value="Vehicles/1-06-06-010" {{ request('accountname_with_accountcode') == 'Vehicles/1-06-06-010' ? 'selected' : '' }}>Vehicles/1-06-06-010</option>
                                            <option value="Vehicles(Modernization)/1-06-06-010" {{ request('accountname_with_accountcode') == 'Vehicles(Modernization)/1-06-06-010' ? 'selected' : '' }}>Vehicles(Modernization)/1-06-06-010</option>
                                            <option value="Furniture/1-06-07-010" {{ request('accountname_with_accountcode') == 'Furniture/1-06-07-010' ? 'selected' : '' }}>Furniture/1-06-07-010</option>
                                            <option value="Other property plant & equipment/1-06-99-990" {{ request('accountname_with_accountcode') == 'Other property plant & equipment/1-06-99-990' ? 'selected' : '' }}>Other property plant & equipment/1-06-99-990</option>
                                            <option value="Computer Software/1-08-01-020" {{ request('accountname_with_accountcode') == 'Computer Software/1-08-01-020' ? 'selected' : '' }}>Computer Software/1-08-01-020</option>
                                        </select>&nbsp
                                    </label>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                    <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" style="margin-right: 0px;margin-left: 0px;padding-right: 0px;" method="GET" action="{{ route('adminInventories.search') }}">
                                        <div class="input-group" style="width: 300px;">
                                            <input class="form-control" type="search" name="query" placeholder="Search for..." value="{{ request('query', '') }}">
                                            <button class="btn btn-primary py-0" type="submit" style="background: rgb(133, 135, 150); border: rgb(133, 135, 150); "><i class="fas fa-search"></i></button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            @csrf
                            @if($items->isEmpty())
                                <p>No items found.</p>
                            @else
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
                                        <th style="width: 250PX;">MODE OF PROCUREMENT</th>
                                        <th style="width: 400PX;">ACCOUNT NAME W/ ACCOUNT CODE</th>
                                        <th style="width: 200PX;">DATE ACQUIRED</th>
                                        <th style="width: 200PX;">DATE ISSUED</th>
                                        <th style="width: 250px;">ACTIONS</th>
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
                                            <td>{{ $item->mode_of_procurement }}</td>
                                            <td>{{ $item->accountname_with_accountcode }}</td>
                                            <td>{{ $item->date_acquired }}</td>
                                            <td>{{ $item->date_issued }}</td>
                                            <td>
                                                <a href="{{ route('admin.edit', $item->id) }}" class="btn btn-primary btn-sm" style="background: rgb(0, 0, 128); border: rgb(135, 135, 150);">Edit</a>
                                                <form action="{{ route('admin.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="background: rgb(135, 135, 150); border: rgb(135, 135, 150);" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                 @endif
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
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bs-init.js')}}"></script>
    <script src="{{asset('js/theme.js')}}"></script>
</div>
</body>


</html>

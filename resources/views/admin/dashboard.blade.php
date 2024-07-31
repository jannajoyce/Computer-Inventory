<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/ionicons.min.css') }}">
</head>

<body id="page-top">
<div id="wrapper">
    <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark" style="background: rgb(133, 135, 150);">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <img src="{{ asset('img/Group%203.png') }}" style="width: 150px;">
                <div class="sidebar-brand-icon rotate-n-15"></div>
                <div class="sidebar-brand-text mx-3"></div>
            </a>

            <hr class="sidebar-divider my-0">
            <ul class="navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item"><a class="nav-link active" href='admin/dashboard'><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                <li class="nav-item"><a class="nav-link" href='admin/users'><i class="fas fa-tachometer-alt"></i><span>Users</span></a></li>
                <li class="nav-item"><a class="nav-link" href='admin/inventories'><i class="fas fa-table"></i><span>Inventories</span></a></li>
                <li class="nav-item"><a class="nav-link" href='admin/activities'><i class="fas fa-table"></i><span>Activities</span></a></li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('admin.logout') }}" id="logout-form">
                        @csrf
                        <a class="nav-link" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon ion-log-out"></i><span>Logout</span>
                        </a>
                    </form>
                </li>            </ul>
            <div class="text-center d-none d-md-inline"></div>
        </div>
    </nav>

    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4" style="margin-top: 32px;">
                    <h3 class="text-dark mb-0" style="color: rgb(133, 135, 150);"><span style="color: rgb(133, 135, 150);">Dashboard</span></h3>
                    <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#" style="color: rgb(255, 255, 255);background: rgb(0, 0, 128);"><i class="fas fa-download fa-sm text-white-50" style="color: rgb(133, 135, 150);"></i>&nbsp;Generate Report</a>
                </div>

                <div class="col-md-6 col-xl-3 mb-4" style="width: 315px">
                    <div class="card shadow border-start-success py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col-xxl-11 me-2" style="width: 310px;">
                                    <div class="text-uppercase text-success fw-bold text-xs mb-1"><span style="color: rgb(0, 0, 128);">TOTAL USERS</span></div>
                                    <div class="text-dark fw-bold h5 mb-0"><span><span style="color: rgb(133, 135, 150);">{{ number_format($totalUsers) }}</span></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4" style="width: 315px">
                        <div class="card shadow border-start-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-xxl-11 me-2" style="width: 315px;">
                                        <div class="text-uppercase text-success fw-bold text-xs mb-1"><span style="color: rgb(0, 0, 128);">RECENT ITEM ADDITIONS (Today)</span></div>
                                        <div class="text-dark fw-bold h5 mb-0"><span><span style="color: rgb(133, 135, 150);">{{ $itemsAddedToday }}</span></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3 mb-4" style="width: 315px">
                        <div class="card shadow border-start-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-xxl-11 me-2" style="width:315px;">
                                        <div class="text-uppercase text-success fw-bold text-xs mb-1"><span style="color: rgb(0, 0, 128);">TOTAL QUANTITY OF ITEMS</span></div>
                                        <div class="text-dark fw-bold h5 mb-0"><span><span style="color: rgb(133, 135, 150);">{{ $totalQuantityItems }}</span></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3 mb-4" style="width: 315px">
                        <div class="card shadow border-start-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-xxl-11 me-2" style="width: 315px;">
                                        <div class="text-uppercase text-success fw-bold text-xs mb-1"><span style="color: rgb(0, 0, 128);">TOTAL QUANTITY OF OPERATING ITEMS</span></div>
                                        <div class="text-dark fw-bold h5 mb-0"><span><span style="color: rgb(133, 135, 150);">{{ $operatingItems }}</span></span></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3 mb-4" style="width: 315px">
                        <div class="card shadow border-start-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-xxl-11 me-2" style="width: 315px;">
                                        <div class="text-uppercase text-success fw-bold text-xs mb-1"><span style="color: rgb(0, 0, 128);">TOTAL QUANTITY OF NOT OPERATING ITEMS</span></div>
                                        <div class="text-dark fw-bold h5 mb-0"><span><span style="color: rgb(133, 135, 150);">{{ $notOperatingItems }}</span></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Items by Category Distribution -->
                    <div class="row">
                        <div class="col-lg-7 col-xl-8" style="width: 1800px;">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0" style="color: rgb(0, 0, 128);">
                                        <span style="color: rgb(0, 0, 128);">Items by Category Distribution</span>
                                    </h6>
                                    <div class="dropdown no-arrow">
                                        <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">
                                            <i class="fas fa-ellipsis-v text-gray-400"></i>
                                        </button>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">Dropdown header:</p>
                                            <a class="dropdown-item" href="#">&nbsp;Action</a>
                                            <a class="dropdown-item" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <div class="row">
                                            <div class="col-md-6 text-nowrap">
                                                <form method="GET" action="{{ route('admin.dropdown') }}" class="d-inline-block">
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
                                                    <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" style="margin-right: 0px;margin-left: 0px;padding-right: 0px;" method="GET" action="{{ route('admin.search') }}">
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
                                                        <th style="width: 200px;">USER</th>

                                                        <th style="width: 150px;">ACTIONS</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach ($users as $user)
                                                        <tr>
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
                                                            {{--                                                            <td>--}}
                                                            {{--                                                                <a href="{{ route('item.edit', $item->id) }}" class="btn btn-primary btn-sm" style="background: rgb(0, 0, 128); border: rgb(135, 135, 150);">Edit</a>--}}
                                                            {{--                                                                <form action="{{ route('item.destroy', $item->id) }}" method="POST" style="display:inline-block;">--}}
                                                            {{--                                                                    @csrf--}}
                                                            {{--                                                                    @method('DELETE')--}}
                                                            {{--                                                                    <button type="submit" class="btn btn-danger btn-sm" style="background: rgb(135, 135, 150); border: rgb(135, 135, 150);"  onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>--}}
                                                            {{--                                                                </form>--}}
                                                            {{--                                                            </td>--}}
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
                        </div>
                    </div>
                    <!-- Chart.js Script -->
               <!--     <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var ctx = document.getElementById('categoryChart').getContext('2d');
                            var categoryChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ,
                                    datasets: [{
                                        backgroundColor: "rgba(0, 0, 128)", // Navy blue with some transparency
                                        borderColor: "rgba(0, 0, 128)", // Navy blue
                                        data:
                                    }]
                                },
                                options: {
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            display: false
                                        }
                                    },
                                    scales: {
                                        x: {
                                            grid: {
                                                color: "rgb(234, 236, 244)",
                                                zeroLineColor: "rgb(234, 236, 244)",
                                                drawBorder: false,
                                                drawTicks: false,
                                                borderDash: ["2"],
                                                zeroLineBorderDash: ["2"],
                                                drawOnChartArea: false
                                            },
                                            ticks: {
                                                color: "#858796",
                                                font: {
                                                    style: "normal"
                                                },
                                                padding: 20
                                            }
                                        },
                                        y: {
                                            grid: {
                                                color: "rgb(234, 236, 244)",
                                                zeroLineColor: "rgb(234, 236, 244)",
                                                drawBorder: false,
                                                drawTicks: false,
                                                borderDash: ["2"],
                                                zeroLineBorderDash: ["2"]
                                            },
                                            ticks: {
                                                beginAtZero: true,
                                                color: "#858796",
                                                font: {
                                                    style: "normal"
                                                },
                                                padding: 20
                                            }
                                        }
                                    }
                                }
                            });
                        });
                    </script> -->
                </div>
            </div>
            <!-- Items by Location Distribution -->
            <div class="row">
                <div class="col-lg-7 col-xl-8" style="width: 1800px;">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary fw-bold m-0" style="color: rgb(0, 0, 128);">
                                <span style="color: rgb(0, 0, 128);">Items by Location Distribution</span>
                            </h6>
                            <div class="dropdown no-arrow">
                                <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">
                                    <i class="fas fa-ellipsis-v text-gray-400"></i>
                                </button>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                    <p class="text-center dropdown-header">Dropdown header:</p>
                                    <a class="dropdown-item" href="#">&nbsp;Action</a>
                                    <a class="dropdown-item" href="#">&nbsp;Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="locationChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var ctx = document.getElementById('locationChart').getContext('2d');
                    var locationChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels:
                            datasets: [{
                                backgroundColor: "rgba(0, 0, 128)",
                                borderColor: "rgba(0, 0, 128)",
                                data:
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            },
                            scales: {
                                x: {
                                    grid: {
                                        color: "rgb(234, 236, 244)",
                                        zeroLineColor: "rgb(234, 236, 244)",
                                        drawBorder: false,
                                        drawTicks: false,
                                        borderDash: ["2"],
                                        zeroLineBorderDash: ["2"],
                                        drawOnChartArea: false
                                    },
                                    ticks: {
                                        color: "#858796",
                                        font: {
                                            style: "normal"
                                        },
                                        padding: 20
                                    }
                                },
                                y: {
                                    grid: {
                                        color: "rgb(234, 236, 244)",
                                        zeroLineColor: "rgb(234, 236, 244)",
                                        drawBorder: false,
                                        drawTicks: false,
                                        borderDash: ["2"],
                                        zeroLineBorderDash: ["2"]
                                    },
                                    ticks: {
                                        beginAtZero: true,
                                        color: "#858796",
                                        font: {
                                            style: "normal"
                                        },
                                        padding: 20
                                    }
                                }
                            }
                        }
                    });
                });
            </script>

-->
            <footer class="bg-white sticky-footer" style="width: 1800px;">
                <div class="container my-auto" style="width: 1800px;">
                    <div class="text-center my-auto copyright"><span>Copyright © LogWeb 2024</span></div>
                </div>
            </footer>
        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
</div>


<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bs-init.js') }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/chart.js') }}"></script>

</body>

</html>

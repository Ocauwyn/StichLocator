<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Admin Dashboard for Penjahit Management System" />
        <meta name="author" content="" />
        <title>Dashboard Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            .card {
                transition: transform 0.2s ease-in-out;
                border: none;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .card:hover {
                transform: translateY(-5px);
            }
            .stat-card-icon {
                font-size: 2.5rem;
                opacity: 0.8;
            }
            .chart-container {
                position: relative;
                height: 300px;
                margin: 20px 0;
            }
            .nav-link {
                padding: 0.75rem 1rem;
                transition: all 0.2s ease-in-out;
            }
            .nav-link:hover {
                background-color: rgba(255, 255, 255, 0.1);
            }
            .sb-sidenav-menu-heading {
                padding: 1.75rem 1rem 0.75rem;
                font-size: 0.7rem;
                text-transform: uppercase;
                letter-spacing: 0.1em;
            }
            .table-responsive {
                border-radius: 0.5rem;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-scissors me-2"></i>
                Admin Panel
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
                <i class="fas fa-bars"></i>
            </button>
            <!-- Navbar Search
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form> -->
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle fa-fw"></i>
                        @auth('admin')
                            {{ Auth::guard('admin')->user()->name }}
                        @endauth
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!"><i class="fas fa-cog me-2"></i>Settings</a></li>
                        <li><a class="dropdown-item" href="#!"><i class="fas fa-list me-2"></i>Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Management</div>
                            <a class="nav-link" href="{{ route('admin.users') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Data Users
                            </a>
                            <a class="nav-link" href="{{ route('datapenjahit') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                                Data Penjahit
                            </a>
                            <div class="sb-sidenav-menu-heading">Analytics</div>
                            <a class="nav-link" href="{{ route('rating_review') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                                Rating dan Review
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        @auth('admin')
                            {{ Auth::guard('admin')->user()->name }}
                        @endauth
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="mt-4">Dashboard</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Overview</li>
                            </ol>
                        </div>
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Statistics Cards -->
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h3 class="mb-0">{{ $totalPenjahit }}</h3>
                                                <div class="small">Total Penjahit</div>
                                            </div>
                                            <div class="stat-card-icon">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ route('datapenjahit') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h3 class="mb-0">{{ $totalReviews }}</h3>
                                                <div class="small">Total Reviews</div>
                                            </div>
                                            <div class="stat-card-icon">
                                                <i class="fas fa-comments"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ route('rating_review') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h3 class="mb-0">{{ number_format($averageRating, 1) }}</h3>
                                                <div class="small">Average Rating</div>
                                            </div>
                                            <div class="stat-card-icon">
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ route('rating_review') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h3 class="mb-0">{{ $totalUsers }}</h3>
                                                <div class="small">Total Users</div>
                                            </div>
                                            <div class="stat-card-icon">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ route('admin.users') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Charts Row -->
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Rating Distribution
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-container">
                                            <canvas id="ratingDistributionChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-line me-1"></i>
                                        Reviews Over Time
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-container">
                                            <canvas id="reviewsTimelineChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Reviews Table -->
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-table me-1"></i>
                                    Recent Reviews
                                </div>
                                <a href="{{ route('rating_review') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i>View All
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="recentReviewsTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Penjahit</th>
                                                <th>Rating</th>
                                                <th>Review</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($recentReviews as $review)
                                            <tr>
                                                <td>{{ $review->location->name ?? 'N/A' }}</td>
                                                <td>
                                                    @for($i = 0; $i < $review->rating; $i++)
                                                        <i class="fas fa-star text-warning"></i>
                                                    @endfor
                                                </td>
                                                <td>{{ Str::limit($review->review, 100) }}</td>
                                                <td>{{ $review->created_at->format('d M Y') }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Penjahit Management System 2024</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize DataTable
                const datatablesSimple = document.getElementById('recentReviewsTable');
                if (datatablesSimple) {
                    new simpleDatatables.DataTable(datatablesSimple);
                }

                // Rating Distribution Chart
                const ratingCtx = document.getElementById("ratingDistributionChart").getContext('2d');
                new Chart(ratingCtx, {
                    type: "bar",
                    data: {
                        labels: ["1 ⭐", "2 ⭐", "3 ⭐", "4 ⭐", "5 ⭐"],
                        datasets: [{
                            label: "Jumlah Review",
                            backgroundColor: [
                                "rgba(220, 53, 69, 0.8)",   // Merah
                                "rgba(255, 193, 7, 0.8)",   // Kuning
                                "rgba(253, 126, 20, 0.8)",  // Oranye
                                "rgba(32, 201, 151, 0.8)",  // Hijau Muda
                                "rgba(25, 135, 84, 0.8)"    // Hijau
                            ],
                            borderColor: [
                                "rgb(220, 53, 69)",
                                "rgb(255, 193, 7)",
                                "rgb(253, 126, 20)",
                                "rgb(32, 201, 151)",
                                "rgb(25, 135, 84)"
                            ],
                            borderWidth: 1,
                            data: {!! json_encode(array_values($ratingDistribution)) !!}
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: 'Distribusi Rating',
                                font: {
                                    size: 16
                                }
                            }
                        }
                    }
                });

                // Reviews Timeline Chart
                const timelineCtx = document.getElementById("reviewsTimelineChart").getContext('2d');
                const timelineLabels = {!! json_encode($reviewsTimeline->pluck('date')) !!};
                const timelineData = {!! json_encode($reviewsTimeline->pluck('count')) !!};

                new Chart(timelineCtx, {
                    type: "line",
                    data: {
                        labels: timelineLabels,
                        datasets: [{
                            label: "Jumlah Review",
                            data: timelineData,
                            fill: true,
                            borderColor: "rgb(59, 130, 246)",
                            backgroundColor: "rgba(59, 130, 246, 0.1)",
                            tension: 0.4,
                            pointRadius: 4,
                            pointBackgroundColor: "rgb(59, 130, 246)",
                            pointBorderColor: "rgb(255, 255, 255)",
                            pointBorderWidth: 2,
                            pointHoverRadius: 6,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: 'Review per Hari (7 Hari Terakhir)',
                                font: {
                                    size: 16
                                }
                            }
                        }
                    }
                });
            });
        </script>
    </body>
</html>
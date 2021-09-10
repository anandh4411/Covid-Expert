<?php include 'php/map.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Expert</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="/covidexpert/img/virus.png" rel="icon" type="image/png">
</head>

<body>

    <!--NavBar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <form class="d-flex">
                <input class="form-control me-2 search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-search" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Covid Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Affected Areas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Vaccine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Donation</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--NavBar End-->
    <!--Main-->
    <div class="row">
        <div class="col-lg-1">
            <!--SideBar-->
            <div class="sidebar">
                <div class="logo-details">
                    <i class='bx bxl-c-plus-plus icon'></i>
                    <div class="logo_name">Covid Expert</div>
                    <i class='bx bx-menu' id="btn"><i class="fas fa-virus"></i></i>
                </div>
                <ul class="nav-list">
                    <li>
                        <a href="index.php">
                            <i class="fas fa-home"></i>
                            <span class="links_name">Home</span>
                        </a>
                        <span class="tooltip">Home</span>
                    </li>
                    <li>
                        <a href="#covid-cases">
                            <i class="fas fa-chart-area"></i>
                            <span class="links_name">Covid Cases</span>
                        </a>
                        <span class="tooltip">Analytics</span>
                    </li>
                    <li>
                        <a href="pages/map-page.php">
                            <i class="fas fa-map-marker-alt"></i>
                            <span class="links_name">Containment Zones</span>
                        </a>
                        <span class="tooltip">Containment Zones</span>
                    </li>
                    <li>
                        <a href="pages/vaccine-book.html">
                            <i class="fas fa-syringe"></i>
                            <span class="links_name">Book Vaccine</span>
                        </a>
                        <span class="tooltip">Files</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-house-user"></i>
                            <span class="links_name">Quarantine Centres</span>
                        </a>
                        <span class="tooltip">User</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="far fa-comments"></i>
                            <span class="links_name">Messages</span>
                        </a>
                        <span class="tooltip">Messages</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-box-open"></i>
                            <span class="links_name">Donation</span>
                        </a>
                        <span class="tooltip">Order</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-cog"></i>
                            <span class="links_name">Setting</span>
                        </a>
                        <span class="tooltip">Setting</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="links_name">Logout</span>
                        </a>
                        <span class="tooltip">Logout</span>
                    </li>
                </ul>
            </div>
            <!--SideBar End-->
        </div>
        <div class="col-lg-11">
            <!--Body-->
            <div class="container">
                <div id="covid-cases" class="row covid-cases align-items-center">
                    <h2>Covid Status</h2>
                    <div class="col case-card">
                        <small>Tested</small>
                        <h2>1,982</h2>
                        <canvas id="tested" width="200" height="100"></canvas>
                    </div>
                    <div class="col case-card">
                        <small>Confirmed</small>
                        <h2>674</h2>
                        <canvas id="confirmed" width="200" height="100"></canvas>
                    </div>
                    <div class="col case-card">
                        <small>Recovery</small>
                        <h2>1,437</h2>
                        <canvas id="recovery" width="200" height="100"></canvas>
                    </div>
                    <div class="col case-card">
                        <small>Death</small>
                        <h2>34</h2>
                        <canvas id="death" width="200" height="100"></canvas>
                    </div>
                </div>
                <div class="row bottom-row">
                    <h2>Affected Areas</h2>
                    <a class="col-lg-8" href="pages/map-page.php">
                    <div class="map-div">
                        <?php echo $map; ?>
                    </div>
                    </a>
                    <div class="col-lg-4">
                        <div class="row vaccine-book">
                            <h4>Get Vaccinated</h4>
                            <small>Book your vaccine today.</small>
                            <a class="btn" href="pages/vaccine-book.html">Book now</a>
                        </div>
                        <div class="row quarantine-book">
                            <h4>Get Quarantined</h4>
                            <small>Book your quarantine centre today.</small>
                            <a class="btn" href="pages/quarantine-book.html">Book now</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--Body End-->
        </div>
    </div>
    <!--Main End-->

    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js"
        integrity="sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/all.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
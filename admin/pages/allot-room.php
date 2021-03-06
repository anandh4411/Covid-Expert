<?php $id = $_GET["id"]; $user_id = $_GET["user_id"]; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Expert Admin</title>
    <link rel="stylesheet" href="/covidexpert/css/all.min.css">
    <link rel="stylesheet" href="/covidexpert/css/bootstrap.min.css">
    <link rel="stylesheet" href="/covidexpert/css/style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="/covidexpert/img/virus.png" rel="icon" type="image/png">
</head>

<body>

    <!--NavBar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <h5 class="admin-title">Admin Panel</h1>
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
                <div class="stuffs">
                    <div class="row">
                        <div class="col-md-5 covid-case card-tile">
                            <h4>Slot Allotment</h4>
                            <form method="post" action="../php/quarantine/allot-room.php">
                                <input value="<?php echo $id; ?>" name="booking_id" type="number" hidden />
                                <input value="<?php echo $user_id; ?>" name="user_id" type="number" hidden />
                                <div class="form-group">
                                    <input name="date" type="date" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Date">
                                </div>
                                <div class="form-group">
                                    <select name="room" class="form-control" id="exampleFormControlSelect1">
                                        <option disabled selected>Select Room Number</option>
                                        <option>421</option>
                                        <option>423</option>
                                        <option>424</option>
                                        <option>425</option>
                                        <option>426</option>
                                        <option>427</option>
                                        <option>428</option>
                                        <option>429</option>
                                        <option>430</option>
                                        <option>431</option>
                                        <option>432</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="centre" class="form-control" id="exampleFormControlSelect1">
                                        <option disabled selected>Select Quarantine Centre</option>
                                        <?php
                                        include '../php/db.php';
                                        $query = "SELECT * FROM quarantine_centre";
                                        $result = mysqli_query($connect, $query);
                                        while($row = mysqli_fetch_array($result)){
                                            echo '<option>'.$row["name"].', '.$row["location"].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input value="Allot Room" class="btn btn-primary" type="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Body End-->
        </div>
    </div>
    <!--Main End-->

    <script src="/covidexpert/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js"
        integrity="sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/covidexpert/js/all.min.js"></script>
    <script src="/covidexpert/js/bootstrap.min.js"></script>
    <script src="/covidexpert/js/main.js"></script>
</body>

</html>
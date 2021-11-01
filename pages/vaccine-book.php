<?php session_start();
echo '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Expert</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="style.css">
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
                    <i class="bx bxl-c-plus-plus icon"></i>
                    <div class="logo_name">Covid Expert</div>
                    <i class="bx bx-menu" id="btn"><i class="fas fa-virus"></i></i>
                </div>
                <ul class="nav-list">
                    <li>
                        <a href="../index.php">
                            <i class="fas fa-home"></i>
                            <span class="links_name">Home</span>
                        </a>
                        <span class="tooltip">Home</span>
                    </li>
                    <li>
                        <a href="../index.php#covid-cases">
                            <i class="fas fa-chart-area"></i>
                            <span class="links_name">Covid Cases</span>
                        </a>
                        <span class="tooltip">Analytics</span>
                    </li>
                    <li>
                        <a href="map-page.php">
                            <i class="fas fa-map-marker-alt"></i>
                            <span class="links_name">Containment Zones</span>
                        </a>
                        <span class="tooltip">Containment Zones</span>
                    </li>
                    <li>
                        <a href="vaccine-book.html">
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
            <div class="container">';
                if(!isset($_SESSION["user-id"])) $user_id = $_SESSION["user-id"];
                $no_user = 'false';
                $booked = 'false';
                $alloted = 'false';
                $vaccinated = 'false';
                include '../php/db.php'; 
                if(!isset($user_id)){
                    $no_user = 'true';
                }
                else{
                    $query = "SELECT * FROM vaccine_booking";
                    $result = mysqli_query($connect, $query);
                    while($row = mysqli_fetch_array($result)){
                        if($user_id == $row["user_id"]) $booked = 'true';
                        if($row["alloted"] == 'true'){
                            $booked = 'false';
                            $alloted = 'true';
                        }
                    } 
                    $query2 = "SELECT * FROM vaccinated";
                    $result2 = mysqli_query($connect, $query2);
                    while($row = mysqli_fetch_array($result2)){
                        if($user_id == $row["user_id"]) $vaccinated = 'true';
                    }
                }

                if($no_user == 'true'){
                    echo '<div class="vaccine-success">
                            <h1>Login!</h1>
                            <h4>You are not <span>logged in.</span></h4>
                            <h4>If you do not have an account, please signup. Thank you..</h4>
                        </div>';
                }
                elseif($booked == 'true'){
                    echo '<div class="vaccine-success">
                            <h1>Booked!</h1>
                            <h4>You are already registered for <span>vaccination.</span></h4>
                            <h4>We will inform you when slots are available. Thank you..</h4>
                        </div>';
                }
                elseif($alloted == 'true'){
                    echo '<div class="vaccine-success">
                            <h1>Slot Alloted!</h1>
                            <h4>You are provided with a slot for <span>vaccination.</span></h4>
                            <h4>Check the notification area. Thank you..</h4>
                        </div>';
                }
                elseif($vaccinated == 'true'){
                    echo '<div class="vaccine-success">
                            <h1>Vaccinated!</h1>
                            <h4>Congrats, you have been completed your <span>vaccination.</span></h4>
                            <h4>Download the certificate. Thank you..</h4>
                        </div>';
                }
                else{
                    echo '<div class="vaccine-form-card" style="width: 25rem; margin-top: 70px;">
                            <form action="../php/vaccination/book-vaccine.php" method="post">
                                <div class="syringe">
                                    <svg class="svg-inline--fa fa-syringe fa-w-16" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="syringe" role="img" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="#00ABFF"
                                            d="M201.5 174.8l55.7 55.8c3.1 3.1 3.1 8.2 0 11.3l-11.3 11.3c-3.1 3.1-8.2 3.1-11.3 0l-55.7-55.8-45.3 45.3 55.8 55.8c3.1 3.1 3.1 8.2 0 11.3l-11.3 11.3c-3.1 3.1-8.2 3.1-11.3 0L111 265.2l-26.4 26.4c-17.3 17.3-25.6 41.1-23 65.4l7.1 63.6L2.3 487c-3.1 3.1-3.1 8.2 0 11.3l11.3 11.3c3.1 3.1 8.2 3.1 11.3 0l66.3-66.3 63.6 7.1c23.9 2.6 47.9-5.4 65.4-23l181.9-181.9-135.7-135.7-64.9 65zm308.2-93.3L430.5 2.3c-3.1-3.1-8.2-3.1-11.3 0l-11.3 11.3c-3.1 3.1-3.1 8.2 0 11.3l28.3 28.3-45.3 45.3-56.6-56.6-17-17c-3.1-3.1-8.2-3.1-11.3 0l-33.9 33.9c-3.1 3.1-3.1 8.2 0 11.3l17 17L424.8 223l17 17c3.1 3.1 8.2 3.1 11.3 0l33.9-34c3.1-3.1 3.1-8.2 0-11.3l-73.5-73.5 45.3-45.3 28.3 28.3c3.1 3.1 8.2 3.1 11.3 0l11.3-11.3c3.1-3.2 3.1-8.2 0-11.4z">
                                        </path>
                                    </svg>
                                </div>
                                <input hidden name="user_id" value="'.$_SESSION["user-id"].'" type="number">
                                <div class="form-group">
                                    <input name="aadhar_number" type="tel" class="form-control" id="exampleInputPassword1"
                                        placeholder="Aaadhar number">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <select name="city" class="form-control" id="exampleFormControlSelect1">
                                            <option value="" disabled selected>Select City</option>
                                            <option>Konni</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="district" class="form-control">
                                            <option>Select District</option>
                                            <option>Pathanamthitta</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input name="phone" type="tel" class="form-control" id="exampleInputPassword1" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <input name="age" type="number" class="form-control" id="exampleInputPassword1" placeholder="Age">
                                </div>
                                <div class="form-group">
                                    <select name="vaccine" class="form-control" id="exampleFormControlSelect1">
                                        <option>Select Vaccine</option>
                                        <option>Covishield</option>
                                        <option>Covaxin</option>
                                        <option>Sputnik V</option>
                                    </select>
                                </div>
                                <input class="btn btn-primary" type="submit">
                            </form>
                        </div>';
                }

            echo '</div>
            <!--Body End-->
        </div>
    </div>
    <!--Main End-->

    <script src="../js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js"
        integrity="sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/all.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>';
?>
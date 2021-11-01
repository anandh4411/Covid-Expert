<?php
session_start();
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
                if(isset($_SESSION['user-id'])) $user_id = $_SESSION["user-id"];
                $no_user = 'false';
                $booked = 'false';
                $alloted = 'false';
                $quarantined = 'false';
                include '../php/db.php'; 
                if(!isset($user_id)){
                    $no_user = 'true';
                }
                else{
                    $query = "SELECT * FROM quarantine_booking";
                    $result = mysqli_query($connect, $query);
                    while($row = mysqli_fetch_array($result)){
                        if($user_id == $row["user_id"]) $booked = 'true';
                        if($row["alloted"] == 'true'){
                            $booked = 'false';
                            $alloted = 'true';
                        }
                    } 
                    $query2 = "SELECT * FROM quarantined";
                    $result2 = mysqli_query($connect, $query2);
                    while($row = mysqli_fetch_array($result2)){
                        if($user_id == $row["user_id"]) $quarantined = 'true';
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
                            <h4>You already booked <span>quarantine centre.</span></h4>
                            <h4>We will inform you when rooms are available. Thank you..</h4>
                        </div>';
                }
                elseif($alloted == 'true'){
                    echo '<div class="vaccine-success">
                            <h1>Room Alloted!</h1>
                            <h4>You are provided with a Room for <span>quarantine.</span></h4>
                            <h4>Check the notification area. Thank you..</h4>
                        </div>';
                }
                elseif($quarantined == 'true'){
                    echo '<div class="vaccine-success">
                            <h1>Quarantined!</h1>
                            <h4>Congrats, you have been <span>quarantined.</span></h4>
                            <h4>Thank you..</h4>
                        </div>';
                }
                else{
                    echo '<div class="vaccine-form-card" style="width: 25rem; margin-top: 75px;">
                    <form method="post" action="../php/quarantine/book-quarantine.php">
                        <div class="syringe">
                            <svg class="svg-inline--fa fa-house-user fa-w-18" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="house-user" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="#00ABFF"
                                    d="M570.69,236.27,512,184.44V48a16,16,0,0,0-16-16H432a16,16,0,0,0-16,16V99.67L314.78,10.3C308.5,4.61,296.53,0,288,0s-20.46,4.61-26.74,10.3l-256,226A18.27,18.27,0,0,0,0,248.2a18.64,18.64,0,0,0,4.09,10.71L25.5,282.7a21.14,21.14,0,0,0,12,5.3,21.67,21.67,0,0,0,10.69-4.11l15.9-14V480a32,32,0,0,0,32,32H480a32,32,0,0,0,32-32V269.88l15.91,14A21.94,21.94,0,0,0,538.63,288a20.89,20.89,0,0,0,11.87-5.31l21.41-23.81A21.64,21.64,0,0,0,576,248.19,21,21,0,0,0,570.69,236.27ZM288,176a64,64,0,1,1-64,64A64,64,0,0,1,288,176ZM400,448H176a16,16,0,0,1-16-16,96,96,0,0,1,96-96h64a96,96,0,0,1,96,96A16,16,0,0,1,400,448Z">
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
                                    <option disabled selected>Select District</option>
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
                            <select name="quarantine_centre" class="form-control" id="exampleFormControlSelect1">
                                <option disabled selected>Select Quarantine Centre</option>';
                                    include '../php/db.php';
                                    $query = "SELECT * FROM quarantine_centre";
                                    $result = mysqli_query($connect, $query);
                                    while($row = mysqli_fetch_array($result)){
                                        echo '<option>'.$row["name"].', '.$row["location"].'</option>';
                                    }
                    echo '</select>
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
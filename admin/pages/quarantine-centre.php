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
                            <form method="post" action="../php/quarantine/add-quarantine-centre.php">
                                <h3>Add Quarantine Centre</h3>
                                <div class="form-group">
                                    <input name="centre_id" type="number" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Centre ID">
                                </div>
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <input name="location" type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Location">
                                </div>
                                <div class="form-group">
                                    <input name="rooms" type="number" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Number of Rooms Available">
                                </div>
                                <input class="btn btn-primary" type="submit">
                            </form>
                        </div>
                        <div style="margin-left: 90px;" class="col-md-5 case-table card-tile"></div>

                        <div class="col-md-8 case-table card-tile">
                            <h4 style="margin: 20px;">Quarantine Centres</h4>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Centre ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Available Rooms</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include '../php/db.php';
                                    $query = "SELECT * FROM quarantine_centre";
                                    $result = mysqli_query($connect, $query);
                                    while($row = mysqli_fetch_array($result)){
                                        echo '<tr>
                                                <th scope="row">'.$row["centre_id"].'</th>
                                                <td>'.$row["name"].'</td>
                                                <td>'.$row["location"].'</td>
                                                <td>'.$row["rooms"].'</td>
                                                <td><a href="update-quarantine.php?id='.$row["id"].'" style="background-color: rgb(0, 171, 255); margin-top: 0;" class="btn btn-primary">Update</a></td>
                                                <td><a href="../php/quarantine/delete-quarantine.php?id='.$row["id"].'" style="margin-top: 0;" class="btn btn-danger">Delete</a></td>
                                            </tr>';
                                    }
                                ?>
                                </tbody>
                              </table>
                        </div>

                        <div class="col-md-11 case-table card-tile">
                            <h4 style="margin: 20px;">Currently Active Bookings</h4>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">User Id</th>
                                    <th scope="col">Aadhar Number</th>
                                    <th scope="col">City</th>
                                    <th scope="col">District</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Vaccine</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include '../php/db.php';
                                    $query = "SELECT * FROM quarantine_booking";
                                    $result = mysqli_query($connect, $query);
                                    while($row = mysqli_fetch_array($result)){
                                        echo '<tr>
                                                <th scope="row">'.$row["id"].'</th>
                                                <th scope="row">'.$row["user_id"].'</th>
                                                <td>'.$row["aadhar_number"].'</td>
                                                <td>'.$row["city"].'</td>
                                                <td>'.$row["district"].'</td>
                                                <td>'.$row["name"].'</td>
                                                <td>'.$row["phone"].'</td>
                                                <td>'.$row["age"].'</td>
                                                <td>'.$row["quarantine_centre"].'</td>';
                                        if($row["alloted"] == 'false'){
                                            echo '<td><a href="allot-room.php?id='.$row["id"].'&user_id='.$row["user_id"].'" style="background-color: rgb(0, 171, 255); margin-top: 0;" class="btn btn-primary">Allot Room</a></td>';
                                        }
                                        else{
                                            echo '<td><a href="../php/quarantine/quarantined.php?id='.$row["id"].'&user_id='.$row["user_id"].'&aadhar='.$row["aadhar_number"].'&city='.$row["city"].'&district='.$row["district"].'&name='.$row["name"].'&phone='.$row["phone"].'&age='.$row["age"].'&quarantine_centre='.$row["quarantine_centre"].'" 
                                            style="margin-top: 0; background-color: rgb(50,205,50);" class="btn btn-success">Finished Quarantine</a></td>
                                            </tr>';
                                        }
                                    }
                                ?>
                                </tbody>
                              </table>
                        </div>

                        <div class="col-md-11 case-table card-tile">
                            <h4 style="margin: 20px;">Quarantined Individuals</h4>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">User Id</th>
                                    <th scope="col">Aadhar Number</th>
                                    <th scope="col">City</th>
                                    <th scope="col">District</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Centre</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include '../php/db.php';
                                    $query = "SELECT * FROM quarantined";
                                    $result = mysqli_query($connect, $query);
                                    while($row = mysqli_fetch_array($result)){
                                        echo '<tr>
                                                <th scope="row">'.$row["id"].'</th>
                                                <th scope="row">'.$row["user_id"].'</th>
                                                <td>'.$row["aadhar_number"].'</td>
                                                <td>'.$row["city"].'</td>
                                                <td>'.$row["district"].'</td>
                                                <td>'.$row["name"].'</td>
                                                <td>'.$row["phone"].'</td>
                                                <td>'.$row["age"].'</td>
                                                <td>'.$row["quarantine_centre"].'</td>';
                                    }
                                ?>
                                </tbody>
                              </table>
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
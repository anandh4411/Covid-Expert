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
                            <form method="post" action="../php/covid-cases/add-covid-case.php">
                                <div class="form-group">
                                    <input name="date" type="date" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Date">
                                </div>
                                <div class="form-group">
                                    <input name="tested" type="number" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Tested Count">
                                </div>
                                <div class="form-group">
                                    <input name="confirmed" type="number" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Confirmed Count">
                                </div>
                                <div class="form-group">
                                    <input name="recovery" type="number" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Recovery Count">
                                </div>
                                <div class="form-group">
                                    <input name="death" type="number" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Death Count">
                                </div>
                                <input class="btn btn-primary" type="submit">
                            </form>
                        </div>
                        <div class="col-md-6 case-table card-tile">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Tested</th>
                                    <th scope="col">Confirmed</th>
                                    <th scope="col">Recovery</th>
                                    <th scope="col">Death</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include '../php/db.php';
                                    $query = "SELECT * FROM covid_cases";
                                    $result = mysqli_query($connect, $query);
                                    while($row = mysqli_fetch_array($result)){
                                        echo '<tr>
                                                <th scope="row">'.$row["id"].'</th>
                                                <td>'.$row["date"].'</td>
                                                <td>'.$row["tested"].'</td>
                                                <td>'.$row["confirmed"].'</td>
                                                <td>'.$row["recovery"].'</td>
                                                <td>'.$row["death"].'</td>
                                            </tr>';
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

    <script>
        chart = document.getElementById('tested').getContext('2d');
        gradientStroke = chart.createLinearGradient(500, 0, 100, 0);
        gradientStroke.addColorStop(0, '#00ABFF');
        gradientStroke.addColorStop(1, chartColor);
        gradientFill = chart.createLinearGradient(0, 170, 0, 50);
        gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
        gradientFill.addColorStop(1, "rgba(0, 171, 255, 0.40)");
        var myChart = new Chart(chart, {
            type: 'line',
            data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                    /*pointBorderColor: "#3f3e3c",
                    pointBackgroundColor: "#00ABFF",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 1,
                    pointRadius: 4,*/
                    label: "Hello",
                    fill: true,
                    data: [80, 99, 86, 96, 123, 85, 100],
                    backgroundColor: gradientFill,
                    borderColor: "#00ABFF",
                    borderWidth: 5,
                }]
            },
            options: options
        });

        chart2 = document.getElementById('confirmed').getContext('2d');
        gradientStroke = chart2.createLinearGradient(500, 0, 100, 0);
        gradientStroke.addColorStop(0, '#f96332');
        gradientStroke.addColorStop(1, chartColor);
        gradientFill = chart2.createLinearGradient(0, 170, 0, 50);
        gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
        gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");
        var myChart2 = new Chart(chart2, {
            type: 'line',
            data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                    /*pointBorderColor: "#3f3e3c",
                    pointBackgroundColor: "#f96332",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 1,
                    pointRadius: 4,*/
                    label: "Hello",
                    fill: true,
                    data: [85, 100, 75, 88, 90, 123, 155],
                    backgroundColor: gradientFill,
                    borderColor: "#f96332",
                    borderWidth: 5,
                }]
            },
            options: options
        });

        chart3 = document.getElementById('recovery').getContext('2d');
        gradientStroke = chart3.createLinearGradient(500, 0, 100, 0);
        gradientStroke.addColorStop(0, '#18ce0f');
        gradientStroke.addColorStop(1, chartColor);
        gradientFill = chart3.createLinearGradient(0, 170, 0, 50);
        gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
        gradientFill.addColorStop(1, "rgba(24, 206, 15, 0.40)");
        var myChart3 = new Chart(chart3, {
            type: 'line',
            data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                    /*pointBorderColor: "#3f3e3c",
                    pointBackgroundColor: "#18ce0f",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 1,
                    pointRadius: 4,*/
                    label: "Hello",
                    fill: true,
                    data: [99, 86, 123, 85, 75, 88, 123],
                    backgroundColor: gradientFill,
                    borderColor: "#18ce0f",
                    borderWidth: 5,
                }]
            },
            options: options
        });

        chart4 = document.getElementById('death').getContext('2d');
        gradientStroke = chart4.createLinearGradient(500, 0, 100, 0);
        gradientStroke.addColorStop(0, '#FF0707');
        gradientStroke.addColorStop(1, chartColor);
        gradientFill = chart4.createLinearGradient(0, 170, 0, 50);
        gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
        gradientFill.addColorStop(1, "rgba(255, 7, 7, 0.40)");
        var myChart4 = new Chart(chart4, {
            type: 'line',
            data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                    /*pointBorderColor: "#3f3e3c",
                    pointBackgroundColor: "#FF0707",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 1,
                    pointRadius: 4,*/
                    label: "Hello",
                    fill: true,
                    data: [123, 85, 100, 75, 88, 90, 155],
                    backgroundColor: gradientFill,
                    borderColor: "#FF0707",
                    borderWidth: 5,
                }]
            },
            options: options
        });
    </script>

    <script src="/covidexpert/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js"
        integrity="sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/covidexpert/js/all.min.js"></script>
    <script src="/covidexpert/js/bootstrap.min.js"></script>
    <script src="/covidexpert/js/main.js"></script>
</body>

</html>
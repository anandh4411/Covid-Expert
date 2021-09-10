let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".fa-search");

closeBtn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
});

searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
    } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");//replacing the iocns class
    }
}

// Chart
chartColor = "#FFFFFF";
options = {
    responsive: true,
    elements: {
        point: {
            radius: 0
        }
    },
    scales: {
        y: {
            display: false,
            beginAtZero: true
        },
        x: {
            display: false,
        },
    },
    plugins: {
        legend: {
            display: false
        }
    },
    layout: {
        padding: {
            top: -30
        }
    }
};
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


// Map

function zoomin() {
    var myImg = document.getElementById("map");
    var currWidth = myImg.clientWidth;
    if (currWidth == 2500) return false;
    else {
        myImg.style.width = (currWidth + 100) + "px";
    }
}

function zoomout() {
    var myImg = document.getElementById("map");
    var currWidth = myImg.clientWidth;
    if (currWidth == 100) return false;
    else {
        myImg.style.width = (currWidth - 100) + "px";
    }
}
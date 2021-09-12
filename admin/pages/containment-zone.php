<?php include '../../php/get.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Manage Containment Zones</title>
    <script src="https://d3js.org/d3.v4.min.js"></script>
  </head>
  <body>
    <div class="row">
      <div class="col-md-4">
        <div class="container">
          <div class="add-quarantine-card">
            <form action="">
              <h2 style="color: white" class="text-center">
                Manage Containment Zones
              </h2>
              <label style="margin-top: 15px" for="">Add a new map:</label>
              <div class="form-group">
                <input
                  placeholder="location"
                  type="text"
                  class="form-control"
                />
              </div>
              <div class="form-group">
                <input
                  placeholder="svg code"
                  type="text"
                  class="form-control"
                />
              </div>
              <input class="btn-add-centre" value="Add map" type="submit" />
            </form>
            <label style="margin-top: 15px" for="">Map controls:</label>
            <div class="row">
              <div class="btn-div">
                <button id="red-zone" class="btn-danger color-btn">Red Zone</button>
                <button id="blue-zone" class="btn-primary color-btn">Blue Zone</button>
              </div>
              <form action="../../php/post.php" method="post">
                <input id="map_code" type="text" name="map_code" hidden />
                <input
                  style="width: 100%"
                  class="btn-add-centre"
                  id="submit_map"
                  type="submit"
                  value="Save Edits"
                />
              </form>
              <button type="button" id="clear" style="background-color: red" class="btn-add-centre">
                Clear Circles
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-8 mapdiv">
        <div class="container">
          <div id="map_div" class="map-container">
            <?php
              for($i=0; $i < (count($row))-1; $i++){
                echo $row[$i];
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <script src="../js/script.js"></script>
  </body>
</html>

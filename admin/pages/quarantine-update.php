<?php include '../../php/get.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage all quarantine centres</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>
    <div class="row">
      <div class="col-md-4">
        <div class="container">
          <div class="add-quarantine-card">
            <h2 style="color: white" class="text-center">
              Add Quarantine Centre
            </h2>
            <?php
                while($row = $update_result->fetch_assoc()) {
                    echo '<form action="../../php/post.php" method="POST">
                    <input
                      id="quarantine_post"
                      type="text"
                      name="post"
                      hidden
                      value="quarantine_post"
                    />
                    <div class="form-group">
                      <input
                        name="centre_name"
                        placeholder="centre name"
                        type="text"
                        class="form-control"
                        value="'  . $row["centre_name"] . '"
                      />
                    </div>
                    <div class="form-group">
                      <input
                        name="location"
                        placeholder="location"
                        type="text"
                        class="form-control"
                        value="'  . $row["location"] . '"
                      />
                    </div>
                    <select name="cost" class="form-select">
                      <option value="'  . $row["cost"] . '" selected>Select free or paid</option>
                      <option value="Free">Free</option>
                      <option value="Paid">Paid</option>
                    </select>
                    <div class="form-group">
                      <input
                        name="total_rooms"
                        placeholder="total no. of rooms"
                        type="text"
                        class="form-control"
                        value="'  . $row["total_rooms"] . '"
                      />
                    </div>
                    <div class="form-group">
                      <input
                        name="available_rooms"
                        placeholder="available no. of rooms"
                        type="text"
                        class="form-control"
                        value="'  . $row["available_rooms"] . '"
                      />
                    </div>
                    <input class="btn-add-centre" value="Add Centre" type="submit" />
                  </form>' ;
                }
            ?>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="container">
          <h2 style="color: white; margin-top: 5%">All Quarantine Centres</h2>
          <div class="table-container">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Centre Name</th>
                  <th scope="col">Location</th>
                  <th scope="col">Cost</th>
                  <th scope="col">Total Rooms</th>
                  <th scope="col">Rooms Available</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // for($i=0; $i < (count($row2))-1; $i++){   
                  while($row2 = $quarantine_result->fetch_assoc()) {
                  echo '<tr>
                    <th scope="row">' . $row2["id"] . '</th>
                    <td>' . $row2["centre_name"] . '</td>
                    <td>' . $row2["location"] . '</td>
                    <td>' . $row2["cost"] . '</td>
                    <td>' . $row2["total_rooms"] . '</td>
                    <td>' . $row2["available_rooms"] . '</td>
                    <td>
                      <form action="" method="POST">
                        <input id="quarantine_post_update" type="text" name="post" hidden value="quarantine_post_update" />
                        <input id="quarantine_post_update" type="text" name="centre_id" hidden value="' . $row2["id"] . '" />
                        <input class="btn-update" value="Update" type="submit" />
                      </form>
                    </td>
                    <td>
                      <form action="../../php/post.php" method="POST">
                        <input id="quarantine_post_delete" type="text" name="post" hidden value="quarantine_post_delete" />
                        <input id="quarantine_post_update" type="text" name="centre_id" hidden value="' . $row2["id"] . '" />
                        <input style="background-color: red" class="btn-update" value="Delete" type="submit" />
                      </form>
                    </td>
                  </tr>';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

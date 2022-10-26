<?php
  require_once 'connection.php';
    $status=$_GET['status'];
  $sql = "SELECT * FROM todo_list WHERE status='$status'";
  $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="sidebar">
    <div class="logo-details">
       <i class='bx bxs-cog' ></i>    
       <span class="logo_name">TODO</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="index.php">
            <i class='bx bxs-home-smile' ></i>
            <span class="links_name">Home</span>
          </a>
        </li>
        <li>
          <a href="view.php">
            <i class='bx bxs-edit-alt'></i>
            <span class="links_name">View</span>
          </a>
        </li>
      </ul>
  </div>

        <!--Header-->

  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">TODO List</span>
      </div>
    </nav>
        <!-- Display User Details -->

    <div class="home-content">
     
    <div class="user-boxes">
        <div class="recent-user box">
          <div class="title">List of Tasks</div>


            <div class="dropdown float-right">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Filter By status
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button" value="all"><a href="view.php">All</a></button>
                <button class="dropdown-item" type="button" value="completed"><a href="filter.php?status=completed">Completed</a></button>
                <button class="dropdown-item" type="button" value="incompleted"><a href="filter.php?status=incomplete">Incomplete</a></button>
            </div>
            </div>

        <br><br><br>
          <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Task</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
          <!-- Extract Data -->
          <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
        ?>

          <div class="user-details">
            <tbody>
                <tr>
                <th scope="row"><?php echo $row['id'];?></th>
                <td><?php echo $row['task'];?></td>
                <td><?php echo $row['description'];?></td>
                <td><?php echo $row['status'];?></td>
                <td><a href="update.php?id=<?php echo $row['id'];?>"><i class='bx bx-edit-alt' ></i></a></td>
                <td><a href="delete.php?id=<?php echo $row['id'];?>"><i class='bx bx-x' ></i></a></td>
                </tr>
            </tbody>
          <?php
                }
            }
          ?>
          </table>
        </div>
      </div>

    </div>

  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


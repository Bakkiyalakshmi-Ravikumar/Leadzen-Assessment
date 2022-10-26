<?php
  require_once 'connection.php';

  $id=$_GET['id'];

  $sql = "SELECT * FROM todo_list WHERE id='$id'";
  $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
    
    <!-- Boxicons CDN Link -->
        <link 
        href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css'
        rel='stylesheet'
        />
    <!-- Bootstrap CDN -->
        <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
        crossorigin="anonymous">

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/style.css">
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
          <div class="title">Profile Details</div>
          <hr><br>
          <div class="user-details">
            <!-- Update Details Form -->
            
      <!-- Extract Data -->
      <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
        ?>


      <form action="edit.php" method="POST">
          <div class="form-group">
                <label for="task">Task</label>
                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                <input type="text" class="form-control" id="task" name ="task" value="<?php echo $row['task'];?>">
          </div>
          <div class="form-group">
                <label for="desc">Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"><?php echo $row['description'];?></textarea>
          </div>
          <div class="form-group">
                <label for="status">Status</label>
                <input type="checkbox" name="status" id="status" value="completed">
          </div>
            <button type="submit" class="btn btn-primary">Update</button>
      </form>

      <?php
            }
        }
      ?>
          </div>
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
</body>
</html>
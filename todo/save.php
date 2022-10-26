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
       <span class="logo_name">PHP</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="index.php">
            <i class='bx bxs-home-smile' ></i>
            <span class="links_name">Home</span>
          </a>
        </li>
        <li>
          <a href="register.php">
            <i class='bx bxs-edit-alt'></i>
            <span class="links_name">Register</span>
          </a>
        </li>
      </ul>
  </div>

        <!--Header-->

  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Home</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
    </nav>

        <!-- Display User Details -->

    <div class="home-content">
     
    <div class="user-boxes">
        <div class="recent-user box">
          <hr><br>
          <div class="user-details">
            <!-- Registered Successfully -->
            
            <div class="jumbotron">
                <h1 class="display-4">Registered Successfully</h1>
                <p class="lead">Thanks! New task has been added</p>
                <hr class="my-4">
                <p>To view the Tasks</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="view.php" role="button">Click here</a>
                </p>
            </div>

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
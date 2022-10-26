<?php
    require_once 'connection.php';
    // define the constant for the error message
    define("REQUIRED","Please Enter the value");

    //define the variables with null value
    $task=$desc=$status='';
    
    //define the array for the error message
    $error=[];

    //check the form is in hte post method and get the value from it.
    if($_SERVER['REQUEST_METHOD']==='POST')
    {
        // To get the values from the form
        $task=test_data('task');
        $desc=test_data('desc');

        if(!$task)
        {
            $error['task']=REQUIRED;
        }
        //If all the validation are correct then execute it 
        else
        {
          $status = "Incomplete";
          $sql = "INSERT INTO todo_list(task,description,status) values ('$task','$desc','$status')";
                 if ($conn->query($sql) === TRUE) {
                     header('location:save.php');
                   } 
                   else {
                     echo "Error: " . $sql . "<br>" . $conn->error;
                   }
      }
    }
    
    //Apply trim, stripslashes and htmlspecialchars function to the variables to avoid being hacked
    function test_data($field)
    {
         if(!isset($_POST[$field]))
             return false;
         $data=trim($_POST[$field]);
         $data=htmlspecialchars(stripcslashes($data));
         return $data;
    }
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
        <span class="dashboard">Register</span>
      </div>
    </nav>

        <!-- Display User Details -->

    <div class="home-content">
     
    <div class="user-boxes">
        <div class="recent-user box">
          <div class="title">Create TODO</div>
          <hr><br>
          <div class="user-details">
           
          <!-- Register Details Form -->
            
      <form name="f1"
          action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
          method="POST">
          <div class="form-group">
                <label for="task">Task</label>
                <input class="form-control <?php echo isset($error['task']) ? 'is-invalid' : ''; ?>"
                        name="task" value="<?php echo $task; ?>">
                  <div class="invalid-feedback">
                        <?php echo $error['task'] ?? ''; ?>
                  </div>
              </div>
              <div class="form-group">
                <label for="desc">Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
      </form>

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
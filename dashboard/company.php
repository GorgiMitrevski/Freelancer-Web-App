
<!DOCTYPE html>

<html lang="en">
    
  <head>

  <?php 
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "usbw";
  $dbname = "baza";
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }


  if($_SESSION["username"] == NULL){
      $user = $_POST["username"];
      $pw  = md5($_POST["password"]);
      $sql = "SELECT username FROM company WHERE username='$user' AND password='$pw'";
      $result = $conn->query($sql);
                                      
      if ($result->num_rows == 1) {
                                          // output data of each row
          while($row = $result->fetch_assoc()) {
              $profile = $row["username"];                                              
              $_SESSION["username"]=$profile; }
          } else {
      header("Location:/loginerror/error.php"); /* Redirect browser */
      exit();
    }
    }
    if($_SESSION["username"] != NULL){
      $user = $_SESSION["username"];
      $sql = "SELECT * FROM company WHERE username='$user'";
      $result = $conn->query($sql);
                                      
      if ($result->num_rows == 1) {
                                          // output data of each row
          while($row = $result->fetch_assoc()) {
              $profile = $row["username"];                                              
              $companyname = $row["name"];
              $city = $row["city"];
              $sector = $row["sector"];
              $since = $row["since"];
              $noemployees = $row["no_employes"];
              $website = $row["website"];
              $contact_email = $row["contact_email"];
              $contact_phone = $row["phone"];
              $cio = $row["cio"];
              $des = $row["short_description"];
             }
          } 
    
    }

    ?>


      
    <meta charset="utf-8">
      
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      
      <link rel="stylesheet" href="style.css">

      <title>Proekt</title>
      
  </head>
    
  <body data-spy="scroll" data-target="#navbar" data-offset="150">
      
        <nav class="navbar navbar-light bg-faded navbar-fixed-top" id="navbar">
        <a class="navbar-brand" href="#jumbotron">  <img src="undraw_photo.png" height="40px" width="100px"> </a>
          <ul class="nav navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/dashboard/company.php">Home <span class="sr-only">(current)</span></a>
            </li>
     
            <li class="nav-item dropdown pull-xs-right">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php  echo $profile ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  
                  <a class="dropdown-item" href="/index.php">Log out</a>
                </div>        
          </ul> 
          
        </nav> 


          <br>
          <br>
          <br>
        
          <div class="">
            <div class="row">
                <div class="col-md-2 ">
                     <div class="list-group ">
                      <a href="/dashboard/company.php" class="list-group-item list-group-item-action active">Dashboard</a>
                      <a href="/posts/cvpost.php" class="list-group-item list-group-item-action">Search CVs</a>
                      <a href="/post/hire.php" class="list-group-item list-group-item-action">Hire</a>
                      <a href="/editpublic/company.php" class="list-group-item list-group-item-action">Edit Public Informations</a>
                      <a href="/editprivate/company.php" class="list-group-item list-group-item-action">Edit Private Informations</a>

                      
                      
                      
                    </div> 
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Public Profile</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <p><b> <h6>Username: <?php echo $_SESSION["username"] ?></p> </b></h6>
                                <hr>
                                <p><b><h6>Company Name: <?php echo $companyname ?></p></b> </h6>
                                <hr>
                                <h6> <b> <p>City: <?php echo $city?></p>
                                <hr>
                                <p>Sector: <?php echo $sector?></p>
                                <hr>
                                <p>Since: <?php echo $since?></p>
                                <hr>
                                <p>No.Employes: <?php echo $noemployees?></p>                 
                                <hr>
                                <p>Website: <?php echo $website?></p>
                                <hr>
                                <p>Contact Phone: <?php echo $contact_phone?></p>
                                <hr>
                                <p>Contact Email: <?php echo $contact_email?></p>
                                <hr>
                                <p>Cio: <?php echo $cio?></p>
                                <hr>
                                <p>Short description:</p>
                                <?php echo $des?>  </b>
                                </h6> 
                  
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
          
      
      
      
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
      
  </body>

  
    
</html>
                            
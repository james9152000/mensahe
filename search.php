<?php

include_once('connection/connection.php');

$con = connection();

$search = $_GET['search'];


$sql = "SELECT * FROM message WHERE Message_head LIKE '%$search%' OR Message_body LIKE '%$search%' ORDER BY Message_date DESC";
$result = $con->query($sql) or die ($con->error);
$rows = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Main</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
        <div class="container-fluid main-nav">
          <h3 class="web-title">Mensahe</h3>
          <div class="nav-link">
            <ul>
              <li><a href="index.php" ><span class="back-home">Home</span></a></li>
            </ul>
          </div>
        </div>        
    </nav>
    <div class="showcase">
      <div class="showcase-text">
      <h3>Message someone anonymously</h3>
      <p>Feel free to message someone</p>
      <a href="add_message.php" class="btn btn-outline-danger">Message Now</a>
  </div>
    </div>
    <div class="search-space">    
      <form action="result.php" method="get">
      <div>
      <input type="text" name="search" placeholder="Search">
      </div>  
        <div>
        <input type="button" name="search" class="btn btn-danger" value="Search">
        </div>
        
      </form>
    </div>
    
        <div class="row justify-content-between container-msg">    
          <?php do{ ?>        
              <div class="card text-white <?php echo $rows['Message_theme']  ?> mb-3" style="max-width: 18rem;">
                <div class="card-header"><?php echo $rows['Message_category']  ?></div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $rows['Message_head'] ?></h5>
                  <p class="card-text"><?php echo $rows['Message_body'] ?></p>
                  <p class="card-text"><?php echo $rows['Message_date'] ?></p>
                </div>
              </div>
          <?php }while($rows = $result->fetch_assoc()); ?>
          </div>        
</body>
</html>
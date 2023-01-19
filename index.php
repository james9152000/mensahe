<?php

include_once('connection/connection.php');

$con = connection();

$sql = "SELECT * FROM message ORDER BY Message_date DESC";
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
        <div class="main-nav">

          <div class="brand-name">

            <p class="web-title">Mensahe</p>

          </div>

          <div class="home">

            <a href="">Message Wall</a>

          </div>

        </div>        

    <div class="showcase">
      <div class="rocket">
        <img src="img/rocket.png" alt="">
      </div>
      <div class="satelite">
        <img src="img/Satellite.png" alt="">
      </div>
      <div class="showcase-text typewriter">
        <div class="typed-out">Message someone anonymously</div>
        <p>Spread the love not have</p>
        <a href="add_message.php" class="btn btn-outline-danger">Message Now</a>
      </div>
    </div>

    <div class="search-space">    
      <form action="search.php" method="get">
        <div>
          <input type="text" name="search" placeholder="Search">
        </div>  
        <div>
          <input type="submit" name="submit" class="btn btn-light" value="Search">
        </div>        
      </form>
    </div>
    <div class="container-msg">
      <div class="row justify-content-center">   

        <?php do{ ?>        
            <div class="card text-white m-3 <?php echo $rows['Message_theme']  ?> mb-3 card-id" style="max-width: 18rem;">
              <div class="card-header"><?php echo $rows['Message_category']  ?></div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $rows['Message_head'] ?></h5>
                <p class="card-text"><?php echo $rows['Message_body'] ?></p>
                <p class="card-text"><?php echo $rows['Message_date'] ?></p>
              </div>
            </div>
          <?php }while($rows = $result->fetch_assoc()); ?>
      </div>      
    </div>
  
</body>
</html>
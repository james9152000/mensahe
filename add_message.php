<?php
include_once('connection/connection.php');

$con = connection();


if(isset($_POST['send'])){
    $head = $_POST['header'];
    $body = $_POST['body'];
    $category = $_POST['category'];
    $theme = "";
    
    if(strlen($head) == 0 || strlen($body) == 0){
        echo '<script type="text/javascript">';
        echo ' alert("Please complete input")';
        echo '</script>';    
    }else{
        if($category == "Love"){
            $theme = "bg-danger";
        }else if($category == "Friend"){
            $theme = "bg-primary";
        }else if($category == "Family"){
            $theme = "bg-secondary";
        }else{
            $theme = "bg-dark";
        }

        $sql = "INSERT INTO message(Message_head, Message_body, Message_category, Message_theme) VALUES('$head', '$body', '$category', '$theme')";
        $con->query($sql) or die ($con->error);
        echo header("Location: index.php");   
    }



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Message</title>
</head>
<body>
    <a href="index.php" class="btn-back">Back</a>
    <div class="add-form">
        <h3>Message Someone</h3>
        <form action="" method="post">            
            <div class="add-form-item">
               <input type="text" placeholder="Input Header" name="header">
            </div>
            <div class="add-form-item">
              <input type="textarea" placeholder="Indput Message" name="body">
            </div>
            <select name="category" class="add-form-item">
                <option value="Love" name="love">Love</option>
                <option value="Friend" name="friend">Friend</option>
                <option value="Family" name="family">Family</option>
                <option value="Unknown" name="Unknown">Unknown</option>
            </select>   
            <br>         
            <input type="submit" class="add-form-item btn btn-outline-danger" name="send" value="Send">
        </form>
    </div>
    
</body>
</html>
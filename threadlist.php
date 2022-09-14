<?php 
// <!-- Connecting with database --> 
include 'partials/_dbconnect.php' ;

$id = $_GET['catid'];
$sql = "select * from `categories` where category_id=$id";
$result = mysqli_query($conn, $sql);

$cat;
$desc;

while($row = mysqli_fetch_assoc($result)){
    $cat = $row['category_name'];
    $desc = $row['category_description'];
}



echo '<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>';
    include "partials/_header.php";

    echo '<div class="container mx-auto my-3">
        <div class="jumbotron container">
            <h1 class="display-4">Welcome to ' . $cat . ' forums</h1>
            <p class="lead">' . $desc . '</p>
            <hr class="my-4">
            <p>This is the peer to peer forum for sharing knowledge to each other. Don\'t be offensive, abusive or cause harassment. Do not post content that is not safe for work. </p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>';
    $sql = "select * from threads where thread_cat_id=$id";
    $result = mysqli_query($conn, $sql);
    while($row == mysqli_fetch_assoc($result)){
        echo '<div class="container my-4 px-4">
            <h2 class="py-1">Browse Questions</h2>
            <div class="media d-flex mx-3 my-4">
                <img class="mr-3" src="images/user.jpg" width="40px" height="40px" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0"><a href="thread.php">'.$row['thread_title'].'</a></h5>'.$row['thread_desc'].    
                '</div>
            </div>
        </div>';
    }
    include "partials/_footer.php";
    echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>';


?>
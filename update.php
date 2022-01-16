<?php

include 'connect.php';

$id=$_GET['updateid'];

//When updating, show the current information
$sql="select * from `book` where id=$id";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
$id=$row['id'];
$rate = $row['rate'];
$title=$row['title'];
$author=$row['author'];
$price = $row['price'];
$description = $row['description'];

if(isset($_POST['submit'])){
    $title=$_POST['title'];
    $author=$_POST['author'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $rate = $_POST['rate'];
    
    $sql="update `book` set id=$id, title='$title', author='$author', description='$description', price='$price', rate='$rate' where id=$id";
    
    $result=mysqli_query($conn, $sql);
    if($result) {
        header('location:home.php');
    } else {
        die(mysqli_error($conn));
    }
    
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />


    <title>Book Tracker</title>
  </head>
  <body>
    
    <div class="container my-5">
    <p style = "line-height:1.4">
            <button class="btn btn-dark"><a href="home.php" class="text-light">Go back</a></button>
    </p>
    <h2 class="my-5"><i> You got something wrong? Don't worry! You can fix it now!</i></h2>
        <form method="post">
            <!-- Insert the title of the book -->
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="bookTitle" name="title" autocomplete="off" 
                       placeholder="Let me know what the title is..." value=<?php echo $title;?>>
            </div>

            <!-- Insert the author of the book -->
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="bookAuthor" name="author" autocomplete="off" 
                       placeholder="So, who wrote this masterpiece?" value=<?php echo $author;?>>
            </div>

            <!-- Insert description of the book -->
            <!-- Textarea has no value! -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="bookDescription" rows="3" name="description" autocomplete="off" 
                          placeholder="Please, share your thoughts with me..."><?=$description?></textarea>
            </div>

            <!-- Insert the price of the book -->
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="bookPrice" name="price" autocomplete="off" 
                       placeholder="It was pricey, wasn't it?" value=<?php echo $price;?>>
            </div>
            
            <!-- Choose a number to rate the book -->
            <div class="form-group">
                <label for="rate">Rating</label>
                <select class="form-control" id="rate" name="rate">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>

    </body>
</html>
<?php
    include 'connect.php'
?>

<!DOCTYPE html>
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
<body>
    <div class="container">
        <button class="btn btn-info my-5">
            <a href="add_book.php" class="text-light">
                Add book
            </a>
        </button>

        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">№</th>
                <th scope="col">Rating</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>

                <?php

                    $sql="select * from `book`";
                    $result=mysqli_query($conn, $sql);
                    if($result) {
                        while($row=mysqli_fetch_assoc($result)) {
                            $id=$row['id'];
                            $rate = $row['rate'];
                            $title=$row['title'];
                            $author=$row['author'];
                            $price = $row['price'];
                            $description = $row['description'];
                            
                            echo '
                                <tr>
                                    <th scope="row">'.$id.'</th>
                                    <td>'.$rate.'</td>
                                    <td>'.$title.'</td>
                                    <td>'.$author.'</td>
                                    <td>'.$price.'</td>
                                    <td>'.$description.'</td>
                                    <td>
                                    <p style = "line-height:1.4">
                                        <button class="btn btn-success"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
                                    </p>
                                    <p style = "line-height:1.4">
                                        <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                                    </p>
                                    </td>
                                </tr>
                            ';
                        }
                    }
    
                ?>

                <!--<tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                </tr>-->
            </tbody>
        </table>

    </div>
</body>
</html>
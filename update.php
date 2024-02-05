<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management - Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php

    //  DATABASE INCLUDED  
    include("./utils/db_connect.php");


    if (isset($_POST['getBTN'])) {
        $id = $_POST['id'];
        $query = "SELECT * FROM `books_tbl` WHERE `id`='$id'";
        $result = mysqli_query($con, $query);
        $count = mysqli_affected_rows($con);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id =  $row['id'];
                $title =  $row['title'];
                $author =  $row['author'];
                $price =  $row['price'];
                $copies =  $row['copies'];
            }
        } else {
            echo '
            <script>
                alert("Alert! No Records Found... ");
            </script>
        ';
            $id =  "";
            $title =  "";
            $author =  "";
            $price =  "";
            $copies =  "";
        }
    }

    if (isset($_POST['updateBTN'])) {

        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $price = $_POST['price'];
        $copies = $_POST['copies'];

        $query = "UPDATE `books_tbl` SET `title`='$title', `author`='$author', `price`='$price', `copies`='$copies' WHERE `id`='$id' ;";

        $result = mysqli_query($con, $query);
        $count = mysqli_affected_rows($con);

        if ($count > 0) {
            echo '
            <script>
                alert("' . $title . ' Updated From e-Library.");
            </script>
        ';
        } else {
            echo '
            <script>
                alert("Alert! Something went Wrong... ");
            </script>
        ';
        }
    }


    ?>
    <div class="container-fluid " style="max-height: 100vh; max-width: 100%;">
        <a href="index.php"><button type="button" class="btn btn-secondary m-3">BACK TO HOME</button></a>
        <h1 class="text-center pb-2">Edit Books From e-Library</h1>
        <div class="container d-flex align-content-center justify-content-center">


            <form class="border border-1 p-5 rounded" action="" method="post">
                <div class="mb-3" style="width: 100%;">
                    <label for="Book_ID" class="form-label">Book_ID</label>
                    <div class="d-flex">
                        <input class="form-control me-2" value="<?php if (isset($_POST['getBTN'])) {
                                                                    echo $id;
                                                                } ?>" id="Book_ID" name="id" required>
                        <button class="btn btn-outline-primary" name="getBTN" type="submit">Get</button>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="Title" class="form-label">Title</label>
                    <input type="text" class="form-control" value="<?php if (isset($_POST['getBTN'])) {
                                                                        echo $title;
                                                                    } ?>" id="Title" name="title">
                </div>
                <div class="mb-3">
                    <label for="Author" class="form-label">Author</label>
                    <input type="text" class="form-control" value="<?php if (isset($_POST['getBTN'])) {
                                                                        echo $author;
                                                                    } ?>" id="Author" name="author">
                </div>
                <div class="mb-3">
                    <label for="Price" class="form-label">Price</label>
                    <input type="number" class="form-control" value="<?php if (isset($_POST['getBTN'])) {
                                                                            echo $price;
                                                                        } ?>" id="Price" name="price">
                </div>
                <div class="mb-3">
                    <label for="Copies" class="form-label">Copies</label>
                    <input type="number" class="form-control" value="<?php if (isset($_POST['getBTN'])) {
                                                                            echo $copies;
                                                                        } ?>" id="Copies" name="copies">
                </div>
                <div class="container d-flex align-content-center justify-content-center">
                    <button type="submit" name="updateBTN" class="btn  btn-warning align-center">UPDATE THE
                        BOOK</button>
                </div>
            </form>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
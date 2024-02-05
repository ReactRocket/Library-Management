<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management - Add Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php

    //  DATABASE INCLUDED  
    include("./utils/db_connect.php");

    if (isset($_POST['submitBTN'])) {

        $title = $_POST['title'];
        $author = $_POST['author'];
        $price = $_POST['price'];
        $copies = $_POST['copies'];

        $query = "INSERT INTO `books_tbl` (`title`, `author`, `price`, `copies`) VALUES ('$title', '$author', '$price', '$copies');";

        $result = mysqli_query($con, $query);

        if ($result) {
            echo '
                <script>
                    alert("' . $title . ' Added To e-Library.");
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
        <h1 class="text-center pb-5">Add Books To e-Library</h1>
        <div class="container d-flex align-content-center justify-content-center">
            <form class="border border-1 p-5 rounded" action="" method="post">
                <div class="mb-3">
                    <label for="Title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="Title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="Author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="Author" name="author" required>
                </div>
                <div class="mb-3">
                    <label for="Price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="Price" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="Copies" class="form-label">Copies</label>
                    <input type="number" class="form-control" id="Copies" name="copies" required>
                </div>
                <div class="container d-flex align-content-center justify-content-center">
                    <button type="submit" name="submitBTN" class="btn btn-success align-center">ADD THE BOOK</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
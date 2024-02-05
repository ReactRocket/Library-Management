<div class="container-fluid p-5">

    <h1 class="text-center pb-5">Books Available in e-Library</h1>

    <div class="container text-center">
        <div class="row row-cols-3">


            <?php

            //  DATABASE INCLUDED  
            include("./utils/db_connect.php");


            if (isset($_GET['title'])) {

                $title = $_GET['title'];

                $query = "SELECT * FROM `books_tbl` WHERE `title`='$title'";

                $result = mysqli_query($con, $query);
                $count = mysqli_affected_rows($con);

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col mb-5">
                            <div class="card" style="width: 18rem;">
    
                            <img src="https://source.unsplash.com/250x200/?books,' . $row['author'] . '" class="card-img-top" alt="' . $row['title'] . '">
                            <div class="card-body">
                            <h5 class="card-title">' . $row['title'] . '</h5>
                            
                            </div>
                            <ul class="list-group list-group-flush">
                            <li class="list-group-item">Book_ID : ' . $row['id'] . '</li>
                            <li class="list-group-item">Author : ' . $row['author'] . '</li>
                            <li class="list-group-item">Price : ' . $row['price'] . '/-</li>
                            <li class="list-group-item">Copies : ' . $row['copies'] . '</li>
                            </ul>
    
                            </div>
                            </div>
                        ';
                    }
                } else {
                    echo '
                        <div class="card text-center" style="width:100%;">
                        <h5 class="card-header">No Book Found!</h5>
                        <div class="card-body">
                        <h5 class="card-title">Please Add Books To Show...</h5>
                        <p class="card-text">Once you have added books to a show, you can view them by clicking on the "Books" tab on the show page. You can also track your progress by marking books as "Read" or "Currently Reading."</p>
                        <a href="insert.php" class="btn btn-primary">Add New Book</a>
                        </div>
                        </div>
                    ';
                }
            } else {

                $query = "SELECT * FROM `books_tbl` ORDER BY `price` DESC";

                $result = mysqli_query($con, $query);
                $count = mysqli_affected_rows($con);

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col mb-5">
                        <div class="card" style="width: 18rem;">

                        <img src="https://source.unsplash.com/250x200/?books,' . $row['author'] . '" class="card-img-top" alt="' . $row['title'] . '">
                        <div class="card-body">
                        <h5 class="card-title">' . $row['title'] . '</h5>
                        
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item">Book_ID : ' . $row['id'] . '</li>
                        <li class="list-group-item">Author : ' . $row['author'] . '</li>
                        <li class="list-group-item">Price : ' . $row['price'] . '/-</li>
                        <li class="list-group-item">Copies : ' . $row['copies'] . '</li>
                        </ul>

                        </div>
                        </div>
                    ';
                    }
                } else {
                    echo '
                    <div class="card text-center" style="width:100%;">
                    <h5 class="card-header">No Book Found!</h5>
                    <div class="card-body">
                    <h5 class="card-title">Please Add Books To Show...</h5>
                    <p class="card-text">Once you have added books to a show, you can view them by clicking on the "Books" tab on the show page. You can also track your progress by marking books as "Read" or "Currently Reading."</p>
                    <a href="insert.php" class="btn btn-primary">Add New Book</a>
                    </div>
                    </div>
                ';
                }
            }
            ?>

        </div>
    </div>


</div>
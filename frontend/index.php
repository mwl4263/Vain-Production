<?php

// php -S localhost:8000

include("../classes/DB.class.php");

$db = new DB();

$authors = $db->getAuthors();
$books = $db->getBooks();
var_dump($books);


?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>
    <h1 class="text-center">Books</h1>

        <table class="table">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">title</th>
                <th scope="col">description</th>

                <th scope="col">genre_id</th>

                <th scope="col">author_id</th>
                <th scope="col">publisher_id</th>
                <th scope="col">library_id</th>
            </thead>
            <tbody>
                <?php

                foreach ($book as $x) {

                    echo "<tr><td>{$x[0]}</td><td>{$x[1]}</td><td>{$x[2]}</td><td><a class=\"btn btn-primary\" href=\"admin.php?vendelete={$x[0]}\">Delete</a></td><td><a class=\"btn btn-primary\" href=\"admin.php?venedit={$x[0]}\">Edit</a></td></tr>";
                }

                ?>
            </tbody>

        </table>

</body>

</html>
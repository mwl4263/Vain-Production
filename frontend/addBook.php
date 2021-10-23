<?php

    // session_name("loggedIn");
    // session_start();

    // if (!isset($_SESSION["userType"])){
    //     header("Location: login.php");
    // }
    // else {
    //     if (!$_SESSION["userType"] == "admin") {
    //         header("Location: login.php");
    //     }
    // }

?>

<html>
    <head>
        <title>Add Book</title>
    </head>

    <body>

        <h1>Add Book</h1>

        <form style="margin: 0; padding: 0;" method="post">
            <div>
                <label for="title">Book Title:</label>
                <input type="text" id="title" name="title">
            </div>
            
            <br>

            <div>
                <label for="description">Book Description:</label>
                <input type="textarea" id="description" name="description">
            </div>

            <div>
                <!-- Type -->
                <p>Genre:</p>
                    <input type="radio" name="type" id="a" value="A">
                    <label for="a">Autobiography</label><br>

                    <input type="radio" name="type" id="b" value="B">
                    <label for="b">Biography</label><br>

                    <input type="radio" name="type" id="c" value="C">
                    <label for="c">Compilation</label><br>

                    <input type="radio" name="type" id="d" value="d">
                    <label for="d">Diary/Journal</label><br>

                    <input type="radio" name="type" id="f" value="f">
                    <label for="f">Fictional</label><br>

                    <input type="radio" name="type" id="g" value="g">
                    <label for="g">Gallows Broadside</label><br>

                    <input type="radio" name="type" id="l" value="l">
                    <label for="l">Letters/Correspondence</label><br>

                    <input type="radio" name="type" id="m" value="m">
                    <label for="m">Memoir</label><br>
            </div>

            <!-- <br>

            <div>
                <p>Subject:</p>
                    <input type="radio" id="" name="role" value="">
                    <label for=""></label><br>
            </div>

            <br>

            <div>
                <p>Authorship:</p>
                    <input type="radio" id="" name="role" value="">
                    <label for=""></label><br>
            </div> -->

            <br>

            <div>
                <label for="author">Author:</label>
                <input type="textarea" id="author" name="author">
            </div>

            <br>

            <div>
                <label for="publisher">Publisher:</label>
                <input type="textarea" id="publisher" name="publisher">
            </div>

            <br>

            <div>
                <label for="library">Library:</label>
                <input type="textarea" id="library" name="library">
            </div>

            <br>

            <input type="reset">
            <input type="submit" value="Submit">
        </form>
        <br>
    </body>
</html>

<?php

    include_once "../classes/DB.class.php";

    $db = new DB();

    if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['type']) && !empty($_POST['author']) && !empty($_POST['publisher']) && !empty($_POST['library'])){

        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $library = $_POST['library'];

        $db = new DB();
        $addBook = $db -> addBook($title, $description, $genre, $author, $publisher, $library);

        if ($addBook == true) {
            echo '<script>alert("Book Add Success! You Will Be Returned To The Dashboard!")</script>';
            header("Location: index.php");
        }
        else {
            echo '<script>alert("Bad Add")</script>';
        }

    }
    else {
        echo '<script>alert("Empty")</script>';
    }

?>
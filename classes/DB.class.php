<?php
    class DB {
        public $dbh;

        function __construct(){
            $this->dbh = mysqli_connect("localhost", "root", "JumboB3AN!", "vain");
            if($this->dbh->connect_error){
                die("Connection failed: " . $this->dbh->connect_error);
            }
            echo "Connected successfully";
        }//end constructor

        //thoughts
            //what are we displaying? is it just a list of the books n their info??
            //getting ids/how are things being displayed/stored?

// -------------- READ -------------------------------------------------------------------------------------------------------

        function getAuthors() {
            $data = array();
            $stmt = mysqli_prepare($this->dbh, "SELECT author_id, name FROM author");
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_all($result)){
               $data = $row;
            }//end if
            return $data;
        }//end getAuthors

        function getBooks() {
            //update to have joins to display better
            $data = array();
            $stmt = $this->dbh->prepare("SELECT book_id, title, description, genre_id, author_id, publisher_id, library_id FROM book");
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_all($result)) {
                $data = $row;
            }//end if
            return $data;
        }//end getBooks

// -------------- CREATE -------------------------------------------------------------------------------------------------------

        function addAuthor($name) {
            $stmt = $this->dbh->prepare("INSERT INTO author(name) VALUES(:name)");
            $stmt->bind_param("s",$name);
            mysqli_stmt_execute($stmt);
        }//end addAuthor

        function addBook($title,$description,$genre, $author, $publisher, $library) {
            $this->dbh->addGenre($genre);
            $stmt = $this->dbh->prepare("INSERT INTO book(title,description,genre_id,author_id,publisher_id,library_id) VALUES(:title,:description,:genre_id,:author_id,:publisher_id,:library_id)");
            $stmt->bind_param("sssssss",$title,$description,$genre,$author,$publisher,$library);
            mysqli_stmt_execute($stmt);
        }//end addBook

        function addGenre($genre_type) {
            $stmt = $this->dbh->prepare("INSERT INTO genres(genre_id,genre_type) VALUES(DEFAULT,:genre_type)");
            $stmt->bind_param("s",$genre_type);
            mysqli_stmt_execute($stmt);
        }//end addGenre

        function addLibrary($name,$country,$state,$street,$zip,$owner,$url) {
            $stmt = $this->dbh->prepare("INSERT INTO library(library_id,name,country,state,street,zip,owner,url) VALUES(DEFAULT,:name,:country,:state,:street,:zip,:owner,:url)");
            $stmt->bind_param("sssssss",$name,$country,$state,$street,$zip,$owner,$url);
            mysqli_stmt_execute($stmt);
        }//end addLibrary

        function addPublisher($publisher_name,$location,$notes) {
            $stmt = $this->dbh->prepare("INSERT INTO publisher(publisher_id,publisher_name,location,notes) VALUES(DEFAULT,:publisher_name,:location,:notes)");
            $stmt->bind_param("sss",$publisher_name,$location,$notes);
            mysqli_stmt_execute($stmt);
        }//end addPublisher

        function addUser($first_name, $last_name, $password, $email, $type) {
            //get type id??
            //hash password (before method?)
            $stmt = $this->dbh->prepare("INSERT INTO users(user_id,first_name,last_name, password, email, type_id) VALUES(DEFAULT,:first_name,:last_name,:password,:email,:type_id)");
            $stmt->bind_param("sssss",$first_name,$last_name,$password,$email,$type);
            mysqli_stmt_execute($stmt);
        }//end addUser

// -------------- UPDATE -------------------------------------------------------------------------------------------------------


// -------------- DELETE -------------------------------------------------------------------------------------------------------


    }//end class DB
?>
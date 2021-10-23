<?php
    class Book {
        private $book_id;
        private $title;
        private $description;
        private $genre_id;
        private $author_id;
        private $publisher_id;
        private $library_id;

        function __construct($book_id,$title,$description,$genre_id,$author_id,$publisher_id,$library_id) {
            $this->book_id = $book_id;
            $this->title = $title;
            $this->description = $description;
            $this->genre_id = $genre_id;
            $this->author_id = $author_id;
            $this->publisher_id = $publisher_id;
            $this->library_id = $library_id;
        }
    }
?>
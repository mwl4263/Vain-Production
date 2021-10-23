<?php
    class Author {
        private $author_id;
        private $author_name;

        function __construct($author_id, $author_name) {
           $this->author_id = $author_id; 
           $this->author_name = $author_name;
        }

        // function getId() { return $this->author_id; }
    }
?>
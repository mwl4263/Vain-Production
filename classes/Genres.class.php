<?php
    class Genres {
        private $genre_id;
        private $genre_type;

        function __construct($genre_id,$genre_type) {
            $this->genre_id = $genre_id;
            $this->genre_type = $genre_type;
        }
    }
?>
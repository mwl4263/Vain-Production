<?php
    class Publisher {
        private $publisher_id;
        private $publisher_name;
        private $location;
        private $notes;

        function __construct($publisher_id, $publisher_name, $location, $notes) {
            $this->publisher_id = $publisher_id;
            $this->publisher_name = $publisher_name;
            $this->location = $location;
            $this->notes = $notes;
        }
    }//end class
?>
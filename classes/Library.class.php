<?php 
    class Library {
        private $library_id;
        private $name;
        private $country;
        private $state;
        private $street;
        private $zip;
        private $owner;
        private $url;

        function __construct($library_id,$name,$country,$state,$street,$zip,$owner,$url){
            $this->library_id = $library_id;
            $this->name = $name;
            $this->country = $country;
            $this->state = $state;
            $this->street = $street;
            $this->zip = $zip;
            $this->owner = $owner;
            $this->url = $url;
        }
    }//end class
?>
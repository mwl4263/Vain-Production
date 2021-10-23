<?php
    class UserTypes { 
        private $type_id;
        private $type_description;

        function __construct($type_id,$type_description) {
            $this->type_id = $type_id;
            $this->type_description = $type_description;
        }
    }
?>
<?php
    class Users {
        private $user_id;
        private $first_name;
        private $last_name;
        private $password;
        private $email;
        private $type_id;
        

        function __construct($user_id,$first_name, $last_name, $password, $email, $type_id){
            $this->user_id = $user_id;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->password = $password;
            $this->email = $email;
            $this->type_id = $type_id;
        }
    }//end class
?>
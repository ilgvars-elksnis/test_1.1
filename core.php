<?php

    class Database
    {
        private $servername = "localhost";
        private $username 	= "root";
        private $password 	= "";
        private $database 	= "test";
        public $con;
        public $registrationTable = "registration";


        // Database Connection
        public function __construct()
        {
            $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
            if (mysqli_connect_error()) {
                trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
            } else {
                return $this->con;
            }
        }

        // Insert item data into item table
        public function insertData($email, $date)
        {
            $query="INSERT INTO $this->registrationTable (emails, date) VALUES('$email','$date')";
            
            $sql = $this->con->query($query);

            if ($sql) {
                return true;
            } else {
                return false;
            }
        }

        // Fetch item records for show listing
        public function displayData($query)
        {
            $result = $this->con->query($query);
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_array()) {
                    $data[] = $row;
                }
                return $data;
            } else {
                echo "No found records";
            }
        }
    
        // Delete item data from item table
        public function deleteRecord($id)
        {
            $query = "DELETE FROM $this->registrationTable WHERE id = '$id'";
            $sql = $this->con->query($query);
            if ($sql==true) {
                header("Location:database.php");
            } else {
                echo "Record failed to delete, try again";
            }
        }

        
    }

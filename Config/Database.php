<?php
    // class Database{
    //     //DB paramters
    //     private $host = 'localhost';
    //     private $db_name = 'cdws';
    //     private $username = 'root';
    //     private $pass = '';
    //     private $conn;

    //     //DB connect
    //     public function connect(){
    //         $this->conn = null;
    //         try{
    //             $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name,
    //             $this->username);
    //             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         }catch(PDOException $e){
    //             echo 'connection error' . $e->getMessage();
    //         }
    //         return $this->conn;
    //     }

    // }

    $conn = mysqli_connect('localhost','root','','cdws');
    if(mysqli_connect_errno()){
        //connection failed
        echo 'failed to connect to mysql' . mysqli_connect_errno();
    }
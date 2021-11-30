<?php
    class Post{
        //DB stuff
        private $conn;
        private $table = 'persons';
        public $id;
        public $category_id;
        public $category_name;
        public $title;
        public $body;
        public $author;
        public $created_at;

        //Constructor with DB
        public function __construct($db){
            $this->conn = $db;
        }

        //Get Posts
        public function read(){
            //Create query
                $query = 'SELECT
                    p.ssn,
                    p.name,
                    f.name,
                    f.foundationId,
                    f.licenceid,
                    f.idNumberRoom,
                    f.place,
                    a.state,
                    auth.phone as authorize_phone,
                    auth.idNumber as idMember,
                    p.phone,
                    p.email,
                    p.adjId,
                    p.ssnVisitor,
                    p.approven
                    FROM persons p
                    left JOIN
                    foundation f ON p.ssn = f.ssnPerson
                    
                    LEFT JOIN 
                    adj_id a ON a.id = p.adjId
                    LEFT JOIN
                    authorize auth ON auth.ssn = p.ssnVisitor
                    ';
                    
            //Prepare Statment
            $stmt = $this->conn->prepare($query);


            //Excute Query
            $stmt->excute();
            
            return $stmt;
        }
    }


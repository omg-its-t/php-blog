<?php
    class Post{
        private $conn;
        private $table = 'posts';

        public $id;
        public $category_id;
        public $category_name;
        public $title;
        public $body;
        public $author;
        public $created_at;

        //constructor - when new post is instantiated this will run and pass in the DBO
        public function __construct($db){
            //set class connection to the DB
            $this->conn = $db;
        }

        //method to read posts
        public function read(){
            $query = 'SELECT c.name as category_name, 
                             p.id,
                             p.category_name,
                             p.title,
                             p.body,
                             p.author,
                             p.created_at
                    FROM
                            '.
                            $this->table. 'p LEFT JOIN c ON p.category_id = c.id ORDER BY p.created_at DESC';

        // prepate statement
        $stmt = $this->conn->prepate($query);

        //execute statement
        $stmt->execute();

        return $stmt;
        }
    }
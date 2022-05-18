<?php
    // the modothe will use this file to accsses to db
    /*
        *PDO Database Class
        *Connect To Database
        *Create Prepared Statements
        *Bind Values
        *Return Rows and Results
    */

    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $db_name = DB_NAME;

        private $dbHandler;
        private $stmt;
        private $error;

        public function __construct(){
            //Set DNS
            $DNS = 'mysql:host='.$this->host.';dbname='.$this->db_name;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //Create PDO instance
            try{
                $this->dbHandler = new PDO($DNS, $this->user, $this->pass, $options);
            }catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        // Prepare stmt with query
        public function query($sql) {
            $this->stmt = $this->dbHandler->prepare($sql);
        }

        //Bind Values
        public function bindValues ($param, $value, $type = null) {
            if(is_null($type)){
                switch(true){
                    case is_int($value) : 
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value) : 
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value) : 
                        $type = PDO::PARAM_NULL;
                        break;
                    default :
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValues($param, $value, $type);
        }

        //Execute the prepared stmt
        public function execute(){
            return $this->stmt->execute();
        }
        
        //Get result Set as Array of Object
        public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // single record as object
        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        //Get rowCount
        public function rowCount(){
            return $this->stmt->rowCount();
        }
    }
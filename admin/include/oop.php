<?php
class Ecommerce {
    private $dbHost     = "localhost"; 
    private $dbUsername = "root"; 
    private $dbPassword = ""; 
    private $dbName     = "phpecomerce"; 
    private $conn;

    public function __construct() { 
        try { 
            $this->conn = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch (PDOException $e) { 
            die("Failed to connect with MySQL: " . $e->getMessage()); 
        } 
    }

    public function getConnection() {
        return $this->conn;
    }

    public function getdata($table){

        $sql = "select * from $table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }

    public function insertdata($table,$data){

      
       
        $columnString = implode(',', array_keys($data)); 
        
        $valueString = ":".implode(',:', array_keys($data)); 
        $sql = "INSERT INTO $table ($columnString) value ($valueString)";
        $stmt = $this->conn->prepare($sql);
        foreach($data as $key=>$val){ 
            $stmt->bindValue(':'.$key, $val); 
       } 
        $stmt->execute();
        
        return $stmt;

    }

    public function getdatabyid($table ,$field,$id){
        $sql = "SELECT * FROM $table WHERE $field = $id";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updatedata($table, $data, $id) {
        $sql = "UPDATE $table SET ";
        $fields = [];
    
        foreach ($data as $key => $value) {
            $fields[] = "$key = :$key";
        }
    
        $sql .= implode(", ", $fields) . " WHERE id = :id";
    
        $stmt = $this->conn->prepare($sql);
        
        // Bind values
        foreach ($data as $key => &$value) {
            $stmt->bindParam(":$key", $value);
        }
        
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    
        $stmt->execute();
        return $stmt;
    }
    

    public function deletedata($table,$id){

        $sql = "DELETE from $table where id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt;
      
        return $result;
        
    }

}
?>

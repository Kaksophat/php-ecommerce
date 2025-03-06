<?php
class Ecommerce {
    private $dbHost     = "localhost"; 
    private $dbUsername = "root"; 
    private $dbPassword = ""; 
    private $dbName     = "phpecommerce"; 
    protected $conn;

    public function __construct() { 
        try { 
            $this->conn = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch (PDOException $e) { 
            die("404 not found " . $e->getMessage()); 
        } 
    }

   public function getconn(){
         return $this->conn;
    
   }

    public function getdata($table){

        $sql = "SELECT * from $table";
      
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }

    public function insertdata($table ,$data,){ 
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

    public function getdatabyid($table, $field, $value = "", $clause = "", $fetch = "single") {
        $sql = "SELECT * FROM $table WHERE $field = :value";
        
        if (!empty($clause)) {
            $sql .= " " . $clause;
        }
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":value", $value);
        $stmt->execute();
    
        if ($fetch === "all") {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
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

class Auth extends Ecommerce {
   
    public function login($email, $password) {
      
        $result = $this->getdatabyid('user', 'email', $email);
      


        // if ($result && password_verify($password, $result['password'])) {
            session_start();
            $_SESSION['id'] = $result['id'];
            $_SESSION['email'] = $email;
            header('location: ./index.php');
            exit;
        // } else {
        //     header('location: ./login.php');
        // }
    }
    public function register($data,$table){
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $result = $this->insertdata($table, $data);
        return $result;
    }
    public function logout(){
        session_destroy();
        session_unset();
    }
    public function check(){
        if(isset($_SESSION['id'])){
            return true;
        }else{
            return false;
        }
    }
    public function user($id){
        $result = $this->getdatabyid('user', 'id', $id);
    
        return $result;
    }

}
   

?>

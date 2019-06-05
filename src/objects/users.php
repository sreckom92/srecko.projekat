<?php
class Users{

    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $password;
    public $task;

    public function __construct($db){
        $this->conn = $db;
    }
 
    function createUsers(){
 
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    username=:username, password=:password, task=:task";
 
        $stmt = $this->conn->prepare($query);
 
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->task=htmlspecialchars(strip_tags($this->task));

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":task", $this->task);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    function readUsers($from_record_num, $records_per_page){
 
    $query = "SELECT
                id, username, task
            FROM
                " . $this->table_name . "
            ORDER BY
                username ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
}

	function updateUsers(){
 
    $query = "UPDATE
                " . $this->table_name . "
            SET
                username = :username, password = :password, task = :task

            WHERE
                id = :id";
 
    $stmt = $this->conn->prepare($query);

    $this->username=htmlspecialchars(strip_tags($this->username));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->task=htmlspecialchars(strip_tags($this->task));

    $this->id=htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(':username', $this->username);
    $stmt->bindParam(':password', $this->password);
    $stmt->bindParam(':task', $this->task);

    $stmt->bindParam(':id', $this->id);

    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
	function readOne(){
 
    $query = "SELECT
                username, task
            FROM
                " . $this->table_name . "
            WHERE
                id = ?
            LIMIT
                0,1";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    $this->username = $row['username'];
    $this->task = $row['task'];
 
}
    public function countAll(){
 
    $query = "SELECT id FROM " . $this->table_name . "";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    $num = $stmt->rowCount();
 
    return $num;
}

	 function deleteUsers($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = $id ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    function readAll($from_record_num, $records_per_page){
 
    $query = "SELECT
                id, username, task
            FROM
                " . $this->table_name . "
            ORDER BY
                name ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
}
}
?>
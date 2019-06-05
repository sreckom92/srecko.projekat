<?php
class Clients{

    private $conn;
    private $table_name = "clients";

    public $id;
    public $username;
    public $password;
    public $project;

    public function __construct($db){
        $this->conn = $db;
    }
 
      function createClients(){
 
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    username=:username, password=:password, project=:project";
 
        $stmt = $this->conn->prepare($query);
 
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->task=htmlspecialchars(strip_tags($this->project));

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":project", $this->project);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    function readClients($from_record_num, $records_per_page){
 
    $query = "SELECT
                id, username, project
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

    function updateClients(){
 
    $query = "UPDATE
                " . $this->table_name . "
            SET
                username = :username, password = :password, project = :project

            WHERE
                id = :id";
 
    $stmt = $this->conn->prepare($query);

    $this->username=htmlspecialchars(strip_tags($this->username));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->project=htmlspecialchars(strip_tags($this->project));

    $this->id=htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(':username', $this->username);
    $stmt->bindParam(':password', $this->password);
    $stmt->bindParam(':project', $this->project);

    $stmt->bindParam(':id', $this->id);

    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
     function readOne(){
 
    $query = "SELECT
                username, project
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
    $this->project = $row['project'];
 
}
    public function countAll(){
 
    $query = "SELECT id FROM " . $this->table_name . "";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    $num = $stmt->rowCount();
 
    return $num;
}

   function deleteClients($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = $id ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

}
?>
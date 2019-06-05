<?php
class Tasks{

    private $conn;
    private $table_name = "tasks";

    public $id;
    public $task_name;
    public $task_desc;

    public function __construct($db){
        $this->conn = $db;
    }
 
    function createTasks(){
 
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    task_name=:task_name, task_desc=:task_desc" ;
 
        $stmt = $this->conn->prepare($query);
 
        $this->task_name=htmlspecialchars(strip_tags($this->task_name));
        $this->task_desc=htmlspecialchars(strip_tags($this->task_desc));

        $stmt->bindParam(":task_name", $this->task_name);
        $stmt->bindParam(":task_desc", $this->task_desc);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    function readTasks($from_record_num, $records_per_page){
 
    $query = "SELECT
                id, task_name, task_desc
            FROM
                " . $this->table_name . "
            ORDER BY
                task_name ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
}

	function updateTasks(){
 
    $query = "UPDATE
                " . $this->table_name . "
            SET
                task_name = :task_name, task_desc = :task_desc

            WHERE
                id = :id";
 
    $stmt = $this->conn->prepare($query);

    $this->task_name=htmlspecialchars(strip_tags($this->task_name));
    $this->task_desc=htmlspecialchars(strip_tags($this->task_desc));


    $this->id=htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(':task_name', $this->task_name);
    $stmt->bindParam(':task_desc', $this->task_desc);

    $stmt->bindParam(':id', $this->id);

    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
	 function readOne(){
 
    $query = "SELECT
                task_name, task_desc
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
 
    $this->task_name = $row['task_name'];
    $this->task_desc = $row['task_desc'];
 
}
    public function countAll(){
 
    $query = "SELECT id FROM " . $this->table_name . "";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    $num = $stmt->rowCount();
 
    return $num;
}

	function deleteTasks($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = $id ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

}
?>
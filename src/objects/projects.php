<?php
class Projects{

    private $conn;
    private $table_name = "projects";

    public $id;
    public $project_name;
    public $project_desc;

    public function __construct($db){
        $this->conn = $db;
    }
 
    function createProjects(){
 
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    project_name=:project_name, project_desc=:project_desc" ;
 
        $stmt = $this->conn->prepare($query);
 
        $this->project_name=htmlspecialchars(strip_tags($this->project_name));
        $this->project_desc=htmlspecialchars(strip_tags($this->project_desc));

        $stmt->bindParam(":project_name", $this->project_name);
        $stmt->bindParam(":project_desc", $this->project_desc);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    function readProjects($from_record_num, $records_per_page){
 
    $query = "SELECT
                id, project_name, project_desc
            FROM
                " . $this->table_name . "
            ORDER BY
                project_name ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
}

	function updateProjects(){
 
    $query = "UPDATE
                " . $this->table_name . "
            SET
                project_name = :project_name, project_desc = :project_desc

            WHERE
                id = :id";
 
    $stmt = $this->conn->prepare($query);

    $this->project_name=htmlspecialchars(strip_tags($this->project_name));
    $this->project_desc=htmlspecialchars(strip_tags($this->project_desc));


    $this->id=htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(':project_name', $this->project_name);
    $stmt->bindParam(':project_desc', $this->project_desc);

    $stmt->bindParam(':id', $this->id);

    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
	 function readOne(){
 
    $query = "SELECT
                project_name, project_desc
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
 
    $this->project_name = $row['project_name'];
    $this->project_desc = $row['project_desc'];
 
}
    public function countAll(){
 
    $query = "SELECT id FROM " . $this->table_name . "";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    $num = $stmt->rowCount();
 
    return $num;
}

	function deleteProjects($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = $id ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

}
?>
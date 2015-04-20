<?php
require_once 'data/Connection.php';

class Assignment{

	private $time_limit;
	private $name;
	private $description;
	private $materia;
	
	function __construct($id){
		$connection 		= Connection::getInstance();
		$anAssignmentData 	= $connection->query("SELECT * FROM assignments WHERE id = $id");
		
		while ($aRow = pg_fetch_assoc($anAssignmentData)){
			$this->time_limit  	= $aRow['time_limit'];
			$this->name 	    = $aRow['name'];
			$this->description  = $aRow['description'];
			$this->materia	 	= $aRow['subject_id'];
		}
	}
	
	public function printTime(){
		echo $this->name;
		echo $this->time_limit."---<br>";
		echo date("Y-m-d H:i:s")."<br>";
	}
		
}

?>
<?php
//psql -U postgres -W -h localhost calendario_tareas
// el password sigue siendo cronos :)
// /etc/php5/apache2/php.ini -> archivo de configuracion
//drop database calendario_tareas;
//create database calendario_tareas;
//\c calendario_tareas; -> \i /home/ubuntu/workspace/model/data/db.sql
// para clonar:
// cd /home/ubuntu
// git clone https://github.com/diego-gabriel/procesos_agiles.git
// mv procesos_agiles/ workspace

class Connection
{
  private static $instance;
  private $connection;
  
  private function __construct()
  {
    $cadena = "host='localhost' port='5432' dbname='calendario_tareas' user = 'postgres' password = 'cronos'";
    $this->connection = pg_connect ($cadena) or die ('Error de conexión. Póngase en contacto con el administrador');
  }
  
  
  
  public static function getInstance(){
     
  	if (!isset(self::$instance))
  	  self::$instance = new Connection();
  		
  	return self::$instance;
  }
  
  public function query($aQuery){
   // echo "$aQuery<br>";
    return pg_query($this->connection, $aQuery);
  }
  
}

?>

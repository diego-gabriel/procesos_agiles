<?php
class Conectar
{
protected function con()
    {
        $cadena="host='localhost' port='5432' dbname='prueba' user ='postgres' password='cronos'";
        $con = pg_connect ($cadena) or die ('Error de conexión. Póngase en contacto con el administrador');
        return $con;
    }
    public function get_estudiantes()
     {
        
        $sql="select * from estudiantes";
        $res=pg_query(Conectar::con(),$sql);
        echo "se conecto bn";
        while($reg=pg_fetch_assoc($res))
        {
            $t[]=$reg;
        }
            return $t;
     }
     public function get_consulta()
     {
        
        $sql="CREATE TABLE cliente (
  cod_cliente int(11) );";
        $res=pg_query(Conectar::con(),$sql);
        
     }
}
?>
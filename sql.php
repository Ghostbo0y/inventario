<?php
class sql
{
    public $conn;
    private  $user = "root";
    private $pass = "";
    private $serv = "localhost";
    private $db = "prueba1204";

    public function __construct()
    {
        $charset = "utf8mb4";

            try{
                $dataSourceName = "mysql:host=".$this->serv.";dbname=".$this->db.";charset=".$charset;
                
                $this->conn = new PDO($dataSourceName, $this->user, $this->pass);

                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }catch(PDOException $ex){
                die("PDO Connection Error " . $ex->getMessage());
            }
    }

    public function ejecutar($sql)
    {
        //echo $sql ."<br>";
        $result = $this->conn->query($sql);
        return $result;
    }
}
?>
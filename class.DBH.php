
<?php
//example
class DBH
{
    public
        $tablename
    ;
    protected
        $db_instance
    ;
    private
        $db_user
       ,$db_pass
       ,$db_name
       ,$db_host = 'localhost'
    ; 
    //public function DBH()
    public function __construct($dbUser,$dbPass, $dbName, $dbHost = 'localhost')
    {
        $this->db_user = $dbUser;   
        $this->db_pass = $dbPass;   
        $this->db_host = $dbHost;   
        $this->db_name = $dbName;   
        if(!isset($this->db_instance))
        {
            try
            {
                $this->db_instance = 
                    new PDO(PDO_DSN, $this->db_user,$this->db_pass,
        array(PDO::ATTR_PERSISTENT => TRUE, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            }
            catch(Exception $e)
            {
                return $e;
            }
        }
        
    }
    public function __destruct()
    {
        $this->db_instance = null;
    }
    
    public function GetAll($table)
    {
        $pdo = $this->db_instance;
         $statement_handler = $pdo->prepare('SET NAMES UTF8; ' .$sqlQuery);

      return $statement_handler->execute();
    }
    public function GetRowByID($table, $ID){}
    public function DeleteRowByID($table, $ID){}
    
    
  
}

?>

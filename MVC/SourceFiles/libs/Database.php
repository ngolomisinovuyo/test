<?php
class Database extends PDO{

    public function __construct($DB_TYPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASSWORD) {
        parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME,$DB_USER,$DB_PASSWORD);
    }
    /**
     * 
     * @param string $sql stored procedure or sql statement to be executed
     * @param array object $params parameters columns to select
     * @param int $fetch_mode PDO fetch mode
     * @return array of arrays mixed values 
     */
    public function select($sql,$params = array(),$fetch_mode = PDO::FETCH_ASSOC) 
    {
        $smt=$this->prepare($sql);
          
        foreach ($params as $key => $value) 
        {
          
           $smt->bindValue(":$key", $value);
        }
        $smt->execute();
        return $smt->fetchAll($fetch_mode);
    }
    /**
     * selectRow
     * @param string $sql
     * @param array $params
     * @param int $fetch_mode
     * @return array
     */
    public function selectRow($sql,$params = array(),$fetch_mode = PDO::FETCH_ASSOC) 
    {
        $smt=$this->prepare($sql);
          
        foreach ($params as $key => $value) 
        {
          
           $smt->bindValue(":$key", $value);
        }
        $smt->execute();
        return $smt->fetch($fetch_mode);
    }
    /**
     * insert
     * @param string $table name of table to insert data into
     * @param array $data the actual data
     */
    public function insert($table,$data) 
    {
       // ksort($data);
        
        $field_names = null;
        $value_names = null;
        $field_names = implode('`, `', array_keys($data));
        $value_names = ':'.implode(', :', array_keys($data));
       
//       echo "INSERT INTO $table 
//            (`$field_names`) 
//             VALUES 
//             ($value_names)";
//       die();
        $smt=$this->prepare("INSERT INTO $table 
            (`$field_names`) 
             VALUES 
             ($value_names)");
        
        foreach ($data as $key => $value) 
        {
            //echo ":$key=$value <br/>";
           $smt->bindValue(":$key", $value);
           
        }
      
        $smt->execute();
        
        
    }
    
    
    /**
     * update
     * @param string $table name of table to update
     * @param array $data actual data
     * @param string $where row to update
     */
    public function update($table,$data,$where)
    {
        ksort($data);
        
        $field_details = null;
       
        foreach ($data as $key => $value) 
        {
          $field_details .="`$key` =:$key,";
        }
        $field_details = rtrim($field_details,',');
        
        $smt=$this->prepare("UPDATE  $table 
                            SET $field_details
                            WHERE
                            $where");
        
        foreach ($data as $key => $value) 
        {
           //echo ":$key=$value <br/>";
           $smt->bindValue(":$key", $value);
        }
       
        $smt->execute();
       
    }
    /**
     * delete
     * @param string $table
     * @param string $where
     * @param int $limit
     * @return int number of affected rows
     */
    public function delete($table,$where, $limit=1) 
    {
        //echo "DELETE FROM $table WHERE $where LIMIT $limit";
        //die();
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }
}



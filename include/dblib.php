<?php
//ini_set('display_errors', 1);
require_once(__DIR__.'/dbconn.php');
class dbmethods {
    private $db;// = Database::getInstance();
    private $link = null;
    private $connglopal;// = $db->getConnection();
    public function __construct() {
        $this->db = Database::getInstance();
        $this->link = $this->db->getConnection();
    }
/*    public function ViewUsers(){
        $conn=$this->connglopal;
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {$return=$result;}else {$return=0;}
    //$conn->close();
        return $return;
    }*/
// Class :  (db) is a class that deals with the database
    /*public function db() {
       global $host, $username, $password, $database;
        $this->link = mysqli_connect($host, $username, $password) or die("Could not connect. " . mysqli_error($this->link));
        mysqli_select_db($this->link, $database) or die("Could not select database. " . mysqli_error($this->link));
    }*/

    /* ================================================================================================= */
    /*
      Function:     (select) this function is used to return fields from a table with a condidtion.
      Input:        ($table) the table needed to load data from.
      ($outFields) the output fields from the table.
      ($condition) the condidtion of the ouput fields.
      Output:   ($data) an array of the needed fields from the input table.
     */
    public function select($table, $outFields = array(), $condition = "") {
        $outFieldsSql = "";
        $data = array();
        if (empty($outFields)) {
            $outFieldsSql = "*";
        } else {
            $outFieldsSql = implode($outFields, " , ");
        }

        if ($condition == "")
            $condition = "'1' = '1'";
        echo $sql = "SELECT " . $outFieldsSql . " FROM " . $table . " WHERE " . $condition;
        $result = mysqli_query($this->link, $sql);
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            mysqli_free_result($result);
        }
        //print_r($data);
        return $data;
    }
    /* ================================================================================================= */
    /*
      Function:     (add) this function is used to insert values in a fields of a table.
      Input:        ($table) the table needed to insert data into.
      ($inFields) the array contains the input fields of the table as index of this array and the input value to the table as the value of this array.
      Output:   (true) or (false).
     */
    public function add($table = "", $inFields = array()) {
        if ($table == "" || empty($inFields))
            return false;
        $indexArray = array();
        $valueArray = array();
        if (!empty($inFields)) {
            foreach ($inFields as $index => $value) {
                $indexArray[] = $index;
                $valueArray[] = mysqli_real_escape_string($this->link, $value);
            }
        }
        $inFieldsSql = "(" . implode($indexArray, ",") . ")";
        $inValuesSql = "('" . implode($valueArray, "','") . "')";
        $sql = "INSERT INTO " . $table . " " . $inFieldsSql . " VALUES " . $inValuesSql;
        
        //echo $sql;
        $result = mysqli_query($this->link, $sql);
         //   printf("Errormessage: %s\n", mysqli_error($this->link));

        return $result;
    }

public function addId($table = "", $inFields = array()) {
        if ($table == "" || empty($inFields))
            return false;
        $indexArray = array();
        $valueArray = array();
        if (!empty($inFields)) {
            foreach ($inFields as $index => $value) {
                $indexArray[] = $index;
                $valueArray[] = mysqli_real_escape_string($this->link, $value);
            }
        }
        $inFieldsSql = "(" . implode($indexArray, ",") . ")";
        $inValuesSql = "('" . implode($valueArray, "','") . "')";
        $sql = "INSERT INTO " . $table . " " . $inFieldsSql . " VALUES " . $inValuesSql;
        
        //echo $sql;
        $result = mysqli_query($this->link, $sql);
         //   printf("Errormessage: %s\n", mysqli_error($this->link));
           
        return mysqli_insert_id($this->link);
    }


    /* =================================================================================================     */
    /*
      Function:     (edit) this function is used to edit values of fields of a table.
      Input:        ($table) the table needed to edit its data.
      ($editFields) the array contains the edit fields of the table as index of this array and the edited values to the table as the value of this array.
      Output:   (true) or (false).
     */
    public function edit($table = "", $editFields = array(), $condition = "") {
        if ($table == "" || empty($editFields))
            return flase;
        $editFieldsSql = "";
        $editFieldsArray = array();

        if (!empty($editFields)) {
            foreach ($editFields as $index => $value) {
                $editFieldsArray[] = $index . " = '" . mysqli_real_escape_string($this->link, $value) . "'";
            }
            $editFieldsSql = implode($editFieldsArray, ",");
        }
        $sql = "UPDATE " . $table . " SET " . $editFieldsSql . " WHERE " . $condition;
        
        $result = mysqli_query($this->link, $sql);
        return $result;
    }

    /* ================================================================================================= */
    /*
      Function:     (delete) this function is used to delete values from a table.
      Input:        ($table) the table needed to delete values from.
      ($condition) the condition needed for the delete.
      Output:   (true) or (false).
     */
    public function delete($table = "", $condition = "") {
        if ($table == "")
            return false;
        $sql = "DELETE FROM " . $table . " WHERE " . $condition . "";
        $result = mysqli_query($this->link, $sql);
        return $result;
    }
    public function query($query) {
        $data='';
        $sql = $query;
        $result = mysqli_query($this->link, $sql);
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            mysqli_free_result($result);
        }
        //print_r($data);
        return $data;
    }
    public function query_row($query) {
        $sql = $query;
        $result = mysqli_query($this->link, $sql);
        if ($result) {
            $row = mysqli_fetch_array($result);
            mysqli_free_result($result);
        }
        return $row;
    }
    public function queryId($query) {
        $sql = $query;
        $result = mysqli_query($this->link, $sql);
        echo mysqli_insert_id($this->link);
        return mysqli_insert_id($this->link);
    }
}
?>

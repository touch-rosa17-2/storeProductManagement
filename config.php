<?php
    class configClass{
        function link(){
            $connect = mysqli_connect("localhost","root","","db_product_management");
            return $connect;
        }
        function insert($table,$field,$value)
        {
            $count = count($field);
            $sql   = "INSERT INTO $table(";

            //loop to count field
            for($i = 0;$i<$count;$i++){
                if($i==($count-1)){
                    $sql .= $field[$i].")";
                }
                else{
                    $sql .= $field[$i].",";
                }
            }
            //value
            $sql .= "VALUES(";
            for($i=0;$i<$count;$i++){
                if($i == ($count-1)){
                    $sql .= $value[$i].")";//if no close ) 
                }
                else{
                    $sql .= $value[$i].",";
                }
            }
            return $this -> link() -> query($sql);
        }
        //output function
        function display($table){
            $sql = "SELECT * FROM $table";

            return $this->link()->query($sql);
        }
        // update function
        function update_1condition($table, $field, $value, $condition_field, $condition_value)
        {
            $sql = "UPDATE $table SET ";
            $count = count($field);
            for($i=0;$i<$count;$i++){ 
                if($i==($count-1)){
                    $sql .= $field[$i]."=".$value[$i];

                }

                else{
                    $sql .= $field[$i]."=".$value[$i].",";
                }
            }
            $sql .= " WHERE $condition_field = $condition_value";
            // echo $sql;
            return $this -> link() -> query($sql);
        }
        // Delete function
        function deleteCategory($table, $attribute, $value)
        {
            $sql = "DELETE FROM $table WHERE $attribute = $value";
            return $this->link()->query($sql);
        }
    }
?>
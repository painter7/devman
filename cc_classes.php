<?php

//DB connection.
require("dbconn.php");


    /**
    * 
    */
    class DevRoom
    {
        public $roomname,$shelfrows,$shelfcols,$devsum;        

        function __construct($roomname,$shelfrows,$shelfcols)
        {
            $this->roomname=$roomname;
            $this->shelfrows=$shelfrows;
            $this->shelfcols=$shelfcols;
            $this->devsum=0;
        }

        function insertRoomInfo()
        {
            $query="INSERT INTO device_room SET id=:id,adddate=:adddate,roomname=:roomname,shelfrows=:shelfrows, shelfcols=:shelfcols, devsum=:devsum";
            //prepare the query
            $stmt=$dbh->prepare($query);
            //bind the parameter
            $adddate=date('Y-m-d',time());
            $stmt->bindParam(':id','');
            $stmt->bindParam(':adddate','2010');
            $stmt->bindParam(':roomname','$this->roomname');
            $stmt->bindParam(':shelfrows','$this->shelfrows');
            $stmt->bindParam(':shelfcols','$this->shelfcols');
            $stmt->bindParam(':devsum','$this->devsum');

            //execute the query
            $stmt->execute();    

            //if($stmt->errorCode()==0)
            //{
                echo  date('Y-m-d h:i:s',time());
                echo "<br />成功添加 1 条记录。";
          
                echo "<script language=\"javascript\">alert('添加成功');history.go(-1)</script>";    
            //}
            
        }


        function getRoomInfo()
        {

        }

        function updateDevSum()
        {

        }
    }



?>
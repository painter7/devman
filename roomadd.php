<?php


//require("cc_classes.php");

// require if not yet.
require_once("dbconn.php");

//table name
$tblname="device_room";

if(isset($_GET['po']))
{
	$getpos=$_GET['po'];
	//shelf adding
	$atshelf=true;

}else{
	$getpos="";
	$atshelf=false;
}

if(isset($_POST['submit'])){


$adddate =date('Y-m-d',time());
$roomname=$_POST['roomname'];
$shelfrows=$_POST['shelfrows'];
$shelfcols=$_POST['shelfcols'];

//create the new room obj
//$newroom= new DevRoom($roomname,$shelfrows,$shelfcols);


/*
$query="INSERT INTO device_room (id,adddate,roomname,shelfrows,shelfcols,devsum) VALUES ('','2010-10-1','$roomname','$shelfrows','$shelfcols','0')";
$dbh->exec($query);

*/

/*
//insert room info into DB
$query="INSERT INTO device_room SET id=:id,adddate=:adddate,roomname=:roomname,shelfrows=:shelfrows,shelfcols=:shelfcols,devsum=:devsum";
            //prepare the query
            $stmt=$dbh->prepare($query);
            //bind the parameter
            $adddate=date('Y-m-d',time());
            echo $adddate;
            $stmt->bindValue(':id','17');
            $stmt->bindValue(':adddate','2010');
            $stmt->bindParam(':roomname',$roomname);
            $stmt->bindParam(':shelfrows',$shelfrows);
            $stmt->bindParam(':shelfcols',$shelfcols);
            $stmt->bindValue(':devsum','0');

            //execute the query
            $stmt->execute();    
*/
//insert room info into DB
$query="INSERT INTO device_room SET id=?,adddate=?,roomname=?,shelfrows=?,shelfcols=?,devsum=?";
            //prepare the query
            $stmt=$dbh->prepare($query);
            //bind the parameter
            $stmt->bindValue(1,'');
            $stmt->bindParam(2,$adddate);
            $stmt->bindParam(3,$roomname);
            $stmt->bindParam(4,$shelfrows);
            $stmt->bindParam(5,$shelfcols);
            $stmt->bindValue(6,'0');

            //execute the query
            $stmt->execute();  
            //echo $stmt->errorCode();
            //echo var_dump($stmt->errorInfo());

            if($stmt->errorCode()=='00000')
            {
                echo  date('Y-m-d h:i:s',time());
                echo "<br />成功添加 1 条记录。";
          
                echo "<script language=\"javascript\">alert('添加成功');history.go(-1)</script>";    
            }else{
              echo "添加记录失败，错误代码: ".$stmt->errorCode();
            }
 }
 
?>
<SCRIPT language=javascript>
function CheckPost()
{
	if (addform.roomname.value.length<1)
	{
		alert("机房名称必填");
		addform.roomname.focus();
		return false;
	}
	if (addform.shelfrows.value=="")
		alert("行不能为空");
		addform.shelfrows.focus();
		return false;
	}
  if (addform.shelfcols.value=="")
    alert("列不能为空");
    addform.shelfcols.focus();
    return false;
  }
}
</SCRIPT>

<div id="messageadd">
	<h3>新建机房</h3>
  <form action="roomadd.php" method="post" name="addform" onsubmit="return CheckPost();">
  	<input type="hidden" name="user" value="<?=$username?>"/><br />

  	机房名称：<input type="text" name="roomname" /><br/>
  	机架行数：<input type="text" name="shelfrows"/> 机架列数：<input type="text" name="shelfcols"/><br/>


  <?php
	  	$back_url=($atshelf)?("roomlist.php?r=".$getpos):("roomlist.php");
  ?>
  <a href="<?php echo $back_url;?>"><< 返回</a> &nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="submit" value="写好了，提交"/>

  </form>

</div>
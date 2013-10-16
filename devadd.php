<?php

//require_once(dirname(__FILE__)."/dbconn.php");
require("dbconn.php");
require("header.php");

//table name
$tblname="device_manage";

if(isset($_GET['po']))
{
	$getpos=$_GET['po'];
	//shelf adding
	$atshelf=true;
}else{
	$getpos="";
	$atshelf=false;
}
// back link
$back_url=($atshelf)?("shelfview.php?po=".$getpos):("roomview.php");

if(isset($_POST['submit'])){


$adddate =date('Y-m-d',time());
$updatedate =date('Y-m-d',time());
$room=$_POST['room'];
$position=$_POST['position'];
$status=$_POST['status'];
$ip= $_POST['ip'];
$devname= $_POST['devname'];
$sysname = $_POST['sysname'];
$detail= $_POST['detail'];
$projnum= $_POST['projnum'];
$projname= $_POST['projname'];
$assetnum= $_POST['assetnum'];
$objnum= $_POST['objnum'];
$memo= $_POST['memo'];
$belongdep= $_POST['belongdep'];
$usingdep= $_POST['usingdep'];
$manager= $_POST['manager'];
/*
adddate DATE,
updatedate DATE,
room varchar(50),
position varchar(10),
status varchar(10),
ip varchar(100),
devname TINYTEXT,
sysname TINYTEXT,
detail TINYTEXT,
projnum varchar(30),
projname TINYTEXT,
assetnum varchar(30),
objnum varchar(30),
memo TINYTEXT,
belongdep varchar(60),
usingdep varchar(60),
manager varchar(8)
 */

/*
  $sql="insert into " .$tblname. "(id,adddate,updatedate,room,position,status,ip,devname,sysname,detail,projnum,projname,assetnum,objnum,memo,belongdep,usingdep,manager) " .
  		"values ('','$adddate','$updatedate','$room','$position','$status','$ip','$devname','$sysname','$detail','$projnum','$projname','$assetnum','$objnum','$memo','$belongdep','$usingdep','$manager')";
  			
  			 echo $sql."<br />";
  			
  mysql_query($sql) or die("Bad query: " . mysql_error());

  echo  date('Y-m-d h:i:s',time());
  			echo "<br />成功添加 1 条记录。";
  
  echo "<script language=\"javascript\">alert('添加成功');history.go(-1)</script>";
*/

$query="INSERT INTO ".$tblname
        ." SET id='',adddate='$adddate',updatedate='$updatedate',room='$room',position='$position',status='$status',ip='$ip',devname='$devname',sysname='$sysname',detail='$detail',projnum='$projnum',projname='$projname',assetnum='$assetnum',objnum='$objnum',memo='$memo',belongdep='$belongdep',usingdep='$usingdep',manager='$manager'";

        $affected_row=$dbh->exec($query);
        if($affected_rows){
            echo  date('Y-m-d H:i:s',time());
            echo "<br />成功添加 ".$affected_rows." 条记录。";
            
            echo "<script language =\"javascript\">alert('添加成功');history.go(-1)</script>";
        }else{
          echo "错误代码：".$dbh->errorCode();
        }


 }
 
?>
<SCRIPT language=javascript>
function CheckPost()
{
	if (addform.position.value.length<1)
	{
		alert("标题不能少于1个字符");
		addform.position.focus();
		return false;
	}
	if (addform.assetnum.value=="")
	{
		alert("资产编号不能为空");
		addform.assetnum.focus();
		return false;
	}
}
</SCRIPT>

<div class="container">
	<h3>添加设备记录</h3>
  <form action="devadd.php" method="post" name="addform" onsubmit="return CheckPost();">
  	<input type="hidden" name="user" value="<?=$username?>"/><br />

  	
  	<label for="room">机房：</label>
  	<select name="room">
  	<?php
    //------------------------------------------------
  		$room_query="SELECT id,roomname FROM device_room";
      try{
          $room_pdostmt=$dbh->query($room_query);
          foreach($room_pdostmt as $row)
          {
            echo "<option value='$row[0]'>".$row[1]."</option>";          
          }
      }catch(PDOException $expt){
        echo "get dir error: ".$expt->getMessage();
      }
    //------------------------------------------------------
  	?>
  	</select>

  	机架位置：<input type="text" name="position" value="<?php echo $getpos;?>"/> ex: A5-H10 , A10-H5 , A10-H10<br/>
  	状态：<select name="status"><option value="在用">在用</option><option value="停用">停用</option></select>
  	资产编号：<input type="text" name="assetnum"/> 实物编号：<input type="text" name="objnum"/><br/>
  	设备名称：<input type="text" name="devname"/> IP：<input type="text" name="ip"/> 多个IP间用一个空格分隔<br />
  	配置详情：<textarea name="detail" cols="30" rows="4"></textarea> <br/>
  	系统名称：<input type="text" name="sysname"/><br/>
  	项目编号：<input type="text" name="projnum"/>
  	项目名称：<input type="text" name="projname"/><br />
  	所属部门：<input type="text" name="belongdep"/>使用部门：<input type="text" name="usingdep"/> 责任人：<input type="text" name="manager"/><br />
  	备注：<textarea name="memo"></textarea> <br/>

  <a href="<?php echo $back_url;?>"><< 返回</a> &nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="submit" value="写好了，提交"/>

  </form>

</div>

</body>
</html>
<?php

require("dbconn.php");
//table name
$tblname="device_manage";


if(isset($_GET['id']))
{
	$devid=$_GET['id'];
  //get the dev info
  $sql="SELECT * FROM ".$tblname." WHERE id='$devid'";        
  //echo $sql."<br />";
  //the original object
  $edit_pdostmt=$dbh->query($sql);
  //$editrow=mysql_fetch_object(mysql_query($sql));
  $editrow=$edit_pdostmt->fetch(PDO::FETCH_OBJ);

  //var_dump($editrow);

}else{
	echo "ERR: 未指定设备!";
  exit;
}



if(isset($_POST['submit'])){



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


  $sql="UPDATE ".$tblname." SET updatedate='$updatedate',room='$room' ,position='$position' ,status='$status' ,ip='$ip' ,devname='$devname' ,sysname='$sysname' ,detail='$detail' ,projnum='$projnum' ,projname='$projname' ,assetnum='$assetnum' ,objnum='$objnum' ,memo='$memo' ,belongdep='$belongdep' ,usingdep='$usingdep' ,manager='$manager' WHERE id='$devid'";
  
  //echo $sql."<br />";
  mysql_query($sql) or die("Bad query: " . mysql_error());
  	
  echo  date('Y-m-d h:i:s',time());
			echo "<br />成功更新 1 条记录。";
  
  //echo "<script language=\"javascript\">alert('更新成功');history.go(-1)</script>";
  echo "<script language=\"javascript\">alert('更新成功');</script>";
  $Location_url="Location:shelfview.php?po=".$_POST['po'];
  header($Location_url);
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

<div id="messageadd">
	<h3>添加设备记录</h3>
  <form action="devedit.php?id=<?php echo $devid;?>" method="post" name="addform" onsubmit="return CheckPost();">
  	<input type="hidden" name="po" value="<?php echo $_GET['po'];?>"/><br />
  	<label for="room">机房：</label>
  	<select name="room" value="<?php echo $editrow->room;?>">

    <?php
    //------------------------------------------------
      $room_query="SELECT id,roomname FROM device_room";
      try{
          $room_pdostmt=$dbh->query($room_query);
          foreach($room_pdostmt as $row)
          {
            if($row['0']==$editrow->room)
            {
              // the selected item.
              echo "<option value='$row[0]' selected='selected'>".$row[1]."</option>";
            }else{
              echo "<option value='$row[0]'>".$row[1]."</option>";          

            }
          }
      }catch(PDOException $expt){
        echo "get dir error: ".$expt->getMessage();
      }
    //------------------------------------------------------
    ?>

  	</select>
    
  	机架位置：<input type="text" name="position" value="<?php echo $editrow->position;?>"/> ex: A5-H10 , A10-H5 , A10-H10<br/>
  	状态：<select name="status" value="<?php echo $editrow->status;?>"><option value="在用">在用</option><option value="停用">停用</option></select>
  	资产编号：<input type="text" name="assetnum" value="<?php echo $editrow->assetnum;?>"/> 实物编号：<input type="text" name="objnum" value="<?php echo $editrow->objnum;?>"/><br/>
  	设备名称：<input type="text" name="devname" value="<?php echo $editrow->devname;?>"/> IP：<input type="text" name="ip" value="<?php echo $editrow->ip;?>"/> 多个IP间用一个空格分隔<br />
  	配置详情：<textarea name="detail" cols="30" rows="4"><?php echo $editrow->detail;?></textarea> <br/>
  	系统名称：<input type="text" name="sysname" value="<?php echo $editrow->sysname;?>"/><br/>
  	项目编号：<input type="text" name="projnum" value="<?php echo $editrow->projnum;?>"/>
  	项目名称：<input type="text" name="projname" value="<?php echo $editrow->projname;?>"/><br />
  	所属部门：<input type="text" name="belongdep" value="<?php echo $editrow->belongdep;?>"/>使用部门：<input type="text" name="usingdep" value="<?php echo $editrow->usingdep;?>"/> 责任人：<input type="text" name="manager" value="<?php echo $editrow->manager;?>"/><br />
  	备注：<textarea name="memo"><?php echo $editrow->memo;?></textarea> <br/>


  <a href="devview.php?id=<?php echo $devid;?>"><< 返回</a> &nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="submit" value="写好了，提交"/>


  </form>

</div>
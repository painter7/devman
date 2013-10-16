<?php

require("header.php");


require("dbconn.php");
//table name
$tblname="device_manage";

//room number
$room=isset($_GET['r'])?$_GET['r']:0;

$devid=isset($_GET['id'])?$_GET['id']:0;


if(isset($_GET['po']))
{
    $position=$_GET['po'];
}else{
    $position="0000";
}

//$sql="SELECT id,updatedate,status,ip,devname,sysname,memo FROM ".$tblname. " WHERE room='$room' AND position = '$position'";
$sql="SELECT device_manage.*,device_room.roomname FROM ".$tblname." INNER JOIN device_room ON device_manage.room=device_room.id"
    ." WHERE device_manage.id='$devid'";

$dev_pdostmt=$dbh->query($sql);


//$devinfo=mysql_fetch_array($query_result);
//get the array indexed by name.
$devinfo=$dev_pdostmt->fetch(PDO::FETCH_ASSOC);

$room_url="roomview.php?r=".$devinfo['room'];
$shelf_url="shelfview.php?r=".$devinfo['room']."&po=".$devinfo['position'];
$edit_url="devedit.php?po=".$position."&id=".$devinfo['id'];
$del_url="devdel.php?po=".$position."&id=".$devinfo['id'];

echo "<div class=\"breadcrumb\"><span class=\"glyphicon glyphicon-home\"></span> <a href=\"roomlist.php\">机房列表</a> / "
            ."<a href=\"".$room_url."\">".$devinfo['roomname']
            ."</a> / <a href=\"".$shelf_url."\">".$devinfo['position']."</a> / ".$devinfo['devname']."</div>";

echo "<div class=\"container\">";

echo "<div class=\"devdetail\">";
echo "<table>";
echo "<tr><th colspan=\"2\" ><a title=\"删除\" href=\"javascript:if(confirm('确实要删除吗?'))location='".$del_url
         ."'\"> <span class=\"glyphicon glyphicon-trash\"></span></a> . <a  title=\"编辑\" href=\"".$edit_url
         ."\"> <span class=\"glyphicon glyphicon-edit\"></span></a></th></tr>";
 
echo "<tr><td>设备名称：</td><td>".$devinfo['devname']."</td></tr>";
echo "<tr><td>IP：</td><td>".$devinfo['ip']."</td></tr>";
echo "<tr><td>位置：</td><td>".$devinfo['roomname']."<br />".$devinfo['position']."</td></tr>";
echo "<tr><td>备注：</td><td>".$devinfo['memo']."</td></tr>";

echo "<tr><td  class=\"altblock\">项目编号：</td><td  class=\"altblock\">".$devinfo['projnum']."</td></tr>";
echo "<tr><td>项目名称：</td><td>".$devinfo['projname']."</td></tr>";
echo "<tr><td>系统名称：</td><td>".$devinfo['sysname']."</td></tr>";
echo "<tr><td>配置详情：</td><td>".$devinfo['detail']."</td></tr>";

echo "<tr><td  class=\"altblock\">实物编号：</td><td  class=\"altblock\">".$devinfo['objnum']."</td></tr>";
echo "<tr><td>资产编号：</td><td>".$devinfo['assetnum']."</td></tr>";
echo "<tr><td>所属部门：</td><td>".$devinfo['belongdep']."</td></tr>";
echo "<tr><td>使用部门：</td><td>".$devinfo['usingdep']."</td></tr>";
echo "<tr><td>责任人：</td><td>".$devinfo['manager']."</td></tr>";
echo "<tr><th colspan=\"2\" ><a href=\"".$shelf_url."\">返回</a></th></tr>";



//mysql_close($conn);

echo "</table>";
echo "</div>";
?>



</div>

</body>
</html>
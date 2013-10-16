<?php

require("header.php");


require("dbconn.php");
//table name
$tblname="device_manage";

//room number
$room=isset($_GET['r'])?$_GET['r']:0;


if(isset($_GET['po']))
{
    $position=$_GET['po'];
}else{
    $position="0000";
}


//get the room information
$sql="SELECT roomname FROM device_room WHERE id='$room'";
$room_pdostmt=$dbh->query($sql);
$row=$room_pdostmt->fetch(PDO::FETCH_NUM);
$roomname=$row[0];
$room_url="roomview.php?r=".$room;

//echo "<div class=\"breadcrumb\"><a href=\"".$room_url."\">".$roomname
//        ."</a> / ".$position."/ </div>";
echo "<div class=\"breadcrumb\"><span class=\"glyphicon glyphicon-home\"></span> <a href=\"roomlist.php\">机房列表</a> / "
        ."<a href=\"".$room_url."\">".$roomname."</a> / ".$position."</div>";

//get the dev list
$sql="SELECT id,updatedate,status,ip,devname,sysname,memo FROM ".$tblname. " WHERE room='$room' AND position = '$position'";
$dev_pdostmt=$dbh->query($sql);


echo "<div class=\"msgbar-top\">";
echo "该机架设备数：".$dev_pdostmt->rowCount()."  |  <a href=\"devadd.php?po=".$position."\">在此机架添加设备</a><br/>";
echo "</div>";





echo "<div class=\"container\">";


echo "<table>";
echo "<tr><th colspan=\"8\">$position</th></tr>";
echo "<tr><td>ID</td><td>更新日期</td><td>状态</td><td>IP</td><td>设备名称</td><td>系统名称</td><td>备注</td><td>更多</td></tr>";
 while($row=$dev_pdostmt->fetch(PDO::FETCH_NUM))
 {
    //var_dump($row);
    echo "<tr>";
    foreach ($row as $field) {
        echo "<td>".$field."</td>";
    }
    //echo "<td><a href=\"devedit.php?id=".$row[0]."\">edit</a> | <a href=\"devdel.php?id=".$row[0]."\"> x </a></td>";
    $edit_url="devedit.php?po=".$position."&id=".$row[0];
    $del_url="devdel.php?po=".$position."&id=".$row[0];
    $detail_url="devview.php?id=".$row[0];
    echo "<td><a title=\"删除\" href=\"javascript:if(confirm('确实要删除吗?'))location='".$del_url
         ."'\"> <span class=\"glyphicon glyphicon-trash\"></span></a> . <a  title=\"编辑\" href=\"".$edit_url
         ."\"> <span class=\"glyphicon glyphicon-edit\"></span></a> . <a  title=\"详细信息\" href=\"".$detail_url
         ."\"> <span class=\"glyphicon glyphicon-tags\"></span></a></td>";
    
    echo "</tr>";
 }

echo "</table>";



?>
</div>

</body>
</html>
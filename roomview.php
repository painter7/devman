<?php

require("header.php");

require("dbconn.php");
//table name
$tblname="device_room";
//room number
$room=isset($_GET['r'])?$_GET['r']:0;
//get the room information
$room_sql="SELECT roomname,shelfrows,shelfcols FROM ".$tblname." WHERE id='$room'";
$room_pdostmt=$dbh->query($room_sql);

//get the array indexed by NUM.
$row=$room_pdostmt->fetch(PDO::FETCH_NUM);

$roomname=$row[0];
$shelfrows=$row[1];
$shelfcols=$row[2];



$tblname="device_manage";


$dev_sql="SELECT updatedate,position,status,ip,devname,sysname,assetnum,memo,manager FROM ".$tblname." WHERE room='$room'";
$dev_pdostmt=$dbh->query($dev_sql);
//$query_result=mysql_query($sql) or die("Invalid query: " . mysql_error());

//echo "<div class=\"breadcrumb\">".$roomname." / </div>";
echo "<div class=\"breadcrumb\"><span class=\"glyphicon glyphicon-home\"></span> <a href=\"roomlist.php\">机房列表</a> / "
        .$roomname." </div>";

echo "<div class=\"msgbar-top\">";
echo "设备记录总数：".$dev_pdostmt->rowCount();
echo "</div>";


echo "<div class=\"container\">";

echo "机架分布图：<br/>";

// room view output
echo "<table>";
for($i=1;$i<=$shelfrows;$i++)
{
    echo "<tr>";
    for($j=1;$j<=$shelfcols;$j++)
    {
        $position="H".$i."-A".$j;
        $shelf_url="shelfview.php?r=".$room."&po=".$position;
        echo "<td><a href=\"".$shelf_url."\">$position</a></td>";
    }
    echo "</tr>";
}
echo "</table>";


 

echo "设备列表：<br/>";

echo "<table>";
echo "<tr><td>更新日期</td><td>机架位置</td><td>状态</td><td>IP</td><td>设备名称</td><td>系统名称</td><td>资产编号</td><td>备注</td><td>维护负责人</td></tr>";
 while($row=$dev_pdostmt->fetch(PDO::FETCH_NUM))
 {
    //var_dump($row);
    echo "<tr>";
    foreach ($row as $field) {
        echo "<td>".$field."</td>";
    }
    echo "</tr>";
 }

echo "</table>";



?>

</div>
</body>
</html>
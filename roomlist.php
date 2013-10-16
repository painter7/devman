<?php

require("header.php");

require("dbconn.php");
//table name
$tblname="device_room";


$id_sql="SELECT id FROM ".$tblname;
$id_pdostmt=$dbh->query($id_sql);
//$query_result=mysql_query($sql) or die("Invalid query: " . mysql_error());

// update the dev sum
// =========================================================================================
foreach($id_pdostmt as $row)    
 {
    //echo $row[0]. "  " ;
    
    $count_sql="SELECT count(*) FROM device_manage WHERE room='$row[0]'";
    $count_result=$dbh->prepare($count_sql);
    $count_result->execute();
//PDO has PDOStatement::rowCount(), which apparently does not work in MySql. What a pain.
    $devcount=$count_result->fetchColumn();
    //echo $devcount."<br />";
    //update the devsum
    $update_sql="UPDATE device_room SET devsum='$devcount' WHERE id='$row[0]'";
    $affected_rows=$dbh->exec($update_sql);
    
 }
//==========================================================================================
//
// output the room data
$room_sql="SELECT * FROM ".$tblname;
$room_pdostmt=$dbh->query($room_sql);

echo "<div class=\"breadcrumb\"><span class=\"glyphicon glyphicon-home\"></span> 机房列表 </div>";

echo "<div class=\"msgbar-top\">";
echo "总数：".$room_pdostmt->rowCount()."  (数据更新: ".date('Y-m-d H:i',time()).") | <a href=\"roomadd.php\">新建机房</a>";
echo "</div>";


echo "<div class=\"container\">";

 
echo "<table>";
echo "<tr><th>机房</th><th>行数</th><th>列数</th><th>设备数</th><th>更多</th></tr>";

 foreach ($room_pdostmt as $row)
 {
    echo "<tr><td><a href=\"roomview.php?r=".$row[0]."\">".$row[2]."</a></td>";
    echo "<td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td></tr>";
    

 }


?>
</table>
</div>

</body>
</html>
<html>
<head>
<title>设备列表</title>
<style>

body {font-size:80%;}

    table, td, tr
    {
        font-size:100%;
        border-collapse: collapse;
        border:1px solid grey;
        padding:1px 3px 1px 3px;
        margin:10px 30px 10px 30px;
    }

</style>
</head>
<body>


<?php

require("dbconn.php");
//table name
$tblname="device_manage";


$sql="SELECT * FROM ".$tblname;
$query_result=mysql_query($sql) or die("Invalid query: " . mysql_error());
/*
echo "<h3>统计详情</h3> | <a href=\"fc.php\">添加选择记录</a><br/><br/>";
echo "<table>";

echo "<tr><td>地点</td><td>富士苹果</td><td>青苹果</td><td>香蕉</td><td>粉蕉</td><td>大蕉</td><td>橙子</td><td>柑橘</td><td>沙糖桔</td><td>皇帝柑</td><td>油桃</td><td>水蜜桃</td><td>杨桃</td><td>芒果</td><td>雪梨</td><td>酥梨</td><td>冰糖梨</td><td>贡梨</td><td>香梨</td><td>番石榴</td><td>石榴</td><td>猕猴桃</td><td>山竹</td><td>布林</td><td>火龙果</td></tr>";
*/

/*
 while($row=mysql_fetch_row($query_result))
 {
    //var_dump($row);
    echo "<tr>";
    foreach ($row as $field) {
        echo "<td>".$field."</td>";
    }
    echo "</tr>";
 }
echo "</table><br/>";


//$pic_count=0;
//include "./libchart/classes/libchart.php";


 while($row=mysql_fetch_row($query_result))
 {
    //var_dump($row);
    //$pic_count++;
    echo "<tr>";
    foreach ($row as $field) {
        echo "<td>".$field."</td>";
    }
    echo "</tr>";



echo "</table><br/>";
*/

    //<img alt="Vertical bars chart" src="generated/demo1.png" style="border: 1px solid gray;"/>
echo "总记录数：".mysql_num_rows($query_result)."  |  分布图：<br/>";
    



//$sql="SELECT * FROM fruit_choice";
//$query_result=mysql_query($sql) or die("Invalid query: " . mysql_error());
 

echo "<table>";
echo "<tr><td>ID</td><td>添加日期</td><td>更新日期</td><td>所在机房</td><td>机架位置</td><td>状态</td><td>IP</td><td>设备名称</td><td>系统名称</td><td>配置详情</td><td>项目编号</td><td>项目名称</td><td>资产编号</td><td>实物编号</td>备注<td>备注</td><td>所属部门</td><td>使用部门</td><td>负责人</td></tr>";
 while($row=mysql_fetch_row($query_result))
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

</body>
</html>
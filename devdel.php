
<?php

require("dbconn.php");
//table name
$tblname="device_manage";

    $delete_sql = "DELETE FROM ".$tblname." WHERE id = $_GET[id]";
    if(mysql_query($delete_sql)){
        //exit('<script language="javascript">alert("删除成功！");window.location.href = "msglist.php?label=0";</script>');      
        echo "<script>alert('record deleted successfully!');window.history.back(-1);</script>";      
        //echo "<script>alert('record deleted successfully!');window.history.back(-1);window.location.reload();</script>";
        $Location_url="Location:shelfview.php?po=".$_GET['po'];
        header($Location_url);
    } else {
        exit('删除失败：'.mysql_error().'[ <a href="javascript:history.back()">返 回</a> ]');
    }


?>
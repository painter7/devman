<?php

	//DOCTYPE 声明
	if(stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml")){
	//header("Content-Type: application/xhtml+xml; charset=UTF-8");
	echo('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">');
	} else {
	//header("Content-Type: text/html; charset=UTF-8");
	echo ('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
	}

date_default_timezone_set('PRC'); //设置时区为中国

?>
<html>
	<head>
		<title>机房资产管理</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link href="./css/ccbt.css" rel="stylesheet" type="text/css">
	</head>

<body>

<div class="navbar-top">
<a href="devadd.php">添加设备</a> | 
<a href="roomlist.php">查看机房</a> | 
<a href="devlist.php">所有设备</a> | 
<a href="#">查找</a> | 

<span class="user">
<span class="glyphicon glyphicon-user"> 陈永鑫 </span>
<span class="glyphicon glyphicon-log-out"></span>
</span>
</div>

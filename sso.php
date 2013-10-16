<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>test</title>

</head>
<body>

<?php


require_once("dbconn.php");


header("Content-type:text/html;charset=UTF-8"); 

$taskId = $_REQUEST["taskId"];
$UserAccount = $_REQUEST["UserAccount"];

if($taskId){
		$wsdl = "http://10.17.128.131:8088/fsoap/service?wsdl";
		$client = new SoapClient($wsdl);
		//$param = array('arg0'=>'FS1309261380187065375','arg1'=>'123456','arg2'=>'IAyYJKXv/15tO5NnY46l8uF8B0iU+WDWIl3tVgZKRn7tsMF7ZUUdGA=='); //IAyYJKXv/17yyMmkltq9k0OPsngQBZmisbeCplYY/FM=
		//$param = array('arg0'=>'FS1309261380187065375','arg1'=>'123456','arg2'=>'IAyYJKXv/15tO5NnY46l8uF8B0iU+WDWIl3tVgZKRn7tsMF7ZUUdGA=='); 

		// cyxin2  IAyYJKXv/16qlfvOgX0vuLBd9numY4spMd2TgsGPRGO6hP+tCMJ12Q== 
		$UserAccount= str_replace(" ","+",$UserAccount);
		$param = array('arg0'=>'FS1309261380187065375','arg1'=>'123456','arg2'=>$UserAccount);
		//array_push($param, $UserAccount);
		print_r($param);
		echo "<br>";

		$ret = $client->getLocalUserAccount($param);
		// $employee=$client->getEmployees(array('arg0'=>'FS1309261380187065375','arg1'=>'123456'));  //获取佛山所有机构人员

		if ($ret->return){
		  print_r($ret->return);

		  //var_dump($employee);
		  //var_dump(json_decode($ret->return,true));
		  $result_info=json_decode($ret->return,true); //json转换为关联数组
		  echo $result_info['requestMsg'];
		  $username=$result_info['requestMsg'];

			  $user_sql="SELECT zhname FROM acl WHERE username='$username'";
			$user_pdostmt=$dbh->query($user_sql);

			//get the array indexed by NUM.
			$row=$user_pdostmt->fetch(PDO::FETCH_NUM);

			$zhname=$row[0];
			echo $zhname;



		}else{
		  echo 'error';
		}
	}else{
		//$ssoUrl = "http://10.17.128.131:8080/fsoap/pages/sso.jsp";//
		$ssoUrl = "http://10.17.128.131:8080/fsoap/pages/newsso.jsp";//
		$handUrl="http://10.17.162.178:8711/test/pdo1/sso.php?taskId=132";//
		$sysCode="FS1309261380187065375"; //"FS1207111341977447812";//
		$sysPassword="123456"; //"123qwe";//
?> 
	  <html>
	  <body  onload="document.Form1.submit()">
	  <form  name='Form1' method='post'  action="<?=$ssoUrl?>" >
	      <input name="ReturnURL" type="hidden" value="<?=$handUrl?>">
	      <input name="sysCode" type="hidden" value="<?=$sysCode?>">
	      <input name=sysPassword type="hidden" value="<?=$sysPassword?>">
	  </form>
	  </body>
	  </html>
	  
	  
<?php } ?>
</body>
</html>
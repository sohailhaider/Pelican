<?php
session_start();

include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}

	
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$picRes=mysql_query("SELECT * FROM pictures WHERE pic_ID=".$_SESSION['pic']);
$sesRes=mysql_query("SELECT * FROM Sessions WHERE Ses_ID=".$_SESSION['user_id']);
$userRow=mysql_fetch_array($res);
$picRow=mysql_fetch_array($picRes);
$sesRow=mysql_fetch_array($sesRes);


if(isset($_POST['btn-pic']))
{
	mysql_query(INSERT into Sessions VALUES ($_SESSION['user'], 1))	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['user_email']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
	<div id="left">
    <label>Pelican</label>
    </div>
    <div id="right">
    	<div id="content">
        	hi' <?php echo $userRow['user_name']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
        </div>
    </div>
</div>
<button type="submit" name="btn-pic">Pull Picture</button>
<?php
	if ($sesRow['pic'] = 1)
	{
		echo "<img src =" . $picRow['pic_Src'] . " />";
	}
?>
</body>
</html>

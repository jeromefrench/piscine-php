 <?php 
session_start();

if ($_POST != null && $_POST['submit'] != null && $_POST['submit'] == 'Send')
{
	$glo_aray = array();
	if (file_exists("./../private/chat"))
	{
		$fp = fopen("./../private/chat", "r+");

		if (flock($fp, LOCK_EX))
		{
			$str = file_get_contents("./../private/chat");
			$glo_aray = unserialize($str);
			$array = array();
			$array['login'] = $_SESSION['loggued_on_user'];
			$array['time'] = time();
			$array['msg'] = $_POST['msg'];
			$glo_aray[] = $array;
			$str = serialize($glo_aray);
			file_put_contents("./../private/chat", $str);
		}

	}
}
?>

<html>
<head>
<script langage="javascript">top.frames['chat'].location='chat.php';</script>
</head>
<body>
<form action="speak.php" method="post">
<input  style="width:85%;" type="text" name="msg" />
<input type="submit" name="submit" value="Send"/>
</form>

</body>
</html>




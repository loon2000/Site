<td width="90%" align="right" valign="top">
<?php
if (isset($_SESSION['user_id']))
	{
		include_once($root.'/lib/bd.php');
		$result = mysql_query("SELECT * 
					FROM user 
					WHERE id='$_SESSION[user_id]'") or die(mysql_error()); 
		if ($result)
		{
			$data2 = mysql_fetch_array($result);	?>
			<a href="/site/profile.php?id=<?php echo $_SESSION['user_id'];?>
				&lang=<?php echo $_REQUEST['lang']; ?>"><?php echo $data2['login']; ?></a>
				<small><?php echo $data2['status']; ?></small>
			<a href="/site/index.php?lang=<?php echo $_REQUEST['lang']; ?>"><?php echo $ini['Log_out']; ?></a><br>

			<?php
		}
	}
?>
</td>

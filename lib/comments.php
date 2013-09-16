<?php 
include_once($root.'/lib/lang.php');
include_once($root.'/lib/function_global.php');
include_once($root.'/lib/bd.php');
$num = 10; 
if (isset($_GET['page']))
{
				$page = $_GET['page'];
}
else
{
				$page = 1;
}
$com_page = $_GET['id'];
$com_lang = $_SESSION['user_lang'];
$result = mysql_query("SELECT COUNT(*) FROM comment
											WHERE (page = '$com_page') and (lang = '$com_lang')");
if (isset($result))
{
				$posts = mysql_result($result, 0); 
				$total = intval(($posts - 1) / $num) + 1; 
				$page = intval($page); 
				if(empty($page) or $page < 0) $page = 1; 
				if($page > $total) $page = $total; 
				$start = $page * $num - $num; 
				$result = mysql_query("SELECT * FROM comment ORDER BY date DESC
															LIMIT $start, $num") or die(mysql_error()); 
				if ($result)
				{
					if ($total > 1)
					{
								pagelist($page,$total);
								print '<hr>';
					}
					while ($data = mysql_fetch_array($result)) 
					{
						if ($data['lang'] == $_SESSION['user_lang'])
						{
								if (isset($_SESSION['user_id']))
								{
												$data2 = selectUserId($data['autor']);
												if ($data2)
												{
													print '<img src="'.$data2['avatar'].'" width="70" align="left">'; 	
													print '<br><small><strong> <a href="/site/profile.php?id='.$data2['id'].'">'.$data2['login'].'</a></strong></small><br>';
													print '<font color="gray"><small>'.$data['date'].'</small></font><br><br>';
													if (empty($data['title_com']))
													{
														print '<font color="#282828"><h3>'.substr($data['text_com'],0,15).'</h3></font>';
													}
													else
													{
														print '<font color="#282828"><h3>'.$data['title_com'].'</h3></font>';
													}
													print '<p><font color="#383838">'.$data['text_com'].'</font></p>';
																if (isset($_SESSION['status'],$_SESSION['user_id']))
																{
																	if ($_SESSION['status'] == 'admin')
																	{ 
																				print '<p>[<a href="/site/lib/del_com.php?id='.$data['id'].'">'.t('Delete').'</a>]</p>';
																	}
																}
													print '<hr>';
												}
								}
						}
								
					}
				}
				if ($total > 1)
				{
								pagelist($page,$total);
				}
}
?>
		
		

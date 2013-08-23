<form action="main_page.php?lang=<?php echo $_REQUEST['lang']; ?>" method="post">
    <td align="center">
    <p><?php echo $ini['Login']; ?><br>
    <input name="login" type="text" size="20"><br>
    <?php echo $ini['Pass']; ?><br>
    <input name="pass" type="password" size="20"></p>
    <input name="Enter" type="submit" value="<?php echo $ini['Log']; ?>">
    <p><a href="add_user.php?lang=<?php echo $_REQUEST['lang']; ?>"><?php echo $ini['New_account']; ?></a><br>
       <a href="new_pass.php?lang=<?php echo $_REQUEST['lang']; ?>"><?php echo $ini['New_pass']; ?></a></p>

  </td>
</form>

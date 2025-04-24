<?php
session_start();
?>
<?php
echo "Welcome to Welcome Page";
echo "<br/>Hello: ".$_SESSION["uname"];
echo "<br/>Your Password is :".$_SESSION["upwd"];


echo"<br/><br><a href = 'logout.php'>LOGOUT</a>";
?>
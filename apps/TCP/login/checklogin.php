<?php

ob_start();
$host="localhost:3306"; //host name
$username="root"; //mysql username
$password="CAP4build!@#$"; //mysql password
$db_name="tcp"; //database name
$tbl_name="cap_user"; //table name

//Connect to the server and select the database
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

//Define username and password
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

//encrypt password
$encrypted_mypassword=md5($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$encrypted_mypassword'";
$result=mysql_query($sql);

//mysql num row is counting table row
$count=mysql_num_rows($result);
echo $count ;
//if result matched username and password, table row must be 1 row
// and check if there is already a session for this user
if($count==1 && session_name() != $myusername){
session_name($myusername);
// register username, password and redirect to file "login_success.php"
session_start();
$_SESSION['$myusername'];
header("location:login_success.php");
}
else {
if(session_name() == $myusername){
echo "Session already exists. Please log out of other session before starting a new one" ;}
else {
echo "Wrong Username or Password";}
header("location:login.php");
}
ob_end_flush();
?> 

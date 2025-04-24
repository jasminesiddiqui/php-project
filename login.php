<?php
session_start();
include ('header.php'); 
 include ('nav.php'); 
?>
<html>
    <head>
        <tittle></tiitle>
        <style>
            table {
    
    border-collapse: collapse;
}
td {
    padding: 10px;
    
    
}
input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    text-align:center;
}
input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}





        </style>
</head>
<body>
    


<div class="contain-container">
    <form name="form1"method ="post"action="#">
        <table>
            <tr>
                <td>Enter name </td>
                <td><input type ="text"name="uname"placeholder="enter Name "></td>
</tr>
<tr>
    <td> Enter Password </td>
    <td><input type="text"name="upwd" placeholder="Enter Password"></td>
</tr>
<tr>
    <td></td>
    <td><input type="submit" name ="btnSubmit" value="LOGIN"></td>
             </tr>
           </table>
       </form>
    <body>
 </html>

 <?php 
if (isset($_POST["btnSubmit"]))
{
    $uname=$_POST["uname"];
    $upwd=$_POST["upwd"];
    $username="root";
    $servername="localhost";
    $password="admin@1234";
    $dbname="zym";
    
    //Create connection
    $conn=new mysqli($servername,$username,$password,$dbname);

    //Check connection 
    if ($conn->connect_error)
    {
        die("Connection failed:".$conn->connect_error);
    }
    $sql="SELECT username,userpassword FROM ulogin where username='".$uname."' && userpassword='".$upwd."'";
    $result=$conn->query($sql);

    if ($result->num_rows > 0)
    {
    // output data of each row 
    while($row=$result->fetch_assoc())
    {
    $_SESSION["uname"]=$row["username"];
    $_SESSION["upwd"]=$row["userpasword"];
    //echo "id:"$row["id"]."Name:".$row{"firstname"]."".$row["lastname"]."<br>";
    //echo ''Welcome user";
    header('Location:Welcome.php');
   }
}

else
{
//echo"User with this name and password not available...";
header('Location:Signup.php');
}
$conn->close();
}
?>


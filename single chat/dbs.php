<?php 
$host = "localhost"; 
$user = "root";
 $pass = ""; 
 $db_name = "chatting";
 $con = new mysqli($host, $user, $pass, $db_name);

 $sql = "SELECT * FROM chatt";
$result = $con->query($sql);

 if(isset($_POST['submit']))
{
	$un=$_POST["username"];
	$ps=$_POST["password"];
	
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{
			if(($row['uname']==$un)&&($row['pass']==$ps))
			{
                 $l=1;
			}
			
		}
		if($l==1)
		{
			     $host = "localhost"; 
                 $user = "root";
                 $pass = ""; 
                 $db_name = "chatting";
                 $conn = new mysqli($host, $user, $pass, $db_name);
				 $sqli="SELECT * FROM LOGGER";
				 $re=$conn->query($sqli);
				 while($row=$re->fetch_assoc())
				 {
					if($row['uname']==$un)
					{
						 $sql="UPDATE  LOGGER SET STATUS=1 WHERE UNAME='$un'";
                         $resul=$con->query($sql);
					}
					else
					{
						$sql="INSERT INTO LOGGER(UNAME,STATUS) VALUES('$un',1)";
				        $result=$conn->query($sql);
					}
				 }
			     
		        session_start();
				$_SESSION["unames"]=$un;
				header("Location:mainer.php"); 
				 
		}
		else 
		{
	      header("Location:index.php");
		}
			
	}
}
 
 ?>
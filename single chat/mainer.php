<?php

 session_start();
 $a=$_SESSION["unames"];
 ?>
 <div id="s">
 <h2 id="header" style="font-family: 'Pacifico', cursive;"> CHAT BOOK</h2>
 </div>
 <div id="h" >
 <?php echo "<h2> welcome".$a."</h2>" ; ?>
 </div>
<?php
$host = "localhost"; 
$user = "root";
 $pass = ""; 
 $db_name = "chatting";
 $con = new mysqli($host, $user, $pass, $db_name);
 $sqli="SELECT * FROM LOGGER";
 $re=$con->query($sqli);
 while($row=$re->fetch_assoc())
 
				 {
					if($a==null and $row['status']==0)
					{
						 header("Location:index.php"); 
					}
				 }
?>



<a href="logout.php" id="log">Logout</a>

<?php 
             $host = "localhost"; 
             $user = "root";
             $pass = ""; 
             $db_name = "chatting";
             $con = new mysqli($host, $user, $pass, $db_name);

             $sql = "SELECT * FROM chatt";
             $result = $con->query($sql);

	           $un=$_SESSION["unames"];
	
	            $i=0;
				
               if($row=$result->num_rows>0)
	            {
			    echo "<div id=asides>";
		       while($row=$result->fetch_assoc())
		        {
					    $j=array();
						$j[$i]=$row['uname'];
				       
			     if(($row['uname']==$un))
			        {
						$i++;
					}
					
                 else
				 {		
                        echo "<ul>";
						echo "<li><a href=mains.php?phone=$j[$i]>$j[$i]</a></li>"; 
                   
					   echo "</ul>";
						 	
						$i++;
                     					
				 }
                        						
				
			        
			    
	            }
				echo "</div>";	
	            }
                           
 
              ?>

<html>
<head>
	<style>
	#header
	{
	color:white;
position:absolute;
top:-10px;	
left:35%;
	}
	#log
	{
		position:absolute;
		top:-20px;
		right:10px;
		color:white;
	}
		a{
			text-decoration: none;
			 
			 
			 padding:40px;
			
			
		}
		#h
		{
			color:blue;
			align:center;
			
		}
		li
		{
			color:#F4F42C;
			height:20px;
			color:white;
		}
		#asides
		{
			
			width:230px;
			height:100%	;
			background-color:#212F3D;
			position:absolute;
			top:54px;
			right:0;
		 
		}
		#asides a
		{
			padding-left:10px;
			color:#ABB2B9;
			font-size:20px;
		}
		#s
		{
			width:100%;
			height:8%;
			background-color:#17202A ;
			text-align:center;
			position:absolute;
			
			top:0;
		left:0;
			
		}
	</style>

<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
</head>
<body>
</body>
</html>


                          
 
              
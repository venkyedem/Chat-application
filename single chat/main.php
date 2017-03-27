<?php

 session_start();
 $a=$_SESSION["unames"];
 $f=$_SESSION["to"];

    
	

?>
<div class="nav">
<p><?php echo $a; ?></p>
<a href="logout.php">Logout</a>
</div>
<?php
$l=0;
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
	if($row['uname'] and $row['status']==1)
	{
	  $l=0; 
    }
}					
 
 function formatDate($date)
 {
	  return date('g:i a',strtotime($date));
 }
?>
<!DOCTYPE html>

<html> 
    <head> 
	<style>
	.nav{
		width:100%;
		height:50px;
		background-color:#212F3D;
	}
	.nav a{
		position:absolute;
		right:20px;
		top:10px;
		color:white;
	}
	.nav p{
		color:white;
		padding:10px;
	}
	#asides
		{
			
			width:350px;
			height:100%	;
			background-color:#212F3D;
			position:absolute;
			top:54px;
			right:0;
		}
		a{
			text-decoration: none; 
			 padding:10px;	
			
		}
		li
		{
			color:#F4F42C;
			height:20px;
			color:white;
			position:absolute;
			left:20px;
			padding-left:-10px;
		}
		#asides a
		{
			color:#ABB2B9;
			font-size:20px;
		}
		
		
		</style>
        <title>My Chat App</title> 
        <link rel="stylesheet" href="style.css" media="all" /> 
	     <script> 
		function chat_ajax()
		{ 
		    var req = new XMLHttpRequest(); 
		   req.onreadystatechange = function()
		     { 
		       if(req.readyState == 4 && req.status == 200)
		        { 
	                document.getElementById('chat').innerHTML = req.responseText; 
	            }
			} 
		 req.open('GET', 'chat.php', true); 
		 req.send(); 
		} 
		 setInterval(function(){chat_ajax()}, 1000) 
		 </script>


    </head> 
    <body onload="chat_ajax();"> 
        <div id="container"> 
		 <div id="name"><?php echo $f ?></div><br>
            <div id="chat_box">
             <div id="chat"></div>			
			
            </div> 
            <form method="post" action="main.php">
			
                
                <textarea name="enter message" placeholder="Enter Message"></textarea>
                <input type="submit" name="submit" value="Send!" /> 
				<?php 
				     
			          if(isset($_POST['submit']))
			           { 
				        
                       
		               
		               $msg = $_POST['enter_message'];
		               $query = "INSERT INTO chatter (fromer,toer,data) VALUES ('$a','$f','$msg')"; 
					   $run = $con->query($query);
					   
		             }
					 
		        ?>
            </form>
			


        </div>
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
					echo "<div id=asidesone>";
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
						echo "&nbsp<li><a href=mains.php?phone=$j[$i]>$j[$i]</a></li>"; 
                   echo "<br>";
				     echo "<br>";
					   echo "</ul>";
						 	
						$i++;
                     					
				 }
                        					
	            }
				
	            }
                 echo "</div>";	        
 echo "</div>";	
              ?>
    </body>
</html>




<?php
$host = "localhost"; 
$user = "root";
 $pass = ""; 
 $db_name = "chatting";
 $con = new mysqli($host, $user, $pass, $db_name);
 
 function formatDate($date)
 {
	  return date('g:i a',strtotime($date));
 }
?>
<!DOCTYPE html>

<html> 
    <head> 
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
            <div id="chat_box">
             <div id="chat"></div>			
			
            </div> 
            <form method="post" action="index.php">
			
                <input type="text" name="name" placeholder="Enter Name: " />
                <textarea name="enter message" placeholder="Enter Message"></textarea>
                <input type="submit" name="submit" value="Send!" /> 
				<?php 
			          if(isset($_POST['submit']))
			         { 
		               $name = $_POST['name']; 
		               $msg = $_POST['enter_message'];
		               $query = "INSERT INTO chat (name,msg) VALUES ('$name','$msg')"; 
					   $run = $con->query($query);
                         /* if($run)
						  {
							  echo "<embed loop='false' src='chat.wav hidden='true' autoplay='true'/>";
						  }	*/						  
		             }
					 
		        ?>
            </form>
			


        </div>
    </body>
</html>




<?php  
       include 'db.php';
	   session_start();
	   
			 $k=$_SESSION['unames'];
			 $t=$_SESSION['to'];
			$query = 'SELECT * FROM chatter';
			$run = $con->query($query); 
			
			while($row = $run->fetch_array()) :
?>


                
				<?php
				$x=2;
                    if(($row['fromer']==$k)&&($row['toer']==$t)):
					?>
					 <div id="chat_data">
                    <span style="color:green;"><?php echo $row['fromer']; ?> : </span> 
					
					
					<span style="color:brown;"><?php echo $row['data']; ?></span>
					
					<span style="float:right;"><?php echo formatDate($row['time']); ?></span>
					</div>
					<?php 
					     $x=1;
                      endif;					
				     if(($row['fromer']==$t)&&($row['toer']==$k)&&($x==2)):
					 
					?>
					  <div id="chat_data">    
                    <span style="color:green;"><?php echo $row['fromer']; ?> : </span> 
					
					
					<span style="color:brown;"><?php echo $row['data']; ?></span>
					
					<span style="float:right;"><?php echo formatDate($row['time']); ?></span>
					<?php endif; ?>

                    </div>					
                 
				<?php endwhile; ?>

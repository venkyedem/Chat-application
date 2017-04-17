<?php
//create_cat.php
include 'connect.php';
include 'header.php';
 
$sql = "SELECT  topic_id,topic_subject FROM topics WHERE topic_id = " . mysql_real_escape_string($_GET['id']);
 
$result = mysql_query($sql);
 
if(!$result)
{
    echo 'No topics.';
}
else
{
	$sql="SELECT posts.post_topic,posts.post_content,posts.post_date,posts.post_by,users.user_id,users.user_name FROM posts LEFT JOIN  users ON posts.post_by = users.user_id WHERE posts.post_topic = " . mysql_real_escape_string($_GET['id']);
	$results = mysql_query($sql);
    if(mysql_num_rows($results) == 0)
    {
        echo 'No topics defined yet.';
    }
    else
    {
      echo '<table border="1">
              <tr>
                <th>Time</th>
                <th> topic</th>
              </tr>'; 
       
             
        while($row = mysql_fetch_assoc($results))
        {               
            echo '<tr>';
                echo '<td class="leftpart">';
                    echo $row['post_date'];
                echo '</td>';
				echo '<td class="rightpart">';
                    echo $row['post_content'];
                echo '</td>';
            echo '</tr>';
        }
    }
}
 
include 'footer.php';
?>
<?php

include 'connect.php';
include 'header.php';
 
$sql = "select cat_id,cat_name,cat_description from categories";
 
$result = mysql_query($sql);
 
if(!$result)
{
    echo 'The categories could not be displayed, please try again later.';
}
else
{
    if(mysql_num_rows($result) == 0)
    {
        echo 'No categories defined yet.';
    }
    else
    {
      
        echo '<table border="1">
              <tr>
                <th>Category</th>
                <th>Last topic</th>
              </tr>'; 
             
        while($row = mysql_fetch_assoc($result))
        {               
            echo '<tr>';
                echo '<td class="leftpart">';
                    echo '<h3><a href="category.php?id='.$row['cat_id'].'">' . $row['cat_name'] . '</a></h3>' . $row['cat_description'];
                echo '</td>';
                echo '<td class="rightpart">';
                            echo '<a href="topic.php?id='.$row['cat_id'].'">Topic subject</a> at 10-10';
                echo '</td>';
            echo '</tr>';
        }
    }
}
 
include 'footer.php';
?>
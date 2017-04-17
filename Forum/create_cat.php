<?php
//create_cat.php
include 'connect.php';
include 'header.php';
 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
   
    echo '<form method=post action=create_cat.php>
        Category name: <input type=text name=cat_name />	
        Category description: <textarea name=cat_description /></textarea>
        <input type=submit value=Add category />
     </form>';
}
else
{
	$p=$_POST['cat_name'];

	$l=$_POST['cat_description'];
 
    $sql = "insert into categories(cat_name, cat_description) values('$p','$l')";
    $result = mysql_query($sql);
    if(!$result)
    {
      
        echo 'Error' . mysql_error();
    }
    else
    {
        echo 'New category successfully added.';
    }
}
?>
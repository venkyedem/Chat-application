<!DOCTYPE html>
<html>
<head>
<style>
input[type=text], select {
    width: 70%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=password] {
    width: 70%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 40%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
	position:absolute;
	left:35%;
	width:40%;
}
</style>
<script>
function checke()
{
	
var x=d.firstname.value;
var y=d.lastname.value;
var z=d.password.value;
var a=d.re-passowrd.value;
 

if(a==z)
{
	alert("Password you rentered is wrong");
}
if(x==null||y==null)
{
	alert("enter full details");
}
}
</script>
</head>
<body>

<h3>SIGN UP </h3>

<div>
  <form name="d">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name.."><br>

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name.."><br>

    <label for="Password">Password</label>
     <input type="password" id="pass" name="password" placeholder="Password"><br>
	 
	 <label for="Re-Password">Re-enter Password</label>
     <input type="password" id="pass" name="re-password" placeholder="Password"><br>
  
    <input type="submit" value="Submit" onSubmit="checke()">
  </form>
</div>

</body>
</html>

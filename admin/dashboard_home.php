<h1 align="center" style="text-decoration:underline; color:#4F5B93"><a href="">Admin Dashboard</a></h1>
<?php 
//all complaints
$qq=mysqli_query($conn,"select * from faculty ");
$rows=mysqli_num_rows($qq);			
echo "<h2 style='color:#0f0e0f'>Total Number of Faculty : $rows</h2>";	

//all emegency compalints
$q=mysqli_query($conn,"select * from user");
$r1=mysqli_num_rows($q);			
echo "<h2 style='color:#0f0e0f'>Total Number of Student : $r1</h2>";	


//all users
$q2=mysqli_query($conn,"select * from feedback");
$r2=mysqli_num_rows($q2);			
echo "<h2 style='color:black'>Total Number feedback given by users  : $r2</h2>";	


					

?>

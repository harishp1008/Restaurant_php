<?php

$connect=mysqli_connect('localhost','root','12345','userregistration');
$query="select * from breaktable";
$result=mysqli_query($connect,$query)or die(mysqli_error($connect));
$user_data=array();

while($row=mysqli_fetch_array($result))
{
	$user_data[]=array(
		'id' => $row["id"],
		'category'=> $row["category"],
		'description' => $row["description"],
		'price' => (double)$row["price"],
		'qty'=>(int)$row["qty"]


	);

}
print_r( json_encode($user_data));
$file_name='breakfast.json';
if(file_put_contents(($file_name), json_encode($user_data)))
{
	echo $file_name . 'file created';
}
else
{
	echo 'something went wrong';
}

?>
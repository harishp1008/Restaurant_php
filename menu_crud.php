<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '12345', 'userregistration');

	// initialize variables
	
	$id = 0;
	$category="";
	$description="";
	$price=0;
	$qty=0;
	$update = false;

	if (isset($_POST['save'])) {
		$id = $_POST['id'];
		$category = $_POST['category'];
		$description=$_POST['description'];
		$price=$_POST['price'];
		$qty=$_POST['qty'];

		mysqli_query($db, "INSERT INTO breaktable (id, category,description,price,qty) VALUES ('$id', '$category','$description','$price','$qty')"); 
		$_SESSION['message'] = "added successfully"; 
		header('location: admin_menu.php');
	}
	 if (isset($_GET['update'])) {
        $id = $_GET['update'];
        $update = true;
        $record = mysqli_query($db, "SELECT * FROM breaktable WHERE id=$id");

        if (count($record) == 1 ) {
            $n = mysqli_fetch_array($record);
            $id = $n['id'];
            $category=$n['category'];
            $description = $n['description'];
            $price = $n['price'];
            $qty = $n['qty'];
        }
    }


    if (isset($_POST['update'])) {
	$id =  $_POST['id'];
    $category =  $_POST['category'];
    $description =  $_POST['description'];
    $price= $_POST['price'];
    $qty= $_POST['qty'];

	mysqli_query($db, "UPDATE breaktable SET id='$id', category='$category',description='$description',price='$price',qty='$qty' WHERE id=$id");
	$_SESSION['message'] = "Breakfast Menu updated!"; 
	header('location: admin_menu.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM breaktable WHERE id=$id");
	$_SESSION['message'] = "food deleted!"; 
	header('location: admin_menu.php');
}
	?>
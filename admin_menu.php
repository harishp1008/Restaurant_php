<!DOCTYPE html>
<html>

<?php include 'menu_crud.php' ?>
<?php 
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;
        $record = mysqli_query($db, "SELECT * FROM breaktable WHERE id=$id");


        if (count($record) == 1 ) {
            $n = mysqli_fetch_array($record);
            $id = $n['id'];
            $category = $n['category'];
            $description = $n['description'];
            $price=$n['price'];
            $qty=$n['qty'];
        }
    }
?>
<head>
	<title>Cinnamon's Login</title>
	<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
</head>
<style type="text/css">
    body {
    font-size: 19px;
}
table{
    width: 50%;
    margin: 30px auto;
    border-collapse: collapse;
    text-align: left;
}
tr {
    border-bottom: 1px solid #cbcbcb;
}
th, td{
    border: none;
    height: 30px;
    padding: 2px;
}
tr:hover {
    background: #F5F5F5;
}

form {
    width: 45%;
    margin: 50px auto;
    text-align: left;
    padding: 20px; 
    border: 1px solid #bbbbbb; 
    border-radius: 5px;
}

.input-group {
    margin: 10px 0px 10px 0px;
}
.input-group label {
    display: block;
    text-align: left;
    margin: 3px;
}
.input-group input {
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
}
.btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #5F9EA0;
    border: none;
    border-radius: 5px;
}
.edit_btn {
    text-decoration: none;
    padding: 2px 5px;
    background: #2E8B57;
    color: white;
    border-radius: 3px;
}

.del_btn {
    text-decoration: none;
    padding: 2px 5px;
    color: white;
    border-radius: 3px;
    background: #800000;
}
.msg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;
}



</style>
<body>
    <?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php 
            echo $_SESSION['message']; 
            unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>
	<!-- Material form contact -->

<?php $results = mysqli_query($db, "SELECT * FROM breaktable"); ?>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>description</th>
            <th>price</th>
            <th>qty</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    
    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['qty']; ?></td>
            <td>
                <a href="admin_menu.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
            
            </td>
            <td>
                <a href="admin_menu.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>


<div class="card" style="width: 50%;margin: 30px auto;">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>add a new menu</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0" >

        <!-- Form -->
        <form method="post" class="text-center" style="color: #757575;" action="menu_crud.php">

            <!-- Name -->
            <div class="md-form mt-3">
                <input type="number" name="id" id="materialContactFormName" class="form-control" value="<?php echo $id; ?>">
                <label for="materialContactFormName">id</label>
            </div>


            <!-- E-mail -->

            <!-- Subject -->
            <span>Category</span>
            <select class="mdb-select" name="foodtype">
                <option value="" disabled>Choose option</option>
                <option value="1" selected>maincourse</option>
                <option value="2">Starter</option>
                <option value="3">breakfast</option>
                <option value="4">desert</option>
            </select>
            <div class="md-form mt-3">
                <input type="text" id="category" name="category" class="form-control" value="<?php echo $category; ?>">
                <label for="category">Food name</label>
            </div>
            <div class="md-form mt-3">
                <input type="text" id="description" name="description" class="form-control" value="<?php echo $description; ?>">
                <label for="description">Description</label>
            </div>

          <div class="md-form mt-3">
                <input type="number" id="price" name="price" class="form-control" value="<?php echo $price; ?>">
                <label for="price">price</label>
            </div>
              <div class="md-form mt-3">
                <input type="number" id="qty" name="qty" class="form-control" value="<?php echo $qty; ?>">
                <label for="qty">Quantity</label>
            </div>
            <!-- Copy -->
            

            <!-- Send button -->
            <?php if ($update == true): ?>
    <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
    <button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form contact -->



</div>


</body>
</html>
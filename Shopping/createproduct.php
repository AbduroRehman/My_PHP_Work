<?php
include('session.php');
checkLogin();
include('db.php');

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // image upload
    $image = "";

    if(isset($_FILES['image']) && $_FILES['image']['name']!=""){

        $fileName = $_FILES['image']['name'];
        $tempName = $_FILES['image']['tmp_name'];

        // unique file name
        $image = time()."_".$fileName;

        // upload folder
        $folder = "uploads/".$image;

        
    }

    if (!empty($product_name) && !empty($price)) {

        $sql = "INSERT INTO products
        (product_name, price, description, image)
        VALUES
        ('$product_name','$price','$description','$image')";

        if(mysqli_query($conn,$sql)){
            $success = "Product added successfully.";
        }else{
            $error = "Database error.";
        }

    } else {
        $error = "Product name and price required.";
    }
}

include('header.php');
?>

<style>

.workspace{
width:1000px;
margin:40px auto;
overflow:hidden;
}

.content-area{
width:750px;
float:right;
background:#fff;
padding:30px;
border:1px solid #ddd;
border-radius:10px;
}

.form-group{
margin-bottom:20px;
}

.form-group label{
display:block;
margin-bottom:8px;
font-weight:bold;
}

.form-group input,
.form-group textarea{
width:100%;
padding:10px;
border:1px solid #ddd;
border-radius:5px;
}

.action-btn{
background:#3b82f6;
color:white;
padding:10px 20px;
border:none;
border-radius:5px;
cursor:pointer;
}

.message{
padding:10px;
margin-bottom:15px;
text-align:center;
border-radius:5px;
}

.msg-error{
background:#ffdada;
color:red;
}

.msg-success{
background:#d6ffd6;
color:green;
}

</style>

<div class="workspace">

<?php include('sideBar.php'); ?>

<div class="content-area">

<h2>Add New Product</h2>

<?php if(!empty($error)){ ?>
<div class="message msg-error">
<?php echo $error; ?>
</div>
<?php } ?>

<?php if(!empty($success)){ ?>
<div class="message msg-success">
<?php echo $success; ?>
</div>
<?php } ?>

<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
<label>Product Name</label>
<input type="text" name="product_name">
</div>

<div class="form-group">
<label>Price</label>
<input type="text" name="price">
</div>

<div class="form-group">
<label>Description</label>
<textarea name="description"></textarea>
</div>

<div class="form-group">
<label>Product Image</label>
<input type="file" name="image">
</div>

<button type="submit" class="action-btn">
Save Product
</button>

</form>

</div>
</div>

</body>
</html>
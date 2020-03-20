<?php 
session_start();
include "db.php"; 
?>
<?php  
    $user_id = $_SESSION['id'];  
    $p_id = $_POST['p_id'];
    $quantity = $_POST['quantity'];
    $query = "SELECT * FROM products WHERE p_id = $p_id";
    $select_product = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($select_product)) {
        
        $p_id = $row['p_id'];
        $p_title = $row['p_title'];
        $p_price = $row['p_price'];
        $p_img = $row['p_img'];
        $c_price=$p_price*$quantity;
    
    }
    
   $query = "INSERT INTO cart(c_title,c_price,c_img,user_id,pid,quantity) VALUES('$p_title','$c_price','$p_img','$user_id','$p_id','$quantity')";
   $insert_product = mysqli_query($conn,$query);
?>
<?php session_destroy(); session_start();

include "db.php"; 
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = '$email'";
$select_user_query = mysqli_query($conn, $query);
$rowcount = mysqli_num_rows($select_user_query);

if($rowcount == 0){
  echo "<script>window.location.href='/logout.php'</script>";
} 
else {
  $row = mysqli_fetch_assoc($select_user_query);
  if($row['password'] == $password && $row['isEmailConfirmed']== 1)
    {
      $_SESSION['id'] = $row['id'];
      $_SESSION['email'] = $email;
      $_SESSION['username'] = $row['username']; 
      if($email == "admin@mail.com"){
        echo 'admin';
      } else {
        echo 'login';
      }
    }   
   else if ($row['password'] == $password && $row['isEmailConfirmed']== 0) {
    echo 'unverified';
  }
  else {
    echo 'failed';
  }
}

?>
<?php


  require("database.php");

if( isset($_POST)&& !empty($_POST) ){
  $fname = $_POST['f_name'];
  $lname = $_POST['l_name'];
  $address = $_POST['address'];
  $dob = $_POST['dob'];

  $sql = "SELECT COUNT(*) FROM l_name WHERE customer = '$lname'";
  $statement = $db->prepare($sql);
  $count = $statement->fetchColumn();

  if( $count == 0){
    $sql = "INSERT INTO VALUES name(f_name,l_name ) (NULL, '$lname')";
    $statement = $db->prepare($sql);
    $statement->execute();
  }
  // get user's ID
  $sql = "SELECT g_id FROM customer WHERE l_name = '$lname'";
  $statement = $db->prepare($sql);
  $statement->execute();
  $result = $statement->fetch();
  $g_id = $result['g_id'];

  // add the customer
  $sql = "INSERT INTO customer(g_id, f_name, l_name, address, dob) VALUES ('".$g_id."','".$f_name."', '".$l_name."', '".$address."', '".$dob."')";
  $statement = $db->prepare($sql);
  $statement->execute();
  $cust_id = $db->lasttInsertedId();
  if( $cust_id > 0 ){
    header("Location: ./index.php");
  }else {
    echo "There was a problem";
    die();
  }


}else {
  header('Location ./index.php')
}

 ?>

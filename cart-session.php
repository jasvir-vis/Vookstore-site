<?php
include "connection.php";
session_start();
if(isset($_POST['cart'])){
  if(isset($_SESSION['cart'])){
    $myitems=array_column($_SESSION['cart'],'item_name');
    if(in_array($_POST['item-name'],$myitems)){

      echo "<script>alert('item is already added')</script>";
      
    }
    else{
    $count = count($_SESSION['cart']);
    $_SESSION['cart'][$count]=array('item_name'=>$_POST['item-name'],'author_name'=>$_POST['author'],'price'=>$_POST['price'],'off'=>$_POST['off'],'description'=>$_POST['description'],'image'=>$_POST['image'],'quantity'=>1);
    echo "<script>alert('item added to cart');
    window.location.href = 'add-to-card.php'; </script> ";
    }

  }
  else{
    $_SESSION['cart'][0]=array('item_name'=>$_POST['item-name'],'author_name'=>$_POST['author'],'price'=>$_POST['price'],'off'=>$_POST['off'],'description'=>$_POST['description'],'image'=>$_POST['image'],'quantity'=>1);
    echo "<script>alert('item added to cart'); 
    window.location.href = 'add-to-card.php';</script>";
  }
}

if(isset($_POST['remove'])){
  foreach($_SESSION['cart'] as $key => $value){
    if($value['item_name']==$_POST['item_name'])
    {
      unset($_SESSION['cart'][$key]);
      $_SESSION['cart']=array_values($_SESSION['cart']);
      echo '<script>alert("item removed"); </script>';
      echo '<script> window.location.href = "add-to-card.php"; </script>';
    }
  }
}

  if(isset($_POST['release'])){
    foreach($_SESSION['view'] as $key => $value){
      if($value['item_name']==$_POST['item_name'])
      {
        unset($_SESSION['view'][$key]);
        $_SESSION['view']=array_values($_SESSION['view']);
        echo '<script>alert("item removed"); </script>';
        echo '<script> window.location.href = "add-to-card.php"; </script>';
      }
    }
  }

if(isset($_POST['modify'])){
  foreach($_SESSION['cart'] as $key => $value){
    if($value['item_name']==$_POST['item_name'])
    {
      $_SESSION['cart'][$key]['quantity']=$_POST['modify'];
      echo '<script> window.location.href = "add-to-card.php"; </script>';
    }
  }
}


if(isset($_SESSION['login']) && $_SESSION['login']=true){
if(isset($_POST['placed'])){
  include "connection.php";
  $deliver_id = $_POST['cancel-id'];
  $jas = "UPDATE orders set status = 1 Where order_id = $deliver_id";
  $u = mysqli_query($conn,$jas);

  if($u){
      echo '<script>window.location.href = "user-order.php"; </script>';
  }
  else{
     echo '<script>alert("something error occur")</script>';
     echo '<script>window.location.href = "user-order.php"; </script>';
  }
}
}

if(isset($_POST['go-back'])){
  foreach($_SESSION['cart'] as $key => $value){
      unset($_SESSION['cart']);
      echo "<script> window.location.href = 'index.php';</script>";
    }
  }
  
   if(isset($_POST['cancel'])){
    $id = $_POST['cancel-id'];
    $del = "DELETE FROM `orders` where order_id = $id";
    $del_q = mysqli_query($conn,$del);
    if($del_q){
        echo "<script>alert('order cancel successfully');</script>";
        echo "<script> window.location.href = 'user-order.php';</script>";
    }
    else{
        echo "bad";
    }

}


?>


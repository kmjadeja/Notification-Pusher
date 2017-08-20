<?php 
  
  // Check Page Is Request 
    if(empty($_POST)) {
      header("location: index.php");
      exit();
    }

  // Create An Array To Store Error ["If Generated "]
    $errors = array();
  
  // Check For Empty Field [ "Server Side Validation" ]
    if(empty($_POST["txtName"]))
      $errors[] = "Name Is Empty";

    if(empty($_POST["txtMessage"]))
      $errors[] = "Message Is Empty";

  // Check There Is Any Error Or Not
    if(!empty($errors)) {
      header("location: index.php");
      exit();
    }

  //  Include Library
    require_once('lib/Pusher.php');
  
  // Set Variables
    $cluster    = "";     // Enter Your App Cluster
    $appId      = "";     // Enter App ID Here
    $appKey     = "";     // Enter Your Key Here
    $appSecret  = "";     // Enter Your Secret Key Here
  
  // Set Cluster
    $options = array(
    'cluster' => 'ap2',
    'encrypted' => false
    );

  // Create Object Of PUSHER Class
    $pusher = new Pusher(
      $appKey,
      $appSecret,
      $appId,
      $options
    );

  // Create Array Of Data For Notification
    $data["message"]  = $_POST["txtMessage"];
    $data["name"]     = $_POST["txtName"];
  

  // Send Notification
    $pusher->trigger('my-channel', 'my-event', $data);
    
  // Go Back To index Page 
  header("location: index.php");
  exit();
 ?>
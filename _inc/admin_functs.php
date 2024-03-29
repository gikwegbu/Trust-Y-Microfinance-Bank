<?

function save_reg_signature($c_id,$c_output,$s_output){
	
	<?php

/*
  The main logic of the application. There are a few steps here:
   1. Get the user input from the form
   2. Confirm the form was submitted
   3. Validate the form submission
   4. Open the database connection
   5. Insert the information into the database
   6. Trigger the display of the signature regeneration
*/

// Tracks what fields have validation errors
$errors = array();
// Default to showing the form
$show_form = true;

// 1. Get the input from the form
//  Using the PHP filters are the most secure way of doing it
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$output = filter_input(INPUT_POST, 'output', FILTER_UNSAFE_RAW);

// 2. Confirm the form was submitted before doing anything else
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  

  // 3. Validate that the submitted signature is in an acceptable format
  if (!json_decode($output)) {
    $errors['output'] = true;
  }

  // No validation errors exist, so we can start the database stuff
  if (empty($errors)) {
    
    include 'dbconn.php';

    
    // Create some other pieces of information about the user
    //  to confirm the legitimacy of their signature
    $sig_hash = sha1($output);
    $created = time();
    $ip = $_SERVER['REMOTE_ADDR'];

    // 5. Use PDO prepare to insert all the information into the database
    $sql = $db->prepare('
      INSERT INTO signatures (signator, signature, sig_hash, ip, created)
      VALUES (:signator, :signature, :sig_hash, :ip, :created)
    ');
    $sql->bindValue(':signator', $name, PDO::PARAM_STR);
    $sql->bindValue(':signature', $output, PDO::PARAM_STR);
    $sql->bindValue(':sig_hash', $sig_hash, PDO::PARAM_STR);
    $sql->bindValue(':ip', $ip, PDO::PARAM_STR);
    $sql->bindValue(':created', $created, PDO::PARAM_INT);
    $sql->execute();

    // 6. Trigger the display of the signature regeneration
    $show_form = false;
  }
}
	
}
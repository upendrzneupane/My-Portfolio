<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  
  $receiving_email_address = 'upendraneupane344@gmail.com';
  $php_email_form = '../assets/vendor/php-email-form/php-email-form.php';
  
  // Check if the email library file exists
  if (!file_exists($php_email_form)) {
      die('Unable to load the "PHP Email Form" Library!');
  }
  
  require_once $php_email_form;
  
  // Ensure the php_email_form class exists before using it
  if (!class_exists('php_email_form')) {
      die('The PHP Email Form library is not properly defined!');
  }
  
  $contact = new php_email_form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = isset($_POST['name']) ? $_POST['name'] : 'No Name';
  $contact->from_email = isset($_POST['email']) ? $_POST['email'] : 'no-email@example.com';
  $contact->subject = isset($_POST['subject']) ? $_POST['subject'] : 'No Subject';
  
  // Uncomment and configure SMTP if needed
  /*
  $contact->smtp = array(
      'host' => 'example.com',
      'username' => 'example',
      'password' => 'pass',
      'port' => '587'
  );
  */
  
  // Add message details safely
  $contact->add_message($contact->from_name, 'From');
  $contact->add_message($contact->from_email, 'Email');
  $contact->add_message(isset($_POST['message']) ? $_POST['message'] : 'No message provided', 'Message', 10);
  
  // Send email and check for success
  if ($contact->send()) {
      echo 'Email sent successfully!';
  } else {
      echo 'Email sending failed!';
  }
  ?>
  
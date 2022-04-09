<?php
//check if User Coming From A Request
if ($_SERVER['REQUEST_METHOD']  == 'POST'){
   echo "ccccccc";
    //Assign Variables
    $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $cell = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
    $msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    //Creating Array of Errors
    $formErrors = array();
    if (strlen($user) <= 3) {
        $formErrors[] = 'Username Must Be Larger Than <strong>3</strong> characters';
    }
    if (strlen($msg) < 10) {
        $formErrors[] = 'Message Can\'t Be Less Than <strong>10</strong> characters';
    }
    //If No Errors Send The Email [ mail(To, Subject, Message, Headers, Parameters ) ]

      $headers = 'From: ' . $mail . '\r\n';
      $myEmail = 'osama.elzero@gmail.com' ;
      $subject = 'contact Form';


    if (empty($formErrors)) {
        mail($myEmail , $subject, $msg, $headers);

        $user = '';
        $mail = '';
        $cell = '';
        $msg = '';

        $success = '<div class="alert alert-sucess">We Have Recieved Your Message</div>';
 
      }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
    <input type="text" name="">
      <input type="text" name="">
      <input type="text" name="">
      <input type="text" name="">
      <input type="button"value="send">
    </form>
      
</body>
</html>
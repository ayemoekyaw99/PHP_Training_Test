<?php 
  require_once 'database.php';
  require_once 'vendor/autoload.php';
  session_start();
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  $mail = new PHPMailer(true);
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];
      $sql = "SELECT * FROM users WHERE email = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();
      $user = $result->fetch_assoc();
        if($user){
           $email=$user['email'];
          $password=$user['password'];
           $basePath = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
          $basePath = rtrim($basePath, '/');
        $link = "<a href='reset_password.php'>Click To Reset password</a>";
        // Initialize PHPMailer
        $mail = new PHPMailer(true);
        try {
            // SMTP configuration
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.example.com';                     
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'user@example.com';                    
            $mail->Password   = 'secret';                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 587;
            
            // Sender and recipient details
            $mail->setFrom('moe@gmail.com', 'Mailer');
            $mail->addAddress('joe@example.net', 'Joe User');     
            $mail->addAddress('ellen@example.com');               
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');
            
            $mail->Subject = 'Reset Password';
            $mail->Body = 'Click On This Link to Reset Password ' . $link . '.';
            // Send the email
            if ($mail->send()) {
                $_SESSION['mail_sent'] = true;
                header("Location: forget_password.php");
                exit;
            }
        } catch (Exception $e) {
            echo "Mail Error: " . $mail->ErrorInfo;
        }
    } else {
        $_SESSION['do_not_exist'] = true;
        header("Location: forget_password.php");
        exit;
    }
  }
 $conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Send Link</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class=" container mt-5 ">
    <div class="col-8 offset-2">
      <form action="reset_password.php" method="post">
        <div>
          <button href="reset_password.php" class="btn text-primary">Reset Password</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
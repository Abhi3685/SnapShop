<?php

include "db.php";
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/vendor/autoload.php';

$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="sOBJCryAyg";

$parts = explode(",", $productinfo);
$parts_count = count($parts);
unset($parts[$parts_count-1]);
$p_ids = implode(",",$parts);

$user_id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$user_details = mysqli_fetch_assoc(mysqli_query($conn,$query));
$query = "INSERT INTO orders(o_status,o_txnid,o_amt,o_customer,o_products) VALUES('$status','$txnid','$amount','$firstname','$p_ids')";
$insert_order = mysqli_query($conn,$query);


If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
       if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
		   } else {

              $mail = new PHPMailer(true); 

                                           // Passing `true` enables exceptions
          try {
              //Server settings
              $mail->SMTPDebug = 0;                                 // Enable verbose debug output
              $mail->isSMTP();                                      // Set mailer to use SMTP
              $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
              $mail->SMTPAuth = true;                               // Enable SMTP authentication
              $mail->Username = 'snapshopcustomerverify@gmail.com';                 // SMTP username
              $mail->Password = 'snapshop2112';                           // SMTP password
              $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
              $mail->Port = 587;                                    // TCP port to connect to

              //Recipients
              $mail->setFrom('snapshopcustomerverify@gmail.com', 'Snapshop Payment Confirmation');
              $mail->addAddress($email,$firstname);     // Add a recipient
              $mail->addReplyTo('snapshopcustomerverify@gmail.com', 'Snapshop');

              //Content
              $mail->isHTML(true);                                  // Set email format to HTML
              $mail->Subject = 'Payment Confirmation Mail';
              $mail->Body    = "<!doctype html>

<html>

<head>

    <meta charset='utf-8'>

    <style>

    .invoice-box {

        max-width: 800px;

        margin: auto;

        padding: 30px;

        border: 1px solid #eee;

        box-shadow: 0 0 10px rgba(0, 0, 0, .15);

        font-size: 16px;

        line-height: 24px;

        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;

        color: #555;

    }

    

    .invoice-box table {

        width: 100%;

        line-height: inherit;

        text-align: left;

    }

    

    .invoice-box table td {

        padding: 5px;

        vertical-align: top;

    }

    

    .invoice-box table tr td:nth-child(2) {

        text-align: right;

    }

    

    .invoice-box table tr.top table td {

        padding-bottom: 20px;

    }

    

    .invoice-box table tr.top table td.title {

        font-size: 45px;

        line-height: 45px;

        color: #333;

    }

    

    .invoice-box table tr.information table td {

        padding-bottom: 40px;

    }

    

    .invoice-box table tr.heading td {

        background: #eee;

        border-bottom: 1px solid #ddd;

        font-weight: bold;

    }

    

    .invoice-box table tr.details td {

        padding-bottom: 20px;

    }

    

    .invoice-box table tr.item td{

        border-bottom: 1px solid #eee;

    }

    

    .invoice-box table tr.item.last td {

        border-bottom: none;

    }

    

    .invoice-box table tr.total td:nth-child(2) {

        border-top: 2px solid #eee;

        font-weight: bold;

    }

    

    @media only screen and (max-width: 600px) {

        .invoice-box table tr.top table td {

            width: 100%;

            display: block;

            text-align: center;

        }

        

        .invoice-box table tr.information table td {

            width: 100%;

            display: block;

            text-align: center;

        }

    }

    

    /** RTL **/

    .rtl {

        direction: rtl;

        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;

    }

    

    .rtl table {

        text-align: right;

    }

    

    .rtl table tr td:nth-child(2) {

        text-align: left;

    }

    </style>

</head>



<body>

    <div class='invoice-box'>

        <table cellpadding='0' cellspacing='0'>

            <tr class='top'>

                <td colspan='2'>

                    <table>

                        <tr>

                            <td class='title'>

                            <img src='https://res.cloudinary.com/snapshop/image/upload/v1533374028/invoicelogo.png' style='width:100%; max-width:300px;'>

                            </td>

                            

                            <td>

                                Invoice #: $txnid<br>

                                Created: 12 August 2018

                            </td>

                        </tr>

                    </table>

                </td>

            </tr>

            

            <tr class='information'>

                <td colspan='2'>

                    <table>

                        <tr>

                            <td>

                                Snapshop, Inc.<br>

                                12345 Sunny Road<br>

                                Sunnyville, CA 12345

                            </td>

                            

                            <td>

                                $firstname <br>

                            </td>

                        </tr>

                    </table>

                </td>

            </tr>


            <tr class='heading'>

                <td>

                    Item 

                </td>

                

                <td>

                    Price

                </td>

            </tr>

            

            <tr class='item'>

                <td>

                    Shopping Items

                </td>

                

                <td>

                    ₹$amount

                </td>

            </tr>


            <tr class='item'>

                <td>

                    GST ( 18% )

                </td>

                

                <td>

                    PAID/-

                </td>

            </tr>
            

            <tr class='total'>

                <td></td>

                

                <td>

                   Total: ₹$amount

                </td>

            </tr>

        </table>

    </div>

</body>

</html>";
              $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

              $mail->send();
              echo 'Message has been sent';
          } catch (Exception $e) {
              echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
          }

          // echo "<script>window.location.href='index.php';</script>";
          echo "<h3>Thank You. Your payment is successful . Your order status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $amount . ".</h4>";
          // echo "<script>window.location.href='index.php';</script>";
       }
?>	
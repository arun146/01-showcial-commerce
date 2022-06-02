<?php 

session_start();

//$security_code=$_POST['security_code'];

if(isset($_POST)) {

 if ($_SESSION['security_code']==$security_code) {

   if (isset($_POST['name']) && isset($_POST['email'])){

			$nameErr = $businessErr = $phoneErr  = $emailErr = $websiteErr = "";

			if (empty($_POST["name"])) {

			$nameErr = "Name is required";

			} else {

			$name=$_POST['name'];

			}

         if (empty($_POST["business"])) {

         $businessErr = "Business name is required";

         } else {

         $business=$_POST['business'];

         }

         if (empty($_POST["mobile"])) {

         $phoneErr = "Phone number is required";

         } else {

         $phone=$_POST['mobile'];

         }	

			if (empty($_POST["email"])) {

			$emailErr = "Email is required";

			} else {

			$email=$_POST['email'];

			}	 		

			if (empty($_POST["website"])) {

			$websiteErr = "Website is required";

			} else {

			$website=$_POST['website'];

			}

		if (!empty($name) && !empty($business) && !empty($phone) && !empty($email) && !empty($website)) {

		$verif='1';

		require 'mailer/class.phpmailer.php';

			function SendMail($to, $subject, $message2,$bcc1,$bcc2){

			$mail = new PHPMailer;

			$mail->IsSMTP();

			$mail->SMTPAuth = true;

			$mail->SMTPSecure = 'ssl';

			$mail->Host = "smtp.gmail.com";

			$mail->Port = 465; 

			$mail->Username = "letsroll@nautone.com";

			$mail->Password = "Social@club2022";			

			$mail->SetFrom("letsroll@nautone.com" , 'Nautone');			

			$mail->AddAddress($to);
         
         $mail->addBCC($bcc1);
         $mail->addBCC($bcc2);

			$mail->IsHTML(true);			

			$mail->Subject = $subject;

			$mail->Body = $message2;			

				if($mail->Send()){

				return true;

				}

		}

		$email_to = $email;

		$subject = "Showcial Commerce Free Assessment";

		$msg = '<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Get My Free Assessment</title>
      <style type="text/css">
        h4,.h4 {
          font-size: 1em;
          line-height: 1.4em;
        }

        .info-text {
          text-align: center;
        }

        p {
          font-family: Montserrat, sans-serif;
          font-size: 14px;
        }

        .payment-method {
          margin: 0;
          padding: 0px 15px 10px 15px;
          list-style: none;
          display: inline-block;
          width: 100%;
        }

        .payment-method li {
          margin: 5px 0;
        }

        img {
          vertical-align: middle;
        }

        .payment-method-spacing {
          padding-left: 50px;
        }

        .circle-disc {
          list-style: disc;
        }

        .header_cls {
          text-align: center;
          color: white;
          padding-top: 10px;
          font-size: 17px;
        }

        .column{
          background: white;
          margin-left: 17px;
          padding-left: 18px;
          padding-top: 20px;
        }
      </style>
   </head>
   <body paddingwidth="0" paddingheight="0" bgcolor="#d1d3d4" style="background: white;" offset="0" toppadding="0" leftpadding="0">
      <div style="background: #337ab7;">
         <div class="header_cls">Get My Free Assessment</div>
         <div  style="background: #337ab7;padding-left: 16px;padding-right: 36px;padding-top: 15px;
            padding-bottom: 39px;">
            <div class="column">
               <p>
                  Hello '.$name.',
               </p>
               <p>Thank you for submitting your response. Our brand strategist will get in touch with you shortly.</p>
               <div>
                  <p>Regards</p>
                  <p><span style="color:blue;font-weight:bold;">Nautone</span></p>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>';

			if ($verif=='1'){
            // $bcc_to1='';
            // $bcc_to2='';
			$result = SendMail($email_to, $subject, $msg);			

			if ($result) {
         $email_to2 ='arunraja@nautone.com';
			//$email_to2 ='logesh@nautone.com';
         //$bcc_to1='syed@nautone.com';
         //$bcc_to2='haamid@nautone.com';

			$subject2 = "Showcial Commerce Free Assessment";

			$msg2 = '<p>Dear Admin,</p>
<p>Please find the following details</p>
<br>
<table style="width:75%; border: 1px solid black; border-collapse: collapse;text-align:center;">
   <tr>
      <td colspan="2" style="padding: 10px; background-color: #005a5b; color: #ffffff; font-size:20px" >
         <strong>
            <center>Enquiry Details</center>
         </strong>
      </td>
   </tr>
   <tr>
      <td class="border" style="padding: 10px; border:1px solid #005a5b;">Name</td>
      <td class="border" style="padding: 10px; border:1px solid #005a5b;">'. $name.'</td>
   </tr>
   <tr>
      <td class="border" style="padding: 10px; border:1px solid #005a5b;">Business Name</td>
      <td class="border" style="padding: 10px; border:1px solid #005a5b;">'.$business.'</td>
   </tr>
   <tr>
      <td class="border" style="padding: 10px; border:1px solid #005a5b;">Phone Number</td>
      <td class="border" style="padding: 10px; border:1px solid #005a5b;">'.$phone.'</td>
   </tr> 
   <tr>
      <td class="border" style="padding: 10px; border:1px solid #005a5b;">Email Address</td>
      <td class="border" style="padding: 10px; border:1px solid #005a5b;">'.$email.'</td>
   </tr>   
   <tr>
      <td class="border" style="padding: 10px; border:1px solid #005a5b;"> Website</td>
      <td class="border" style="padding: 10px; border:1px solid #005a5b;">'.$website.'</td>
   </tr>
</table>';

			$result2 = SendMail($email_to2, $subject2, $msg2,$bcc_to1,$bcc_to2);

				if ($result2) {

					echo json_encode(array('success' => 1,'message'=>'Mail sent successfully'));		

				}else{

					echo json_encode(array('success' => 0,'message'=>'Mail not sent.please try again later'));				
				}

			}else{

			echo json_encode(array('success' => 0,'message'=>'Error Mail not sent'));			

			}

			}else{

				echo json_encode(array('success' => 0,'message'=>'Mail not sent'));				

			}

	 }else{

	 	echo json_encode(array('success' => 0,'message'=>'Please fill empty value'));

	  }

	}

  }else{

	echo json_encode(array('success' => 0,'message'=>'Please enter valid captcha'));

}

}
?>
<?php

    $name = $_POST["fname"];
    $surname = $_POST["surname"];
    $telephone = $_POST["tel"];
    $email = $_POST["email"];
    $propertyUse = $_POST["puse"];
    $productsProvided = $_POST["products_provided"];
    $propertyNumber = $_POST["property_num"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $postcode = $_POST["postcode"];
    $propertyType = $_POST["property_type"];
    $bathrooms = $_POST["Bathrooms"];
    $bedrooms = $_POST["Bedrooms"];
    $pictures = $_POST["pictures"];
    $cleanType = $_POST["cleantype"];
    $oven = $_POST["oven"];
    $laundry = $_POST["laundry"];
    $prefDate = $_POST["prefdate"];
    $prefDate2time = $_POST["prefdate2time"];
    $prefDate2day = $_POST["prefdate2day"];
    $comments = $_POST["comments"];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer(true);

try {								
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'lgcleaningservices04@gmail.com';				
	$mail->Password = 'mazotssthyrlqovs';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;

	$mail->setFrom($email, $name);		
	$mail->addAddress('black1984@hotmail.co.uk');
	
        
    $mail->isHTML(true);								
    $mail->Subject = "**QUOTE** for $name $surname at $address";
    $mail->Body = "<h1>please provide a quote for:</h1>
        Name: $name <br>
        Surname: $surname<br>
        Telephone: $telephone<br>
        Email: $email<br>
        Property use: $propertyUse<br>
        Products provided: $productsProvided<br>
        Property number: $propertyNumber<br>
        Address: $address<br>
        City: $city<br>
        Postcode: $postcode<br>
        Property type: $propertyType<br>
        Bathrooms: $bathrooms<br>
        Bedrooms: $bedrooms<br>
        Clean type: $cleanType<br>
        Oven clean: $oven<br>
        Laundry: $laundry<br>
        Preferred date: $prefDate<br>
        Best time to book: $prefDate2time<br>
        Best days to book: $prefDate2day<br>
        Additional information: $comments";
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';

foreach ($_FILES["pictures"]["name"] as $k => $v) {
    if (isset($_FILES['pictures'])) {
        $errors= array();
        $file_name = $_FILES['pictures']['name'][$k];
        $file_size = $_FILES['pictures']['size'][$k];
        $file_tmp = $_FILES['pictures']['tmp_name'][$k];
        $file_type = $_FILES['pictures']['type'][$k];
        $file_ext=strtolower(end(explode('.',$_FILES['pictures']['name'][$k])));
        
        $expensions= array("jpeg","jpg","png");
    }   
    if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    if($file_size > 10097152) {
        $errors[]='File size must be excately 10 MB';
    }
    
    if(empty($errors)==true) {
        $mail->AddAttachment( $_FILES["pictures"]["tmp_name"][$k], $_FILES["pictures"]["name"][$k] );
    }
}

$mail->send();
    echo '<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=-1.0">
            <title>success</title>
            <link rel="stylesheet" href="styles/styles.css">
        </head>
        <body>
            <header class="bigcontainer">
                <img src="images/lglogo.svg" class="logo" alt="lglogo">
               <input type="checkbox" class="navtoggle" id="navtoggle">
                <nav>
                    <ul class="nav">
                        <li id="homeb"><a href="index.html">home</a></li>
                        <li id="servicesb"><a href="services.html">Services</a></li>
                        <li id="bookingb"><a href="booking.html">Booking</a></li>
                        <li id="aboutb"><a href="about.html">About us</a></li>
                        <li id="contactb"><a href="contact.html">Contact us</a></li>
                     </ul>
                </nav>
                <label for="navtoggle" class="navtogglebutton">
                    <span></span>
                </label>
            </header>
            
            <div class="bookingbackground">
                <form class="form1" id="theform" action="email.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>You\'re one step closer to a clean property</legend>
                        <div class="tickbox">
                            <img class="greentick" src="images/success-green-check-mark-icon.svg" alt="">
                            <p class="thanks">Thank you for your enquiry. LG Cleaning Services are currently working on youre request and will be in contact with you shortly..</p>
                        </div>
                    </fieldset>
                </form>
            </div>
            <p name="data"></p>
            <div class="bookingprocedure">
                <h2>Booking Procedure </h2>
            </div>
        
            <div class="bookingtext">
                <p>
                For all booking enquiries please call, text or email us using our contact details or use the booking form below.</p>
                <p>Bookings made inside the 24 hour window will be classed as an emergency booking and charged accordingly (please see pricelist)
                </p>
                Telephone: 07301 246 539
                Telegram: 07301 246 539
                Text: 07301 246 539
                Email: <a href="mailto:LGcleaning-services@outlook.com">LGcleaning-services@outlook.com</a>
            </div>
            
            <div class="Cancellation">
                <h2>Cancellation Procedure</h2>
                
                Please call, text or email with the booking information to cancel and/or reschedule.
                Below sets out the timeframe and fees for cancellations.<br>
                0 - 24 hours – 50% of booking to be paid<br>
                25 - 48 hours – 25% of booking to be paid <br>
                
                49 + hours – free Cancellation
            </div>
         
            <script src="scripts/index.js"></script>
        </body>
    </html>';
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>

<?php
	// Message Vars
	$msg = '';
	$msgClass = '';

	// Check For Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$message = htmlspecialchars($_POST['message']);     

		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($message)){
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please use a valid email';
				$msgClass = 'alert-danger';
			} else {
				// Passed
				$toEmail = 'Skiplab.innovation@gmail.com';
				$subject = 'Contact Request From '.$name;
				$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Message</h4><p>'.$message.'</p>
				';

				// Email Headers
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					// Email Sent
					$msg = 'Your email has been sent';
					$msgClass = 'alert-success';
				} else {
					// Failed
					$msg = 'Your email was not sent';
					$msgClass = 'alert-danger';
				}
			}
		} else {
			// Failed
			$msg = 'Please fill in all fields';
			$msgClass = 'alert-danger';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skiplab Innovation</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.css" />
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
     <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/slick.css">
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a href="index" class="navbar-brand"> <img src="image/SK!P.png" alt="" height="50px"> Skiplab
                Innovation</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="index" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="about" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="ourwork" class="nav-link">Our work</a>
                    </li>
                    <li class="nav-item">
                        <a href="services" class="nav-link">Services</a>
                    </li>

                    <li class="nav-item  active">
                        <a href="contact" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header id="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto text-center">
                    <h1>Contact</h1>

                </div>
            </div>
        </div>
    </header>

    <section>

        <section class="mb-4">

            <!--Section heading-->
            <div>


                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-9 mb-md-0 mb-5">
                   
                            <div class="container">	
                                    <?php if($msg != ''): ?>
                                        <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
                                    <?php endif; ?>
                                  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                      <div class="form-group">
                                          <label>Name</label>
                                          <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                                      </div>
                                      <div class="form-group">
                                          <label>Email</label>
                                          <input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                                      </div>
                                      <div class="form-group">
                                          <label>Message</label>
                                          <textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
                                      </div>
                                      <br>
                                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                  </form>
                                </div>   


                        <div class="status"></div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-3 text-center" id="contact-icon">
                        <h2 class="h1-responsive font-weight-bold text-center my-4">Get In Touch</h2>
                        <!--Section description-->
                        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not
                            hesitate to
                            contact us. Our team will get back to you in
                            no time.</p>
                        <ul class="list-unstyled mb-0">
                            <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                <p>Lekki, Lagos, Nigeria</p>
                            </li>

                            <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                <p>+2348130308873, +2348153023435 </p>
                            </li>

                            <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                                <p>Skiplab.innovation@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                </div>

        </section>

    </section>

  
    <footer class="site-footer">
        <div class="container" id="container-footer">

            <div class="row">

                <div class="col-md-4">
                    <h4 id="h4">Quick Links</h4>
                    <ul class="footer-lists">
                        <li class="footer-list">
                            <a href="index"> Home</a>
                        </li>

                        <li class="footer-list">
                            <a href="about"> About us</a>
                        </li>

                        <li class="footer-list">
                            <a href="services">Services</a>
                        </li>

                        <li class="footer-list">
                            <a href="ourwork">Our work</a>
                        </li>

                        <li class="footer-list">
                            <a href="contact">Contact Us</a>
                        </li>


                    </ul>

                </div>

                <div class="col-md-4">
                  <h4>Services</h4>
                    <ul class="footer-lists">
                        <li class=" footer-list">Software development </li>
                        <li class=" footer-list">Software management</li>
                        <li class=" footer-list">App design</li>
                        <li class=" footer-list">Web development</li>
                        <li class=" footer-list">Web design</li>
                        <li class=" footer-list">Mobile strategy</li>

                    </ul>

                </div>


                <div class="col-md-4" id="footer-icon">
                        
                        
                        
                          
                        
                        
                          <p>  
                              <a href="tel:+2348130308873">
                                <i class="fas fa-phone mt-4 fa-2x"> </i>
                                 <span class="nums"> +2348130308873</span>
                            </a>
                        </p>

                        
                      <p> 
                          <a href="mailto:Skiplab.innovation@gmail.com">
                            <i class="fas fa-envelope mt-4 fa-2x"></i>
                            <span class="nums">Skiplab.innovation@gmail.com </span> 
                        </a>
                    </p> 
                   
                    

                </div>

            </div>
            <p class="text-center">Copyright 2019 &copy; Skiplab</p>
        </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar-fixed.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
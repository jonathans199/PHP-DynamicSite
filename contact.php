<?php 
define("TITLE", "Contact us | Franklin's fine dining");

include('includes/header.php');

  /*
		NOTE:
		In the form in contact.php, the name text field has the name "name"
		If the user submits the form, the $_POST['name'] variable will be
		automatically created, and will contain the text they typed into
		the field. The $_POST['email'] variable will contain whatever they typed
		into the email field.
	
	
		PHP used in this script:
		
		preg_match()
		- Perform a regular expression match
		- http://ca2.php.net/preg_match
		
		isset()
		- Determine if a variable is set and is not NULL
		- http://ca2.php.net/manual/en/function.isset.php
		
		$_POST
		- An associative array of variables passed to the current script via the HTTP POST method.
		- http://www.php.net/manual/en/reserved.variables.post.php
		
		trim()
		- Strip whitespace (or other characters) from the beginning and end of a string
		- http://www.php.net/manual/en/function.trim.php
		
		exit
		- Output a message and terminate the current script
		- http://www.php.net//manual/en/function.exit.php
		
		die()
		- Equivalent to exit
		- http://ca1.php.net/manual/en/function.die.php
		
		wordwrap()
		- Wraps a string to a given number of characters
		- http://ca1.php.net/manual/en/function.wordwrap.php
		
		mail()
		- Send mail
		- http://ca1.php.net/manual/en/function.mail.php
 */

?>

<div id="contact">
    <hr>

    <h1>Get in touch with us!</h1>

    <?php 

        //check for header injection
      function has_header_injection($str)
      {
        return preg_match("/[\r\n]/", $str);
      }

      if (isset($_POST['contact_submit'])) { //checks if the POST sends variable

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $msg = ($_POST['message']);

          //check to see if $name or $email have header injections
        if (has_header_injection($name) || has_header_injection($email)) {
          die();
        }

        if (!$name || !$email || !$msg) { //if any of these fields are empty
          echo ' <h4 class="error"> All fields required.  </h4> <a href="contact.php" class="button"> Go back and try again </a>';
          exit;
        } 
          
          // add the recipient email to a variable 

        $to = "jonathans199@gmail.com";

          // create a subject
        $subject = "hello $name we've sent you a message";

          // Construct the message
        $message = "Name: $name\r\n"; // \r \n is a line break
        $message .= "Email: $email\r\n";
        $message .= "Message:\r\n$msg";

          //check if the subscribe checkbox was checked

        if (isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe') {
              //add a new line to the message variable
          $message .= "\r\n\r\nPlease add the $email to the mailing list.\r\n";
        }

          //wrap it at 72 chars
        $message = wordwrap($message, 72);
          
          // set mail headers
        $headers = "MIME=Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "From: $name <$email> \r\n"; //<$email> is getting the email 
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High\r\n";

          //send the email
        mail($to, $subject, $message, $headers);

      ?>

    <!-- show success message after email has sent -->
    <h5>Thanks for contacting us </h5>
    <p>Please allow 24 hours for a response</p>
    <p><a href="/final" >&laquo: Go to the home page</a></p>

    <?php 
  } else { ?>

    <form method="post" action="" id="contact-form">
      <label for="name">Your name</label>
      <input type="text" id="name" name="name">

      <label for="email">Your Email</label>
      <input type="email" id="email" name="email">

      <label for="message">and your message</label>
      <textarea name="message" id="message" cols="30" rows="10"></textarea>


      <input type="checkbox" id="subscribe" name="subscribe" value="Subscribe">
      <label for="subscribe">Subscribe to Newsletter</label>

      <input type="submit" class="button next" name="contact_submit" value="Send Message">

    </form>

    <?php  } ?>

    <hr>

</div>







<?php include('includes/footer.php'); ?>
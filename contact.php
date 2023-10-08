<?php
    define("TITLE", "Contact page");
    include("includes/header.php");

?>
    <section class="contact-page">
        <h1>Contact us</h1>
        <?php
        
            //check for header injections
            function has_header_injection($str) {
                return preg_match( "*/[\r\n]/*", $str );
            }
        
            if(isset ($_POST["contact_submit"])) {

                $name = trim($_POST["name"]);
                $email = trim($_POST["email"]);
                $msg = $_POST["message"];

                //check to see if $name or $email have header injections
                if(has_header_injection($name) || has_header_injection($email)) {
                    die(); //if true, kill the script
                }

                if(!$name || !$email || !$msg){
                    echo "<p>All fields requared.</p><a href='contact.php'><input type='button' value='back to form'></a>";
                    exit;
                }

                // Add the recipient email to a variable
                $to = "davis178@inbox.lv";

                //Create a subject
                $subject = "$name set you a message via your contact form";

                //Contstruct the message
                $message = "Name: $name\r\n";
                $message .= "Email: $email\r\n";
                $message .= "Message:\r\n$msg";

                //if the the subscribe checkbox was checked...
                if(isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe') {

                    //add a new line to the $message
                    $message .= "\r\n\r\nPlease add $email to the mailing list.\r\n";
                }

                $message = wordwrap($message, 72);

                //set the mail headers into a varable
                $headers = "MIME-version: 1.0\r\n";
                $headers .= "Content-type: text/plain; charset=iso-8851-1\r\n";
                $headers .= "From: $name <$email>\r\n";
                $headers .= "X-Priority: 1\r\n";
                $headers .= "X-MSMail-Priority: High\r\n\r\n";

                //send the email
                mail($to, $subject, $message, $headers);
        ?>
        <!-- show suces message after email was send -->
                <h1>Mesage was sent!!!</h1>
                <a href="index.php"><input type="buttont" value="Back to home page"></a>
        <?php } else { ?>
        <form action="" method="post" id="contact-form">
            <label for="name">Name</label>
            <input type="text" id="name" name="name">

            <label for="email">Email</label>
            <input type="email" id="email" name="email">

            <label for="message">Your message</label>
            <textarea name="message" id="message"></textarea>

            <div class="checkbox">
                <input type="checkbox" name="subscribe" id="subscribe" value="subscribed">
                <label for="subscribe">Subscribe for more info</label>
            </div>

            <input type="submit" class="back-button" name="contact_submit" value="send mesage">
        </form>

        <?php } ?>
    </section>
<?php

    include("includes/footer.php");

?>
<!DOCTYPE HTML>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Comments Form - Response</title>
    </head>

    <body>
        <!-- PHP Script--> 
        <?php
            //cleanse database
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING);
            $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
            $number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
            $definition = filter_input(INPUT_POST, 'definition', FILTER_SANITIZE_STRING);
            $course = filter_input(INPUT_POST, 'course', FILTER_SANITIZE_STRING);
            $comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);
            //connect to database
            $link = mysqli_connect("localhost", "root", "", "php_3");
            //check connection
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            //insert data into database
            $sql = "INSERT INTO php_3 (name, mail, address, number, definition, course, comments) VALUES ('".$name."', '".$mail."', '".$address."', '".$number."', '".$definition."', '".$course."', '".$comments."')";
            if(mysqli_query($link, $sql)){
                echo "Records added successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
            //close connection
            mysqli_close($link);
            strip_tags($_POST['name']);

            $name = $_POST['name'];
            $mail = $_POST['mail'];
            $Address = $_POST['address'];
            $Number = $_POST['number'];
            $comment = $_POST['comment'];

            if (!empty($_POST['name'])) {
               $name = $_POST['name'];
               if (!is_string($name)) {
                $name = NULL;
                echo 'Please fill in your name<br>';
               }
            }
            
            else {
                $name = NULL;
                echo 'You must fill in your name<br>';
            }

            if (!empty($_POST['mail'])) {
                $mail = $_POST['mail'];

                $pattern = '/\b[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}\b/';
                if (!preg_match($pattern, $mail)) {
                    $mail = NULL;
                    echo 'Please enter a valid email address in the correct format';
                }
            }

            else {
                $mail = NULL;
                echo 'You must enter a valid email address<br>';
            }

            echo "<p>Hi $name, thank you for you comment: </p>";

            if (!empty($_POST['number'])) {
               $Number = $_POST['number'];
               if (!is_numeric($Number)) {
                $number = NULL;
                echo 'The value you enter must be number<br>';
               }

            }

            else {
                $Number = NULL;
                echo 'Please enter a number<br>';
            }
            

           if (isset($_POST['definition'])) {
            $definition = $_POST['definition'];
           }
           else {
            $definition = NULL;
           }
           if ($definition == NULL) {
            echo 'Please choose course skillset and course';
           }

           if (!empty ($_POST['comment'])) {
            $comment = $_POST['comment'];
        }
        else {
            $comment = NULL;
            echo 'Please enter a comment...';
        }

        #Statements to initialise variables if the
        #hidden form field values have been set
        $time = (!isset ($_POST['time'])) ? NULL: $_POST['time'];
        $user = (!isset ($_POST['user'])) ? NULL: $_POST['user'];

        #Statements to output valid data:
        if (($comment != NULL) && ($time != NULL) && ($user != NULL)) {
            echo "<p>Comment received: \"$comment\"<br> From $user at $time</p>";
        }
           
        ?>
    </body>
</html>
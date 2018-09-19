<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        //Slide 6
        echo "Chapter 15 Day 1 Examples" . "<br>";
        echo "Slide 6 " . "<br>";
        $pattern = '/Harris/';

        $author = 'Ray Harris';
        $editor = 'Joel Murach';

        $author_match = preg_match($pattern, $author);
        // $author_match is 1
        echo '<p>' . $author_match . '</p>';

        $editor_match = preg_match($pattern, $editor);   
        // $author_match is 0
        echo '<p>' . $editor_match . '</p>';

        echo "<br>";
        
            
        //Slide 7
        echo "Slide 7" . "<br>";
        if ($author_match === false) {
            echo 'Error testing author name.';
        } else if ($author_match === 0) {
            echo 'Author name does not contain Harris.';
        } else {
            echo 'Author name contains Harris.';
        }

        echo "<br>" . "<br>";
        
        
        //Slide 9
        echo "Slide 9" . "<br>";
        
        $string = 
        "© 2010 Mike's Music. \ All rights reserved (5/2010).";

        $test_match = preg_match('/\xA9/', $string);          
        // Matches © and returns 1
        echo '<p>' . $test_match  . '</p>';

//        $test_match = preg_match('///', $string);
//        // Returns FALSE and issues a warning
//        echo '<p>' . $test_match  . '</p>';

        $test_match = preg_match('/\//', $string);
        // Matches / and returns 1
        echo '<p>' . $test_match  . '</p>';

        $test_match = preg_match('/\\\\/', $string);
        // Matches \ and returns 1
        echo '<p>' . $test_match  . '</p>';

        echo "<br>" . "<br>";
          
            
        //Slide 11
        echo "Slide 11 " . "<br>";
        echo "<p>Character Types & Classes </p>";
        $string = 'The product code is MBT-3461.';

        $test_match = preg_match('/MB./', $string);           
        // Matches MBT and returns 1
        echo '<p>' . $test_match  . '</p>';

        $test_match = preg_match('/MB\d/', $string);  // \d = any digit          
        // Matches nothing and returns 0
        echo '<p>' . $test_match  . '</p>';

        $test_match = preg_match('/MBT-\d/', $string); // \d = any digit       
        // Matches MBT-3 and returns 1
        echo '<p>' . $test_match  . '</p>';

        $test_match = preg_match('/MB[TF]/', $string);           
        // Matches MBT and returns 1
        echo '<p>' . $test_match  . '</p>';

        $test_match = preg_match('/[.]/', $string);              
        // Matches . and returns 1
        echo '<p>' . $test_match  . '</p>';

        $test_match = preg_match('/[13579]/', $string);  //needs to find any of the digits (1,3,5,7,8)        
        // Matches 3 and returns 1
        echo '<p>' . $test_match  . '</p>';

        echo "<br>" . "<br>";  
        
            
        //Slide 12
        echo "<p>lide 12 - Metacharacters & Bracket expressions</p>";
 
        $string = 'The product code is MBT-3461.';

        $test_match = preg_match('/MB[^TF]/', $string);          
        // Matches nothing and returns 0
        echo '<p>' . $test_match  . '</p>';

        $test_match = preg_match('/MBT[^^]/', $string);          
        // Matches MBT- and returns 1
        echo '<p>' . $test_match  . '</p>';

        $test_match = preg_match('/MBT-[1-5]/', $string);        
        // Matches MBT-3 and returns 1
        echo '<p>' . $test_match  . '</p>';

        $test_match = preg_match('/MBT[_*-]/', $string);   //looking for underscore or asterisk or dash      
        // Matches MBT- and returns 1
        echo '<p>' . $test_match  . '</p>';

        echo "<br>" . "<br>";  
        
            
        //Slide 14
        echo "<p>Slide 14 - Matching string positions</p>";
        $author = 'Ray Harris';

        $test_match = preg_match('/^Ray/', $author);    // use ^ to match beg of string              
        // Returns 1
        echo '<p>' . $test_match  . '</p>';

        $test_match = preg_match('/Harris$/', $author); // use $ to match end of string              
        // Returns 1
        echo '<p>' . $test_match  . '</p>';

        $test_match = preg_match('/^Harris/', $author);               
        // Returns 0
        echo '<p>' . $test_match  . '</p>';

        $editor = 'Anne Boehm';

        $test_match = preg_match('/Ann/', $editor);                   
        // Returns 1
        echo '<p>' . $test_match  . '</p>';

        $test_match = preg_match('/Ann\b/', $editor);   // \b beg or end of a word (must not be inside brackets)              
        // Returns 0
        echo '<p>' . $test_match  . '</p>';

        echo "<br>" . "<br>";  
            
            
        //Slide 15
        echo "<p>Slide 15 - Matching subpatterns</p>";
        
        $name = 'Rob Robertson';

        $test_match = preg_match('/^(Rob)|(Bob)\b/', $name);   //match Rob at beg; or Bob at beg or end       
        // Returns 1
        echo '<p>' . $test_match  . '</p>';

        $test_match = preg_match('/^(\w\w\w) \1/', $name);  //^ match beg of string; \w is any letter, number or underscore          
        // Returns 1
        echo '<p>' . $test_match  . '</p>';

        echo "<br>" . "<br>";  
            
            
        //Slide 16
        echo "<p>Slide 16 - Pattern Examples</p>";
        
        $pw_pattern = 
            '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{6,}$/';

        $password1 = 'sup3rsecret';
        $password2 = 'sup3rse(ret';

        $test_match = preg_match($pw_pattern, $password1); 
        // Assertion fails and returns 0
        echo '<p>' . $test_match  . '</p>';

        $test_match = preg_match($pw_pattern, $password2); 
        // Matches and returns 1
        echo '<p>' . $test_match  . '</p>';

        echo "<br>" . "<br>";  

        
        //Slide 17
        echo "<p>Slide 17 - Multi-line & global</p>";
        
        $string   = "Ray Harris\nAuthor";

        $pattern1 = '/Harris$/';
        $test_match = preg_match($pattern1, $string);      
            // Does not match Harris and returns 0
            // $: looks at the end of line
            // \n: newline
            // m: multiline regex

        echo '<p>' . $test_match  . '</p>';

        $pattern2 = '/Harris$/m';
        $test_match = preg_match($pattern2, $string);
            // Matches Harris and returns 1
        echo '<p>' . $test_match  . '</p>';
        
        $string  = 'MBT-6745 MBT-5712';
        $pattern = '/MBT-[[:digit:]]{4}/';

        $count = preg_match_all($pattern, $string, $matches);
            // Count is 2
        echo '<p>' . $count . '</p>';

        foreach ($matches[0] as $match) {
            echo '<div>' . $match . '</div>';  
            // Displays MBT-6745 and MBT-5712
        }

        echo "<br>" . "<br>";     
           
        
        //Slide 18
        echo "<p>Slide 18 - Replace & split</p>";
        
        $items = 'MBT-6745 MBS-5729';
        $items = preg_replace('/MB[ST]/', 'ITEM', $items);

        echo $items;       // Displays ITEM-6745 ITEM-5729
        
        echo "</br>" . "</br>";
        
        $items = 
            'MBT-6745 MBS-5729, MBT-6824, and MBS-5214'; 
            //entered by user, usually don't let user type in , and words like 'and'
        $pattern = '/[, ]+(and[ ]*)?/';
        $items = preg_split($pattern, $items);

        // $items contains: 	
        // 'MBT-6745', 'MBS-5729', 'MBT-6824', 'MBS-5214'

        foreach ($items as $item) {
            echo '<li>' . $item . '</li>';
        }

        echo "<br>" . "<br>";    
            
            
        //Slide 19
        echo "<p>Slide 19 - Tests phone format</p>";
        
        $phone = '559-555-6624'; 
        $phone_pattern = 
          '/^[[:digit:]]{3}-[[:digit:]]{3}-[[:digit:]]{4}$/';
        echo $match = preg_match($phone_pattern, $phone);  
        // Returns 1

        echo "<br>" . "<br>";     
            
            
        //Slide 20
            echo "<p>Slide 20 - Tests date format</p>";
            
            $date = '8/10/209';         // invalid date
            $date_pattern = '/^(0?[1-9]|1[0-2])\/'
                . '(0?[1-9]|[12][[:digit:]]|3[01])\/'
                 . '[[:digit:]]{4}$/';
            echo $match = preg_match($date_pattern, $date);    
                // Returns 0
            echo "<br>" . "<br>";
            
            $date = '8/10/2018';         // valid date
            $date_pattern = '/^(0?[1-9]|1[0-2])\/'
                . '(0?[1-9]|[12][[:digit:]]|3[01])\/'
                 . '[[:digit:]]{4}$/';
            echo $match = preg_match($date_pattern, $date);    
                // Returns 1
            
            echo "<br>" . "<br>";      
            
            
        //Slide 21
            echo "Slide 21 " . "<br>";
            echo "<p>Email validation</p>";
            
            function valid_email ($email) {
                $parts = explode("@", $email);
                if (count($parts) != 2 ) return false;
                if (strlen($parts[0]) > 64) return false;
                if (strlen($parts[1]) > 255) return false;

                $atom = '[[:alnum:]_!#$%&\'*+\/=?^`{|}~-]+';
                $dotatom = '(\.' . $atom . ')*';
                $address = '(^' . $atom . $dotatom . '$)';
                $char = '([^\\\\"])';
                $esc  = '(\\\\[\\\\"])';
                $text = '(' . $char . '|' . $esc . ')+';
                $quoted = '(^"' . $text . '"$)';
                $local_part = '/' . $address . '|' . $quoted . '/';
                $local_match = preg_match($local_part, $parts[0]);
                if ($local_match === false 
                    || $local_match != 1) return false;

                $hostname = 
                    '([[:alnum:]]([-[:alnum:]]{0,62}[[:alnum:]])?)';
                $hostnames = '(' . $hostname . 
                             '(\.' . $hostname . ')*)';
                $top = '\.[[:alnum:]]{2,6}';
                $domain_part = '/^' . $hostnames . $top . '$/';
                $domain_match = preg_match($domain_part, $parts[1]);
                if ($domain_match === false 
                    || $domain_match != 1) return false;

                return true;
            }
            
            if (valid_email ("mickey@mouse")) {
                echo "Valid!";
            } else { echo "Invalid!"; }

            echo "<br>" . "<br>";      

        
        //Chapter 15 Day 2
        //Slide 7
            echo "Chapter 15 Day 2 Examples" . "<br>";
            echo "Slide 7 - function that may throw an Exception" . "<br>";
//            function calculate_future_value(
//               $investment, $interest_rate, $years) {
//            if  ($investment <= 0 || 
//                 $interest_rate <= 0 || 
//                 $years <= 0 ) {
//              throw new Exception("Please check all entries.");
//            }
//
//            $future_value = $investment;
//            for ($i = 1; $i <= $years; $i++) {
//                $future_value = 
//                    ($future_value + 
//                        ($future_value * $interest_rate * .01)); 
//            }
//            return round($futureValue, 2);
//        }
//
//        $futureValue = 
//            calculate_future_value(10000, 0.06, 0);
//
        echo "<br>" . "<br>";       
        
        //Slide 9
        echo "Slide 9 " . "<br>";   
        
        function calculate_future_value(
               $investment, $interest_rate, $years) {
            if  ($investment <= 0 || 
                 $interest_rate <= 0 || 
                 $years <= 0 ) {
              throw new Exception("Please check all entries.");
            }

            $future_value = $investment;
            for ($i = 1; $i <= $years; $i++) {
                $future_value = 
                    ($future_value + ($future_value * $interest_rate * .01)); 
            }
            return round($futureValue, 2);
        }

//        $futureValue = 
//            calculate_future_value(10000, 0.06, 0);
//
//            echo "<br>" . "<br>";       
        // Comment out the last 2 lines from previous example        
        try {
            $fv =  calculate_future_value(10000, 0.06, 0);
            echo 'Future value was calculated successfully.';
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        echo "<br>" . "<br>";   
        
            
        //Slide 10
        echo "Slide 10 " . "<br>";
        
        class customException extends Exception {   //re-throw example
              public function errorMessage() {
                //error message
                $errorMsg = $this->getMessage().' is not a valid E-Mail address.';
                return $errorMsg;
              }
            }

            $email = "someone@example.com";

            try {
            //  try {          //run as-is then uncomment inner try & braces to compare
                //check for "example" in mail address
                if(strpos($email, "example") == FALSE) { //change !== to == to remove exception
                  //throw exception if email is not valid
                  throw new Exception($email);
                }
            }
            catch(Exception $e) {
            //    //re-throw exception
                throw new customException($email);
            //  }
            }

            catch (customException $e) {
              //display custom message
              echo $e->errorMessage();
              //exit;                       //skips processing below if used
            }

            echo "</br>";
            //     info for Guitar Shop 2  
                    $dsn = 'mysql:host=localhost;dbname=my_guitar_shop2';
                    try {           
                        $db = 
                            new PDO($dsn, 'root', 'pa$$w0rd'); //if I change from Pa$$w0rd, it works
                        // other statements
                    } catch (PDOException $e) {
                        echo 'PDOException: ' . $e->getMessage();
                    } catch (Exception $e) {
                        echo 'Exception: ' . $e->getMessage();
                    }
            echo "If no error message, the code worked.";        
            echo "<br>" . "<br>";    
            
        
            //Slide 11
            echo "Slide 11 " . "<br>";
              
//            <?php

            $visitor_name = '';
            $visitor_email = 'adam@thevoice.com';
            $visitor_msg = 'Great job!';
            /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg;  */

            // Validate inputs
            if ($visitor_name == null || $visitor_email == null ||
                $visitor_msg == null) {
                $error = "Invalid input data. Check all fields and try again.";
                /* include('error.php'); */
                echo "Form Data Error: " . $error; 
                exit();
                } else {
                    $dsn = 'mysql:host=localhost;dbname=evajonesssssss';
                    $username = 'root';
                    $password = 'Pa$$w0rd';

                    try {           
                        $db = 
                            new PDO($dsn, $username, $password);
                        // other statements
                    } catch (PDOException $e) {
                        echo 'PDOException: ' . $e->getMessage();
                        exit;
                    }
                    echo 'No errors.';
                }
//            ? >

               
        ?>
    </body>
</html>

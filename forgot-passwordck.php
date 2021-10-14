<?Php
include "./languages/configuration.php"; 
include "config.php";

$email=$_POST['email'];

// Change the URL below to match your site

$site_url="localhost:3000/";

$status = "OK";
$msg="";

//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);

		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ 
			header("Location:forgot-password.php?error=". $lang['Error17']);
			exit();

			$status= "NOTOK";
		}

        if ($status=="OK") {
            $count=$dbo->prepare("SELECT email,userid FROM users WHERE users.email = '$email'");
            $count->execute();
            $row = $count->fetch(PDO::FETCH_OBJ);
            $no=$count->rowCount();

            $em=$row->email;
				if ($no == 0) {
					header("Location:forgot-password.php?error=". $lang['Error18']);
					exit();
				}
                /// check if activation is pending /////
                $tm=time() - 86400; // Time in last 24 hours
                $count=$dbo->prepare("SELECT userid FROM plus_key WHERE userid = '$row->userid' and time > $tm and status='pending'");
                $count->execute();
                $no=$count->rowCount();
                //echo " No of records = ".$no;

                if ($no==1) {
                    header("Location:forgot-password.php?error=". $lang['Error19']);
                    exit();
                }

                /////////////// Let us send the email with key /////////////
                /// function to generate random number ///////////////
                function random_generator($digits)
                {
                    srand((double) microtime() * 10000000);
                    //Array of alphabets
                    $input = array("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q",
                    "R","S","T","U","V","W","X","Y","Z");

                    $random_generator="";// Initialize the string to store random numbers

                for ($i=1;$i<$digits+1;$i++) { // Loop the number of times of required digits

                    if (rand(1, 2) == 1) {// to decide the digit should be numeric or alphabet
                        // Add one random alphabet
                        $rand_index = array_rand($input);
                        $random_generator .=$input[$rand_index]; // One char is added
                    
					} else {

                    // Add one numeric digit between 1 and 10
                    $random_generator .=rand(1, 10); // one number is added
                    } // end of if else
                } // end of for loop
                    
                return $random_generator;
            } // end of function

		$key=random_generator(10);
		$key=md5($key);
		$tm=time();
		//echo "insert into plus_key(userid, pkey,time,status) values('$row->userid','$key','$tm','pending'";
		$sql=$dbo->prepare("insert into plus_key(userid, pkey,time,status) values('$row->userid','$key','$tm','pending')");
		$sql->execute();
		//print_r($sql->errorInfo()); 

		$headers4="netflix1993hsb@gmail.com";         ///// Change this address within quotes to your address ///
		$headers.="Reply-to: $headers4\n";
		$headers .= "From: $headers4\n"; 
		$headers .= "Errors-to: $headers4\n"; 
		$headers = "Content-Type: text/html; charset=iso-8859-1\n".$headers;// for html mail un-comment this line
		$site_url=$site_url."activepassword.php?ak=$key&userid=$row->userid";
		//echo $site_url;

		if(mail("$em","Your Request for login details","This is in response to your request for login detailst at site_name \n \nLogin ID: $row->userid \n To reset your password, please visit this link( or copy and paste this link in your browser window )\n\n
			\n\n
			$site_url
			\n\n
			<a href='$site_url'>$site_url</a>

			\n\n Thank You \n \n siteadmin","$headers"))
		{
			header("Location:login.php?success=". $lang['Success4']);
			exit();
		}else{ 
			header("Location:login.php?error=". $lang['Error']);
			exit();
		}

	}else{
		header("Location:login.php");
		exit();
	}
?>
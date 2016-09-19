<?php 
	include 'connection.php';
	include 'header.php'; 
	echo $headerContent;
	
	//Database transaction message.
	$transactionMsg = "";
	$registered = FALSE;
	$inputEmpty = FALSE;
	
	$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
	$firstName = trim($firstName);
	$firstName = stripslashes($firstName);
	$firstName = htmlspecialchars($firstName);
	//echo $firstName;
	
	$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
	$lastName = trim($lastName);
	$lastName = stripslashes($lastName);
	$lastName = htmlspecialchars($lastName);
	//echo $lastNam;
	
	$address1 = mysqli_real_escape_string($conn, $_POST['address1']);
	$address1 = trim($address1);
	$address1 = stripslashes($address1);
	$address1 = htmlspecialchars($address1);
	//echo $address1;
	
	$address2 = mysqli_real_escape_string($conn, $_POST['address2']);
	$address2 = trim($address2);
	$address2 = stripslashes($address2);
	$address2 = htmlspecialchars($address2);
	//echo $address2;
	
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$city = trim($city);
	$city = stripslashes($city);
	$city = htmlspecialchars($city);
	//echo $city;
	
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	$state = trim($state);
	$state = stripslashes($state);
	$state = htmlspecialchars($state);
	//echo $state;
	
	$zip = mysqli_real_escape_string($conn, $_POST['zip']);
	$zip = trim($zip);
	$zip = stripslashes($zip);
	$zip = htmlspecialchars($zip);
	//echo $zip;
	
	$country = mysqli_real_escape_string($conn, $_POST['country']);
	$country = trim($country);
	$country = stripslashes($country);
	$country = htmlspecialchars($country);
	//echo $country;
	
	if(empty($firstName)  || empty($lastName) || empty($address1) || empty($city) || empty($zip)) {
		$inputEmpty = TRUE;
		$transactionMsg = "Required field(s) left empty. The registration will not be processed at this time";
	}
	//Double check if required fields are empty.
	if($inputEmpty == FALSE){
		//Check to see if user registered already with same name and address.
		$query = "SELECT * FROM hw_registrant WHERE first_name=? AND last_name=? AND address_1=? AND address_2=?";
		if (($stmt = $conn->prepare($query))){
			//set parameters
			$stmt->bind_param("ssss", $firstName, $lastName, $address1, $address2);
			
			//execute
			$stmt->execute();
			
			//get results
			$result = $stmt->get_result();
			$rowCount = $result->num_rows;
			
			if($rowCount > 0){
				$transactionMsg = "You are already registered";
				$registered = TRUE;
			}
			else{
				$transactionMsg = "Thank you for registering";
				$registered = FALSE;
			}
		}
		
		//If user is not registered, insert to database.
		if($registered == FALSE){
			$query = "INSERT INTO hw_registrant (first_name, last_name, address_1, address_2, city, state, zip, country) VALUES (?,?,?,?,?,?,?,?)";
			$stmt = $conn->prepare($query);
			//set parameters
			$stmt->bind_param('ssssssss', $firstName, $lastName, $address1, $address2, $city, $state, $zip, $country);
			//execute
			$stmt->execute();
			
			$rowCount = $stmt->affected_rows;
			//If rowCount is -1 then insertion failed.
			if($rowCount < 0){
				$transactionMsg = "Registration failed. Please try again later";
			}
		}
	}
	
	//Close connection'
	mysqli_close($conn);
?>
	<fieldset>
		<legend>Registration Form</legend>
		<div align="center">
			<span><?php echo $transactionMsg; echo " "; echo $firstName; echo " "; echo $lastName; ?>!</span>
		</div>
	</fieldset>
<?php 
	include 'footer.php'; 
	echo $footerContent;
?>
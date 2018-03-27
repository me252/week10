<?php 

class User {
	
	function User($hostname, $username, $password, $project){
		( $dbh = mysql_connect ( $hostname, $username, $password ) )
       or die ( "Unable to connect to MySQL database" );
	   
	   mysql_select_db( $project ); 
		
	}
	
	function delete_User($email){
		
	$s = "DELETE FROM accounts WHERE email = '$email'"; 
	$q = mysql_query($s); 
	$s_ret = "SELECT * FROM accounts"; 
	$r = mysql_fetch_array(mysql_query($s_ret));
	while ($r) {
		
		print "<tr><td>" . $r["email"]. "</td> <td>" . $r["fname"]. "</td> <td>" . $r["lname"]. "</td> <td>" . $r["password"]. "</td>></tr>";
		
	}
		
	}
	
	function insert_User($fname , $lname, $email, $phone, $birthday, $gender, $password){
		
		$cred = "SELECT * from accounts WHERE email = '$email'"; 
		$cred_check = mysql_query($cred); 
		$r = mysql_fetch_array($cred_check); 
		if ($r == NULL){
			$reg_cmd = "INSERT INTO accounts (email, fname, lname, phone, birthday, gender, password) VALUES ('$email', '$fname', '$lname', '$phone', '$birthday', '$gender', '$password')";
			mysql_query($reg_cmd) or die(mysql_error());	
		}
	
	}
	
	function update_User($email, $password){
		
		$drawA = "Update accounts Set password = '$password' where email = '$email' ";
		mysql_query($drawA) or die(mysql_error());
		
	}
	






?>

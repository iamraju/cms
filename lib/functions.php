<?php
session_start();

// Check whether a user is logged in or not.
function checkLogin(){
	if(isset($_SESSION['user_id'])){
		return true;
	}
	else{
		return false;
	}
}

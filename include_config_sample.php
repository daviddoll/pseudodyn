<?

// rename this file to "include_config.php" to get it running!

// ### allowed "user" - you may edit this ###
// ---------------------------------------------------------------------------------------- //
$alloweduser = array("user-a", "user-b", "user-c");
// ---------------------------------------------------------------------------------------- //

// ### global variables ###
// ---------------------------------------------------------------------------------------- //
$timezone = date_default_timezone_set("US/Central");
$datafolder = "datafolder/";
@$user = $_GET['user'];
$filename = "$user.txt";
// ---------------------------------------------------------------------------------------- //

?>
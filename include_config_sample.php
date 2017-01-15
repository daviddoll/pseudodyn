<?

// rename this file to "include_config.php" to get it running!

// ### allowed "user" - you may edit this ###
// ### you may want to keep a update history for logged "user" ###
// ---------------------------------------------------------------------------------------- //
$alloweduser = array("user-a", "user-b", "user-c");
// ---------------------------------------------------------------------------------------- //
$loggeduser = array("used-a", "user-b");
// ---------------------------------------------------------------------------------------- //

// ### global variables ###
// ---------------------------------------------------------------------------------------- //
$timezone = date_default_timezone_set("US/Central");
$datafolder = "datafolder/";
@$user = $_GET['user'];
$filename = "$user.txt";
$logfilename = "$user.log.txt";
// ---------------------------------------------------------------------------------------- //

?>
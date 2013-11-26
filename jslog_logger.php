<?php
/*
 * Created on Nov 25, 2013 by Pat Nellesen (pat@pnellesen.com)
 *
 * Simple logger to write Javascript error messages to system Error log file.
 * Expects JSNLog (http://js.jsnlog.com/) to be implemented in web page code.
 * 
 */
 $jslog_input = json_decode($HTTP_RAW_POST_DATA,true);
 if (array_key_exists("lg",$jslog_input)) {
	 $jslog_msg = $jslog_input["lg"][0]["m"];
	 $jslog_timestamp = $jslog_input["lg"][0]["t"];
	 error_log("[JSPHPLog]: $jslog_msg", 0);
	 $msg = "success";	
 } else {
 	$msg = "failure - no [lg] element found in request";
 }
 echo(json_encode(array('result',$msg)));// return a success/fail message;
?>
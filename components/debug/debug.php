<?php
function debugger($tax_input){
	$path = __FILE__;
	$path =str_replace('debug.php','',$path);
	$log_file =  $path.'tag_save.log';
	$fh = fopen($log_file, 'a') or die("can't open file");
	$stringData = 'the value: ' . print_r($tax_input, 1) . ' ' . "\r\n";
	fwrite($fh, $stringData);
	fclose($fh);
}
?>
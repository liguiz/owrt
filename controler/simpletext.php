<?php
function validate($usr,$pw,$login){
	$xmlDoc = new DOMDocument();
	$responseDoc = new DOMDocument("1.0","utf-8");
	
	$msg=$responseDoc->createElement('msg');
	$responseDoc->appendChild($msg);
	$msg->appendChild($responseDoc->createTextNode('msg from server!'));
	header("Content-Type:text/xml;charset=utf-8");
	return $usr;
}
echo validate($_GET["usr"],$_GET["pw"],$_GET["login"]);
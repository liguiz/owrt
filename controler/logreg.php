<?php
function validate($usr,$pw,$login=null){
	$xmlDoc = new DOMDocument();
	/*
	$responseDoc = new DOMDocument("1.0","UTF-8");
	
	addNode($responseDoc,$responseDoc,"mim-mapping");
	$mime=$responseDoc->childNodes->item(0);
	addNode($mime,$responseDoc,"extension","xml");
	addNode($mime,$responseDoc,"mime-type","text/xml");
	
	$msg=$responseDoc->createElement('msg');
	$responseDoc->appendChild($msg);
	$msg->appendChild($responseDoc->createTextNode('À´×Ô·şÎñÆ÷!'));
	//header("Content-Type:text/xml;charset=utf-8");
//	return $responseDoc->saveXML();
//	return "<msg>À´×Ô·şÎñÆ÷!</msg>";
	*/

				
	$xmlDoc->load("../xml/user.xml");
	$xmlDoc->formatOutput=true;
	
	foreach($xmlDoc->getElementsByTagName('user') as $user){
		if($user->childNodes->item(0)->nodeValue==$usr){
			if($login==true){
				if($user->childNodes->item(1)->nodeValue==$pw){
					echo $usr;
				}else{
					echo "<msg>å¯†ç é”™è¯¯!</msg>";
					}
			}else{
				echo "<msg>ç”¨æˆ·åå·²è¢«æ³¨å†Œ!</msg>";
			}
			return;
		}
	}
	
	if($login==true){
		echo "<msg>ç”¨æˆ·åé”™è¯¯ï¼</msg>";
		return;
	}
	$user=$xmlDoc->createElement('user');
	$root=$xmlDoc->getElementsByTagName('root')->item(0);
	$root->appendChild($user);
	$usr_xml=$xmlDoc->createElement('usr');
	$user->appendChild($usr_xml);
	$usr_xml->appendChild($xmlDoc->createTextNode($usr));
	
	
	$pw_xml=$xmlDoc->createElement('pw');
	$user->appendChild($pw_xml);
	$pw_xml->appendChild($xmlDoc->createTextNode($pw));
	$xmlDoc->save("../xml/user.xml");
	return $usr;
	

}
if(isset($_GET["login"]))
echo validate($_GET["usr"],$_GET["pw"],$_GET["login"]);
else echo validate($_GET["usr"],$_GET["pw"]);
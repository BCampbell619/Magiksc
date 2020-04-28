<?php
    $request_method = $_SERVER["REQUEST_METHOD"];
    if($request_method == "GET"){
      $query_vars = $_GET;
    } elseif ($request_method == "POST"){
      $query_vars = $_POST;
    }
    reset($query_vars);
    $t = date("U");

    $file = $_SERVER['DOCUMENT_ROOT'] . "/../data/gdform_" . $t;
    $fp = fopen($file,"w");
    while (list ($key, $val) = each ($query_vars)) {
     fputs($fp,"<GDFORM_VARIABLE NAME=$key START>\n");
     fputs($fp,"$val\n");
     fputs($fp,"<GDFORM_VARIABLE NAME=$key END>\n");
     if ($key == "redirect") { $landing_page = $val;}
    }

$comment = $_POST["Comment"];
$pencheck = strpos($comment, 'penis');


if((empty($_POST['Comment'])) || ($pencheck > -1) ){
	$to ="artwork@magiksc.com";
	}
else{
$to = "order@magiksc.com";

}
$subject = "Magik - Rider Support Request";
$message = "Name- " . $_POST["Name"] ."\n Phone- " . $_POST["Phone"] ."\n Address- " . $_POST["Address"]."\n City- " . $_POST["City"]."\n State- " . $_POST["State"]."\n Zip- " . $_POST["Zip"]."\n Country- " . $_POST["Country"]."\n Email- " . $_POST["Email"]."\n Type- " . $_POST["type"]."\n Make- " . $_POST["Make"]."\n Model- " . $_POST["Model"] ."\n Year- " . $_POST["Year"]."\n Years Racing- " . $_POST["Years_racing"]."\n Age- " . $_POST["Age"] ."\n Race Number- " . $_POST["Race_number"]."\n Race Class- " . $_POST["Race_class"]."\n Comment- " . $_POST["Comment"];
$from = "steve@magiksc.com";
$headers = "From: $from";


  mail($to,$subject,$message,$headers);


    fclose($fp);
    if ($landing_page != ""){
	header("Location: http://".$_SERVER["HTTP_HOST"]."/$landing_page");
    } else {
	header("Location: http://".$_SERVER["HTTP_HOST"]."/");
    }


?>

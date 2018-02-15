<?php
#######################################################################
## URL DOESN'T REQUIRE http:// OR https://
## WILL DETECT IF LINK FORMAT IS CORRECT AND THEN ADD http:// BY ITSELF
#######################################################################

//The text to look for the link
$text = "The text you want to filter goes here. www.google.com";

//CALL THE FUNCTION
turnUrlIntoHyperlink($text);

function turnUrlIntoHyperlink($text){

    // The Regular Expression filter
    $reg_exUrl = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";

    // Check if there is a url in the text
    if(preg_match($reg_exUrl, $text, $url)) {

        if(strpos( $url[0], ":" ) === false){
            $link = 'http://'.$url[0];
        }else{
            $link = $url[0];
        }

        // make the urls hyper links
        echo preg_replace($reg_exUrl, '<a href="'.$link.'" title="'.$url[0].'">'.$url[0].'</a>', $text);

    }else {

        // if no urls in the text just return the text
        echo $text;

    }

}
?>

<?php

function htmtocode($content) {
	$content = str_replace("\n", "<br>", str_replace(" ", "&nbsp;", $content));
	return $content;
}

//$content=str_replace("'","‘",$content);
 //htmlspecialchars();
 
?>
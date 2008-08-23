<?php

function MyMap_myprofileapi_title($args)
{
//  	return "";
}

function MyMap_myprofileapi_onLoad($args)
{
  	pnModAPIFunc('MyMap','user','addMapJS');
  	return true;
}

?>
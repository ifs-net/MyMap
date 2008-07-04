<?php

Loader::requireOnce('modules/MyMap/common.php');

/**
 * This function is only needed by the hook api
 */
function mymap_transform($text)
{
	// check if the hook is used
	$firstload = true;
	while ($text != preg_replace('/::mymap::(\d+)\::/i', $ersetzung, $text)) {
	  	// insert some JS code
		if ($firstload) {
		  	pnModAPIFunc('MyMap','user','addMapJS');
		    $render = pnRender::getInstance('MyMap');
		  	pnModLangLoad('MyMap');
			$render->assign('loadscripts','1');
			$firstload=false;
		}
		$textarray = explode("::mymap::",$text,2);
		$firstpart = $textarray[0];
		$lastpart = $textarray[1];
		$lastarray = explode("::",$lastpart,2);
		$mid = (int)$lastarray[0];
		$lastpart = $lastarray[1];
		// get the map that should be inserted
		if (isset($mid) && ($mid>0)) $map = pnModAPIFunc('MyMap','user','getMaps',array('id'=>$mid));
		$content.= $firstpart;
		if (!empty($map)) {
			$markers = pnModAPIFunc('MyMap','user','getMarkers',array('mid'=>$mid));
			$waypoints = pnModAPIFunc('MyMap','user','getWaypoints',array('mid'=>$mid));
			$center = pnModAPIFunc('MyMap','user','getCenter',$points);
			$map['centerlat']=$center['lat'];
			$map['centerlng']=$center['lng'];
			$map['url_wps'] = pnmodurl('MyMap','ajax','loadWaypoints',array('mid'=>$map['id']));
		    $render->assign('map',$map);
		    $render->assign('uid',pnUserGetVar('uid'));
		    $render->assign('clickzoom','0');
		    $render->assign('markers',$markers);
		    $render->assign('waypoints',$waypoints);
		    $render->assign('provider',pnModGetVar('MyMap','provider'));
		    $render->assign('hook','1');
		    if (pnModGetVar('MyMap','map_overview') == 1) $map_overview='true';
		    else $map_overview='false';
		    $render->assign('map_overview',$map_overview);
		    $map_content = $render->fetch('mymap_user_display_map.htm');
		    $content.=$map_content;
		}
		else {
		    $render->assign('mid',$mid);
		    $content.= $render->fetch('mymap_hook_error.htm');
		}
		$text = $lastpart;
	}
	return $content;
}

?>
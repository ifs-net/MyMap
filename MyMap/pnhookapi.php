<?
/**
 * hook function to include a map into every type of content
 * 
 * @param    int     $args['id']    	id of marker / point
 * @return   boolean	
 */
function mymap_hookapi_transform($args)
{
	function mymap_transform($text)
	{
		$url=pnModUrl('MyMap','user','displayMap');
		// check if the hook is used
		while ($text != preg_replace('/::mymap::(\d+)\::/i', $ersetzung, $text)) {
		  	// insert some JS code
		  	pnModLangLoad('MyMap');
			pnModAPIFunc('MyMap','user','addMapJS');
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
			    $render = pnRender::getInstance('MyMap');
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
			    $render = pnRender::getInstance('MyMap');
			    $render->assign('mid',$mid);
			    $content.= $render->fetch('mymap_hook_error.htm');
			}
			$text = $lastpart;
		}
		return $content;
	}

    // Argument check
    if ((!isset($args['objectid'])) || (!isset($args['extrainfo']))) {
        LogUtil::registerError(_MYMAPHOOKDISPLAYERROR);
        return;
    }
    if (is_array($args['extrainfo'])) foreach ($args['extrainfo'] as $text) $result[] = mymap_transform($text);
    else $result = mymap_transform($text);
    return $result;
}
?>
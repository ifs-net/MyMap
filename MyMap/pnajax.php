<?
/**
 * get the ajax loaded point overview table
 *
 * @param	int		id			(map_id)
 * @param	int		startnum	
 * @return	output
 */
function MyMap_ajax_getOverviewTable()
{
	$render = pnRender::getInstance('MyMap');
	$mid = FormUtil::getPassedValue('mid');
	$markers = pnModAPIFunc('MyMap','user','getMarkers',array('mid'=>$mid));
	$i=2;
	$pagerlimit=10;
	$startnum = FormUtil::getPassedValue('startnum');
	if (!isset($startnum) || (!($startnum>0))) $startnum=1;
	foreach ($markers as $marker) {
		if (($i>$startnum) && ($i<=($startnum+$pagerlimit))) $selection[]=$marker;
		$i++;
	}
	// we also need the map data for the edit or delete links
	$render->assign('map',pnModAPIFunc('MyMap','user','getMaps',array('id'=>$mid)));
	// some data for the pager
	$render->assign('markerscounter',count($markers));
	$render->assign('limit',$pagerlimit);
	$render->assign('markers',$selection);
	$render->assign('uid',pnUserGetVar('uid'));
	$render->display('mymap_ajax_display_markeroverview.htm');
	return true;
}

/**
 * load waypoints into a map
 *
 * @param	int		$args['mid']	(map_id)
 * @return	output
 */
function MyMap_ajax_loadWaypoints()
{
  	$mid = (int)FormUtil::getPassedValue('mid');
    // Security check 
    if (!SecurityUtil::checkPermission('MyMap::', '.$mid', ACCESS_READ)) return LogUtil::registerPermissionError();
	$render = pnRender::getInstance('MyMap');
	$render->assign('waypoints',pnModAPIFunc('MyMap','user','getWayPoints',array('mid'=>$mid)));
	$render->assign('mid',$mid);
	$render->display('mymap_ajax_display_waypoints.htm');
	return true;
}

/**
 * export map to gpx data
 * 
 * @return       xml data
 */
function MyMap_ajax_export()
{
    // Security check 
    if (!SecurityUtil::checkPermission('MyMap::', '::', ACCESS_READ)) return LogUtil::registerPermissionError();

	// Get the map that should be displayed
	$mid = FormUtil::getPassedValue('mid');
	$format = FormUtil::getPassedValue('format');
	if (!isset($format) || ( strtolower($format) != 'gpx' && strtolower($format) != 'kml' ) ) {
		logUtil::registerError(_MYMAPMAPUNKNOWNTYPE);
	}
	if (isset($mid) && ($mid>0)) $map = pnModAPIFunc('MyMap','user','getMaps',array('id'=>$mid));
	if (!isset($mid) || (!($mid>0)) || (empty($map))) {
		logUtil::registerError(_MYMAPMAPNOTFOUND);
		return pnRedirect(pnModURL('MyMap','user','main'));
	}
	
	$render = pnRender::getInstance('MyMap');
	$render->assign('map',$map);
	if ( $format == 'gpx' ) {
		$render->assign('xmltext',pnModAPIFunc('MyMap','user','createGpx',array('mid'=>$mid)));
	} else if ( $format == 'kml' ) {
		$render->assign('xmltext',pnModAPIFunc('MyMap','user','createKml',array('mid'=>$mid)));
	} else {
		$render->assign('xmltext', "Unknown format: $format");
	}
	$render->display('mymap_user_export.htm');
	return true;
}
?>

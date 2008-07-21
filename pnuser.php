<?php
/**
 * the main user function
 * 
 * @return       output
 */
function MyMap_user_main()
{
	// Security check 
	if (!SecurityUtil::checkPermission('MyMap::', '::', ACCESS_COMMENT)) return LogUtil::registerPermissionError();

	// Create output object
	$render = pnRender::getInstance('MyMap');
	$render->assign('maps',pnModAPIFunc('MyMap','user','getMaps',array('uid'=>pnUserGetVar('uid'))));
	return $render->fetch('mymap_user_main.htm');
}

/**
 * route management
 * 
 * @return       output
 */
function MyMap_user_routes()
{
	// Get parameters
	$mid = FormUtil::getPassedValue('mid');
	$map = pnModAPIFunc('MyMap','user','getMaps',array('id'=>$mid));
	$uid = pnUserGetVar('uid');

	// Security check 
	if (!SecurityUtil::checkPermission('MyMap::', '$mid::', ACCESS_COMMENT)) return LogUtil::registerPermissionError();
	if (!(($map['uid']==$uid) || (SecurityUtil::checkPermission('MyMap::', '$mid::', ACCESS_ADMIN)))) return LogUtil::registerPermissionError();

	// We need some javascript
	pnModAPIFunc('MyMap','user','addMapJS');
	
	// is there an action to do?
	$action = FormUtil::getPassedValue('action');
	// delete all waypoints
	if (isset($action) && (strtolower($action) == 'delete_waypoints')) {
		if (pnModAPIFunc('MyMap','user','deleteWaypoints',array('mid'=>$map['id'])))logUtil::registerStatus(_MYMAPWAYPOINTSDELETED);
		else logUtil::registerError(_MYMAPWAYPOINTSDELETIONERROR);
	}
	// delete last waypoint
	else if (isset($action) && (strtolower($action) == 'delete_lastwaypoint')) {
		if (pnModAPIFunc('MyMap','user','deleteLastWaypoint',array('mid'=>$map['id'])))logUtil::registerStatus(_MYMAPWAYPOINTDELETED);
		else logUtil::registerError(_MYMAPWAYPOINTSDELETIONERROR);
	}
	if (isset($action)) pnRedirect(pnModURL('MyMap','user','routes',array('mid'=>$map['id'])));

	// get the map's center point
	$markers = pnModAPIFunc('MyMap','user','getMarkers',array('mid'=>$mid));
	$waypoints = pnModAPIFunc('MyMap','user','getWayPoints',array('mid'=>$mid));
	$center = pnModAPIFunc('MyMap','user','getCenter',$waypoints);
	$map['centerlat']=$center['lat'];
	$map['centerlng']=$center['lng'];

	// Create output object
	$render = FormUtil::newpnForm('MyMap');
	$map['url_wps'] = pnmodurl('MyMap','ajax','loadWaypoints',array('mid'=>$map['id']));
	$render->assign('map',$map);
	$render->assign('markers',$markers);
	$render->assign('waypoints',$waypoints);
	$render->assign('provider',pnModGetVar('MyMap','provider'));
	$render->assign('gpsbabel',pnModGetVar('MyMap','gpsbabel'));
	$render->assign('map_overview','false');
	return $render->pnFormExecute('mymap_user_routes.htm', new mymap_user_routeshandler());
}

/**
 * display a map
 * 
 * @return       output
 */
function MyMap_user_display()
{
	// Security check 
	$mid = FormUtil::getPassedValue('mid');
	if (!SecurityUtil::checkPermission('MyMap::', '$mid::', ACCESS_READ)) return LogUtil::registerPermissionError();
    
	// Get the map that should be displayed
	if (isset($mid) && ($mid>0)) $map = pnModAPIFunc('MyMap','user','getMaps',array('id'=>$mid));
	if (!isset($mid) || (!($mid>0)) || (empty($map))) {
		logUtil::registerError(_MYMAPMAPNOTFOUND);
		return pnRedirect(pnModURL('MyMap','user','main'));
	}
	
	// get the map's center point
	$markers = pnModAPIFunc('MyMap','user','getMarkers',array('mid'=>$mid));
	$center = pnModAPIFunc('MyMap','user','getCenter',$markers);
	$waypoints = pnModAPIFunc('MyMap','user','getWayPoints',array('mid'=>$mid));
	$map['centerlat']=$center['lat'];
	$map['centerlng']=$center['lng'];
	
	// we need this info for ajax waypoints loading
	$map['url_wps'] = pnmodurl('MyMap','ajax','loadWaypoints',array('mid'=>$map['id']));
	
	// is there a delete-action called?
	$command = FormUtil::getPassedValue('command');
	$pid = FormUtil::getPassedValue('pid');
	if (isset($command) && ($command == "delete") && (isset($pid)) && ($pid>0)) {
		// we need the marker to check the user's permission
		if (!SecurityUtil::confirmAuthKey()) LogUtil::registerAuthIDError();
		else {
			$markerArray = pnModAPIFunc('MyMap','user','getMarkers',array('id'=>$pid));
			$marker=$markerArray[0];
			$uid = pnUserGetVar('uid');
			if ((SecurityUtil::checkPermission('MyMap','$mid::', ACCESS_ADMIN)) || ($map['uid'] == $uid) || ($marker['uid'] == $uid)) {
				if (pnModAPIFunc('MyMap','user','deletePoint',array('id'=>$pid))) LogUtil::registerStatus(_MYMAPPOINTDELETED);
				else LogUtil::registerError(_MYMAPPOINTDELETIONERROR);
			}
			else LogUtil::registerError(_MYMAPPOINTDELETIONERROR);
		}
		return pnRedirect(pnModURL('MyMap','user','display',array('mid'=>$mid)));
	}

	// We need some javascript
	pnModAPIFunc('MyMap','user','addMapJS');
	// Create output object
	$render = FormUtil::newpnForm('MyMap');
	$render->assign('map',$map);
	$uid = pnUserGetVar('uid');
	$render->assign('uid',$uid);
	$render->assign('clickzoom','1');
	$render->assign('provider',pnModGetVar('MyMap','provider'));
	$render->assign('uname',pnUserGetVar('uname',$map['uid']));
	$render->assign('markers',$markers);
	$render->assign('waypoints',$waypoints);
	if (pnModGetVar('MyMap','map_overview') == 1) $map_overview='true';
	else $map_overview='false';
	$render->assign('map_overview',$map_overview);
	return $render->pnFormExecute('mymap_user_display.htm', new mymap_user_editpointhandler());
}

/**
 * add or edit a new map
 *
 * @return		output
 */
function MyMap_user_editMap()
{
	// Security check 
	$mid = FormUtil::getPassedValue('mid');
	if (!SecurityUtil::checkPermission('MyMap::', '$mid::', ACCESS_COMMENT)) return LogUtil::registerPermissionError();

	// Create output object
	$render = FormUtil::newpnForm('MyMap');
	return $render->pnFormExecute('mymap_user_editmap.htm', new mymap_user_editmaphandler());
}

/* ****************************** handler for FormUtil ********************************* */
class mymap_user_editPointHandler
{
	var $id;
	var $mid;
	function initialize(&$render)
	{
		$this->id = (int)FormUtil::getPassedValue('id', 0);
		$this->mid = (int)FormUtil::getPassedValue('mid', 0);
		if ($this->id > 0) {
			$data = DBUtil::selectObjectByID('mymap_markers', $this->id);
			$render->assign($data);
			PageUtil::AddVar('body','onload="javascript:toggledisplay(\'mymap_hiddendiv_addmarkers\',\'indicator_addmarkers\'); return false;"');
		}
		return true;
	}
	function handleCommand(&$render, &$args)
	{
		if ($args['commandName']=='update') {
			// Security check 
			if (!SecurityUtil::checkPermission('MyMap::', '$mid::', ACCESS_COMMENT)) return LogUtil::registerPermissionError();
			$map = pnModAPIFunc('MyMap','user','getMaps',array('id'=>$this->mid));
			$uid = pnUserGetVar('uid');
			if (($map['uid'] != $uid) && ($map['wiki']==0)) return LogUtil::registerPermissionError();

			// We need to check if there is lat and lng submitted or if we have to get the coordinates via webservice
			PageUtil::AddVar('body','onload="javascript:toggledisplay(\'mymap_hiddendiv_addmarkers\',\'indicator_addmarkers\'); return false;"');
			$obj	= $render->pnFormGetValues();
			$id 	= $this->id;
			$uid 	= pnUserGetVar('uid');
			if ($this->id > 0) $obj['id']=$id;
			if (!isset($obj['lng']) || (!isset($obj['lat']))) {
				$coord=pnModAPIFunc('MyMap','user','getCoord',$obj);
				srand(microtime()*1000000);
				if (count($coord)==1) {
					$c=$coord[0];
					$obj['postalcode'] 		= $c['postalcode'];
					$obj['placename'] 		= $c['placename'];
					$obj['countrycode'] 	= $c['countrycode'];
					$obj['lat'] 			= (float)$c['lat'];
					$obj['lng'] 			= (float)$c['lng'];
					// shuffle a little bit... lat +- 0.004 lng +- 0.004
					$obj['lat']+=0.00001*(rand(1,800)-400);
					$obj['lng']+=0.00001*(rand(1,800)-400);
				}
				else {
					foreach ($coord as $c) $coords.=$c['postalcode'].' '.$c['placename'].' ('.$c['countrycode'].', '.$c['adminname1'].'), ';
					$coords.=_MYMAPCHOOSEONE.'!';
					LogUtil::registerStatus(_MYMAPMULTIFOUND.' '.$coords);
					return true;
				}
			}
			if (!$render->pnFormIsValid()) return false;
			$obj['uid']=$uid;
			$obj['mid']=$this->mid;
			// we need to check if a user wants to add a point to an own map or 
			// if another user has the permission to add something to the actual map.
			if (!isset($obj['lng']) || (!isset($obj['lat']))) {
				LogUtil::registerError(_MYMAPCOORDSMISSING);
				return false;
			}
			if ($id>0) {
				$result = DBUtil::updateObject($obj, 'mymap_markers');
				if ($result) LogUtil::registerStatus(_MYMAPPOINTUPDATED);
			}
			else {
				$obj['id'] = $this->id;
				DBUtil::insertObject($obj, 'mymap_markers');
				LogUtil::registerStatus(_MYMAPPOINTADDED);
				if (pnModGetVar('MyMap','notify') == 1) {
					if (pnUserGetVar('uid')!=$map['uid']) {
						pnModAPIFunc('MyMap','user','notify',array('map'=>$map,'marker'=>$obj));
						LogUtil::registerStatus(_MYMAPNOTIFYSENT);
					}
				}
			}
			return pnRedirect(pnModURL('MyMap','user','display',array('mid'=>$obj['mid'])));
		}
		return true;
    }
}

class mymap_user_editMapHandler
{
	var $id;
	function initialize(&$render)
	{
		$items_yesno = array (	array('text' => _MYMAPNO, 'value' => 0),
								array('text' => _MYMAPYES, 'value' => 1) );
		$items_maptype = array (array('text' => _MYMAPNORMAL, 'value' => 'NORMAL'),
								array('text' => _MYMAPHYBRID, 'value' => 'HYBRID'),
								array('text' => _MYMAPSATELLITE, 'value' => 'SATELLITE')	 );
		$render->assign('items_wiki',			$items_yesno);
		$render->assign('wiki',					0);
		$render->assign('items_optionaltable',	$items_yesno);
		$render->assign('optionaltable',		1);
		$render->assign('items_maptype',		$items_maptype);
		$render->assign('maptype',				'h');

		$this->id = (int)FormUtil::getPassedValue('id', 0);
		if ($this->id > 0) {
			$data = DBUtil::selectObjectByID('mymap', $this->id);
			$render->assign($data);
		}
		return true;
	}
	function handleCommand(&$render, &$args)
	{
		if ($args['commandName']=='update') {
			if (!$render->pnFormIsValid()) return false;
			$obj 		= $render->pnFormGetValues();
			$obj['id']	= $this->id;
			$obj['uid']	= pnUserGetVar('uid');

			// Should the map be deleted?
			$deleteMap = (int)$obj['deletemap'];
			if ($deleteMap == 1) {
				$delResult = pnModAPIFunc('MyMap','user','deleteMap',array('id'=>$obj['id']));
				if ($delResult) logUtil::registerStatus(_MYMAPMAPDELETED);
				else logUtil::registerStatus(_MYMAPMAPDELETIONERROR);
				return pnRedirect(pnModURL('MyMap','user','main'));
			}

			if ($obj['id']>0) {
				DBUtil::updateObject($obj, 'mymap');
				LogUtil::registerStatus(_MYMAPUPDATED);
			}
			else {
				$obj['id'] = $this->id;
				DBUtil::insertObject($obj, 'mymap');
				LogUtil::registerStatus(_MYMAPMAPCREATED);
			}
			return pnRedirect(pnModURL('MyMap','user','main'));
		}
		return true;
    }
}

class mymap_user_routesHandler
{
    var $id;
    function initialize(&$render)
    {
		$this->id = (int)FormUtil::getPassedValue('mid');
		return true;
    }
    function handleCommand(&$render, &$args)
    {
		if ($args['commandName']=='add') {
		    if (!$render->pnFormIsValid()) return false;
		    $obj = $render->pnFormGetValues();

			// first check if coordinates are given as argument
			$lat = (float)$obj['lat'];
			$lng = (float)$obj['lng'];
			if (isset($lat) && isset($lng)) {
				$obj['mid'] = $this->id;
				if (DBUtil::insertObject($obj,'mymap_waypoints')) logUtil::registerStatus(_MYMAPWAYPOINTADDED);
				else logUtil::registerError(_MYMAPWAYPOINTERROR);
			}
			else if (isset($obj['file'])){
				// otherwise we'll use the file import function
				$filename = $obj['file']['tmp_name'];
				$filesize = $obj['file']['size'];
				$fileerror= $obj['file']['error'];
				
				// Error handling
				if (($fileerror != 0) || (!($filesize > 0))) return logUtil::registerError(_MYMPUPLOADERROR);
	
				if (pnModAPIFunc('MyMap','user','getGPXImport',array('filename'=>$filename,'mid'=>$this->id))) logUtil::registerStatus(_MYMAPIMPORTSUCCESSFULL);
				else logUtil::registerStatus(_MYMAPIMPORTERROR);
			}
			return pnRedirect(pnModURL('MyMap','user','routes',array('mid'=>$this->id)));
		}
		return true;
    }
}
?>

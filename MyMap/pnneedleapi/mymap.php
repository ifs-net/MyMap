<?php
/**
 * @package      MyMap
 * @version      $Id$
 * @author       Florian Schießl
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2008
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

/**
 * MyMap needle
 *
 * @param $args['nid'] 	int	(needle id = picture id)
 * @return array()
 */
function MyMap_needleapi_mymap($args)
{
    // Get arguments from argument array
    $nid = (int)$args['nid'];
    
    // cache the results
    static $cache;
    if(!isset($cache)) {
        $cache = array();
    } 
    
    // Load language
    pnModLangLoad('MyMap','user');

	// Now the main needle part    
    if(!empty($nid)) {
        if(!isset($cache[$nid])) {
            // not in cache array
            if(pnModAvailable('MyMap')) {
              	$mid 		= $nid;
              	$map		= pnModAPIFunc('MyMap','user','getMaps',array('id' => $mid));
              	if (($map['id'] != $mid) && (!($mid > 0))) $cache[$nid] = '<em>' . DataUtil::formatForDisplay(_MYMAPMAPNOTFOUND) . '</em>';
              	else {
					$markers 	= pnModAPIFunc('MyMap','user','getMarkers',array('mid'=>$mid));
					$waypoints 	= pnModAPIFunc('MyMap','user','getWaypoints',array('mid'=>$mid));
					// set center to the markers not the route!
					$center 	= pnModAPIFunc('MyMap','user','getCenter',array_merge($markers,$waypoints));
					$map['centerlat'] 	= $center['lat'];
					$map['centerlng'] 	= $center['lng'];
					$map['url_wps'] 	= pnmodurl('MyMap','ajax','loadWaypoints',array('mid'=>$map['id']));
				    $render 	= pnRender::getInstance('MyMap');
				    $render->assign('map', 			$map);
				    $render->assign('uid', 			pnUserGetVar('uid'));
				    $render->assign('clickzoom',	'0');
				    $render->assign('markers',		$markers);
				    $render->assign('waypoints',	$waypoints);
				    $render->assign('provider',		pnModGetVar('MyMap','provider'));
//I do not know what I meant here... We'll remove it from now on				    $render->assign('hook',	'1');
				    if (pnModGetVar('MyMap','map_overview') == 1) $map_overview = 'true';
				    else $map_overview = 'false';
				    $render->assign('map_overview',	$map_overview);
				    $content = $render->fetch('mymap_user_display_map.htm');
	
					// add the MyMap specific javascripts
				  	pnModAPIFunc('MyMap','user','addMapJS');

				    return $content;
				    die();
					$cache[$nid] = $code;
				}
            } 
			else {
                $cache[$nid] = '<em>' . DataUtil::formatForDisplay(_MYMAPNOTAVAILABLE) . '</em>';
            }
        }
        $result = $cache[$nid];
    } 
	else {
        $result = '<em>' . DataUtil::formatForDisplay(_MYMAPNONEEDLEID) . '</em>';
    }
    return $result;    
}
?>
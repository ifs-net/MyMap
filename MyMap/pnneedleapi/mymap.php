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
    
    // load language
    pnModLangLoad('MyMap','user');
    
	// Now the main needle part    
    if(!empty($nid)) {
        if(!isset($cache[$nid])) {
            // not in cache array
            if(pnModAvailable('MyMap')) {
              	$result		= pnModAPIFunc('MyMap','user','getCodeForMap',array('id' => $nid));
              	if (!$result) $cache[$nid] = '<em>' . DataUtil::formatForDisplay(_MYMAPMAPNOTFOUND) . '</em>';
              	else $cache[$nid] = $result;
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
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
 * Delete a user in the module "UserPictures"
 * 
 * @param	$args['uid']	int		user id
 * @return	array   
 */
function MyMap_userdeletionapi_delUser($args)
{
  	$uid = $args['uid'];
	if (!pnModAPIFunc('UserDeletion','user','SecurityCheck',array('uid' => $uid))) {
	  	$result 	= _NOTHINGDELETEDNOAUTH;
	}
	else {
	  	// Here you should write your userdeletion routine.
	  	// Delete your database entries or anonymize them.
	  	$tables = pnDBGettables();
	  	// maps
	  	$column = $tables['mymap_column'];
	  	$where = $column['uid']." = ".$uid;
	  	DBUtil::deleteWhere('mymap',$where);
	  	// markers
	  	$column = $tables['mymap_markers_column'];
	  	$where = $column['uid']." = ".$uid;
	  	DBUtil::deleteWhere('mymap',$where);
	  	// waypoints
	  	$column = $tables['mymap_waypoints_column'];
	  	$where = $column['uid']." = ".$uid;
	  	DBUtil::deleteWhere('mymap',$where);
	}
	return array(
			'title' 	=> _MYPROFILEMODULETITLE,
			'result'	=> $result

		);
}
?>
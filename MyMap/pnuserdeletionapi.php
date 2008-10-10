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
	  	pnModLangLoad('MyMap','user');
	  	// Here you should write your userdeletion routine.
	  	// Delete your database entries or anonymize them.
	  	$tables = pnDBGetTables();
	  	// maps
	  	//delete maps using API
	  	$maps = pnModAPIFunc('MyMap','user','getMaps',array('uid' => $uid));
	  	foreach ($maps as $map) pnModAPIFunc('MyMap','user','deleteMap',array('id' => $map['id']));

	  	// additional markers a user might have made
	  	$column = $tables['mymap_markers_column'];
	  	$where = $column['uid']." = ".$uid;
	  	DBUtil::deleteWhere('mymap_markers',$where);
	}
	return array(
			'title' 	=> _MYPROFILEMAPSDELETEDFOR,
			'result'	=> pnUserGetVar('uname',$uid)

		);
}
?>
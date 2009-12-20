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
 * initialise the MyMap module
 *
 * @return       bool       true on success, false otherwise
 */
function MyMap_init()
{

    if (!DBUtil::createTable('mymap')) return false;
    if (!DBUtil::createTable('mymap_markers')) return false;
    if (!DBUtil::createTable('mymap_waypoints')) return false;

	// Set some default values for module variables
	pnModSetVar('MyMap','provider','google');
	pnModSetVar('MyMap','notify',1);
	pnModSetVar('MyMap','map_overview',1);

    // Initialisation successful
    return true;
}

/**
 * delete the MyMap module
 *
 * @return       bool       true on success, false otherwise
 */
function MyMap_delete()
{
    // Delete the table
    if (!DBUtil::dropTable('mymap')) return false;
    if (!DBUtil::dropTable('mymap_markers')) return false;
    if (!DBUtil::dropTable('mymap_waypoints')) return false;

	// Delete all module variables
	pnModDelVar('MyMap');
	
    // Deletion successful
    return true;
}

/**
 * upgrade routine
 *
 * @return bool
 */

function MyMap_upgrade($oldversion)
{
    // Upgrade dependent on old version number
    switch($oldversion) {
        case 1.0:
		    // we do not support hooks any more
		    if (!pnModUnregisterHook('item',
		                           'transform',
		                           'API',
		                           'MyMap',
		                           'hook',
		                           'transform')) {
		        LogUtil::registerError('_MYMAPHOOKDELETEFAILED');
		        return false;
		    }
		case 1.1:
		case 1.2:
		case 1.3:
		case 1.4:
    }

    // Update successful
    return true;
}
?>
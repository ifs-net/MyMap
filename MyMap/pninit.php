<?php
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


?>
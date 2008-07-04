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

    // Set up module hooks
    if (!pnModRegisterHook('item',
                           'transform',
                           'API',
                           'MyMap',
                           'hook',
                           'transform')) {
        LogUtil::registerError('_MYMAPHOOKREGISTERFAILED');
        return false;
    }

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

    // Set up module hooks
    if (!pnModUnregisterHook('item',
                           'transform',
                           'API',
                           'MyMap',
                           'hook',
                           'transform')) {
        LogUtil::registerError('_MYMAPHOOKDELETEFAILED');
        return false;
    }
	
    // Deletion successful
    return true;
}


?>
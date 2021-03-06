<?php
/**
 * @package      MyMap
 * @version      $Id$
 * @author       Florian Schie�l
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2008
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 
// account settings panel
define('_MYMAPMYMAPS',					'My maps and routes');	
// needle / code part
define('_MYMAPINTEGRATIONPROBLEMS',		'If this map is integrated into another content and is not display correctly and javascript is enabled then');
define('_MYMAPDISPLAYMAPONSEPARATEPAGE','click here to display the map on a single page');
define('_MYMAPNOSCRIPTMESSAGE',			'Please enable javascript to see the map that should be displayed here');
define('_MYMAPMAPNOTFOUND',				'Map with given ID not found');
define('_MYMAPHOOKREGISTERFAILED',		'Hook initialisation failed');
define('_MYMAPHOOKDELETEFAILED',		'Hook deletion failed');
define('_MYMAPHOOKDISPLAYERROR',		'Hook display error for the MyMap hook');
define('_MYMAPMAPERROR',				'MyMap error');
define('_MYMAPMAPIDNOTFOUND',			'Map not found with ID');
define('_MYMAPEXPLAINHOOKERR',			'What does this mean? The author of this page wanted to include a graphical map here - but the map that should be included does not exist in the database. If you are the owner of this page check the value of the map\'s ID number or contact the website administrator if you do not know how to solve the problem. If you are "only" a normal visitor just ignore this error or write a lovely email to the owner of this page :-)');
// main 
define('_MYMAPWELCOMETOMYMAP',			'MyMap - create maps with markers');
define('_MYMAPEXPLAINMYMAP',			'With this module you can create maps and place markers in the map. So you can show your home, a meeting point, the homes of your friends etc.');
define('_MYMAPADDNEWMAP',				'Create a new map');
define('_MYMAPMANAGEMENT',					'Map management');
define('_MYMAPMANAGEMAPS',				'You can manage your maps here (delete or edit existing maps)');
define('_MYMAPNOMAP',					'There is no map associated with your account');
define('_MYMAPEDIT',					'modify');
define('_MYMAPDELETE',					'delete');
define('_MYMAPSHOW',					'show / add markers or waypoints');
// routes
define('_MYMAPROUTEMANAGMENT',			'Route / waypoint management');
define('_MYMAPROUTESINTRO',				'You can add a route to the map. You have to define waypoints on the map. Then, a line will be drawn from waypoint to waypoint.');
define('_MYMAPADDCOORDINATE',			'add');
define('_MYMAPORIMPORT',				'or use the import function (click add button after selecting file to import)');
define('_MYMAPIMPORTERROR',				'An error occured while importing the file');
define('_MYMAPIMPORTSUCCESSFULL',		'The file has been imported');
define('_MYMAPNUMSOFWPS',				'Number of stored waypoints for this map');
define('_MYMAPWAYPOINTADDED',			'Waypoint added successfully');
define('_MYMAPWAYPOINTSDELETED',		'All waypoints for this map have been deleted successfully!');
define('_MYMAPWAYPOINTSDELETIONERROR',	'Error while deleting waypoints');
define('_MYMAPWAYPOINTDELETED',			'Waypoint deleted successfully');
define('_MYMAPDELETEALLWAYPOINTS',		'Delete all waypoints');
define('_MYMAPDELETELASTWAYPOINT',		'Delete last waypoint');
define('_MYMAPACTIONS',					'Actions');
define('_MYMAPBACKTOMAP',				'Back to map\'s marker management');
define('_MYMPUPLOADERROR',				'File upload error or empty data submitted');
define('_MYMAPORADDWAYPOINT',			'or add a waypoint');
define('_MYMAPCOORDNOTRETRIEVABLE',		'No coordinate was given. Please specify more information like country code, zip code, city name');
// edit
define('_MYMAPTITLE',					'Title');
define('_MYMAPDESCRIPTION',				'Description');
define('_MYMAPWIDTH',					'Width (pixels) of the map)');
define('_MYMAPHEIGHT',					'Height (pixels) of the map)');
define('_MYMAPZOOMFACTOR',				'Zoomfactor (1 is maximum) of the map');
define('_MYMAPWIKI',					'Should other users be allowed to add own markers to your map');
define('_MYMAPYES',						'Yes');
define('_MYMAPNO',						'No');
define('_MYMAPHYBRID',					'hybrid');
define('_MYMAPNORMAL',					'normal');
define('_MYMAPSATELLITE',				'satellite');
define('_MYMAPMAPTYPE',					'How should the map be displayed');
define('_MYMAPOPTIONALTABLE',			'Should an additional table be shown next to the map that lists all markers');
define('_MYMAPUPDATECREATEMAP',			'Update or create map');
define('_MYMAPRETURNTOMAINPAGE',		'Return to main page');
define('_MYMAPUPDATED',					'The map was updated successfully');
define('_MYMAPDELETEMAP',				'Delete map and all markers');
define('_MYMAPMAPCREATED',				'New map was successfully created');
define('_MYMAPMAPDELETED',				'The map was deleted successfully');
define('_MYMAPMAPDELETIONERROR',		'An error occured while deleting the map');
// display
define('_MYMAPAUTHOR',					'author of this map');
define('_MYMAPMAPNOTFOUND',				'The selected map does not exist');
define('_MYMAPADDPOINTS',				'Insert new elements');
define('_MYMAPADDPOINTSEXPL',			'You can add markers for this map. As description you can also use HTML-code. This might help you to insert videos into the map. If you do not know the exact coordinate for the marker fill out the countrycode and postal code input field. We will look up the exact coordinate for you. Note: You can also klick at a point on the map. The clicked point\'s coordinate will be shown in the form below! So it is really easy, isn\'t it?');
define('_MYMAPCOUNTRYCODE',				'2-letter-country code');
define('_MYMAPPOSTALCODE',				'Postal code');
define('_MYMAPROUTEMANAGEMENT',			'Route / waypoint management');
define('_MYMAPLAT',						'Latitude');
define('_MYMAPLNG',						'Longitude');
define('_MYMAPPLACENAME',				'Name of markered place');
define('_MYMAPDATE',					'Date of this entry or markered event');
define('_MYMAPUPDATECREATEPOINT',		'update / add point');
define('_MYMAPCOORDSMISSING',			'The longitude and the latitude are missing. Please give us the countrycode and postalcode of your target. Also the name of the place might help us.');
define('_MYMAPPOINTUPDATED',			'The marker was updated');
define('_MYMAPPOINTADDED',				'The marker was added');
define('_MYMAPMULTIFOUND',				'More than one place was found:');
define('_MYMAPCHOOSEONE',				'please choose the postalcode and / or the countrycode you need');
define('_MYMAPPOINTSOVERVIEW',			'Overview of markers');
define('_MYMAPPOINTSOVERVIEWEXPL',		'If you are the owner or authorized, you can manage the markers here!');
define('_MYMAPSHOWOVERVIEW',			'Show a list of all markers');
define('_MYMAPSHOWADDPOINTS',			'Add new markers');
define('_MYMAPPOINTDELETED',			'The markered point was deleted successfully');
define('_MYMAPPOINTDELETIONERROR',		'An error occured while trying to delete a markered point');
define('_MYMAPINSERTMAP',				'You want to share this map');
define('_MYMAPINSERTMAPHOWTO',			'If you want to insert this map into a forum posting or into a weblog posting you just have to insert the following code into the plain text');
define('_MYMAPNOTIFYSENT',				'A notification Email was sent to the author of the map that you added a new marker');
define('_MYMAPFULLSCREENMODE',			'Fullscreen mode');
define('_MYMAPMINIMIZE',				'Minimize');
define('_MYMAPREALLYDELETE',			'Do you really want to delete this point?');
define('_MYPROFILECOORDRETRIEVED',		'Geo information encoded to coordinage');
// map control (hook, display, ...)
define('_MYMAPCLOSEMAPCONTROL',			'close menu');
define('_MYMAPHIDEMARKERS',				'hide markers');
define('_MYMAPSHOWMARKERS',				'show markers');
define('_MYMAPHIDEROUTES',				'hide route');
define('_MYMAPSHOWROUTES',				'show route');
define('_MYMAPEXPORTGPX',				'export gpx');
define('_MYMAPEXPORTKML',				'export kml');
define('_MYMAPUNKNOWNTYPE',				'Unknown export type');
define('_MYMAPWAITFOREXPORT',			'Please wait while the export data is beeing generated!');
// notification email
define('_MYMAPNOTIFYINTRO',				'This is a notification email for you. You are the owner of a map and someone else in your community added a new marker in your map. If you do not want other users being able to add new markers on your map please change the settings for the affected map!');
define('_MYMAPNOTIFYAFFECTEDMAP',		'Information about the affected map');
define('_MYMAPMAPID',					'Internal ID number of the map');
define('_MYMAPMAPTITLEOFYOURMAP',		'Title of your map');
define('_MYMAPNEWMARKERTITLE',			'The new marker\'s title');
define('_MYMAPNEWMARKERTEXT',			'Additional text for the marker');
define('_MYMAPADDEDBY',					'The marker was added by');
define('_MYMAPMAPLINK',					'See the map');
define('_MYMAPDONOTREPLY',				'Please do not reply to this email! This is just an automatical generated text...');
define('_MYMAPUSERID',					'User-ID');
define('_MYMAPSUBJECT',					'Your map has been modified');
// userdeletion support
define('_MYPROFILEMAPSDELETEDFOR',		'All maps deleted for Account');
?>

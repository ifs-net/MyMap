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
 * Return an array of items to show in the your account panel
 *
 * @return   array   
 */
function MyMap_accountapi_getall($args)
{
    // Create an array of links to return
    pnModLangLoad('MyMap');
    $items = array(array('url'     => pnModURL('MyMap', 'user','main'),
                         'title'   => _MYMAPMYMAPS,
                         'icon'    => 'button.gif'));
    // Return the items
    return $items;
}

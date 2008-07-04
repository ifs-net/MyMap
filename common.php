<?php
/**
 * hook function to include a map into every type of content
 * 
 * @param    int     $args['id']    	id of marker / point
 * @return   boolean	
 */
function mymap_hookapi_transform($args)
{
    // Argument check
    if ((!isset($args['objectid'])) || (!isset($args['extrainfo']))) {
        LogUtil::registerError(_MYMAPHOOKDISPLAYERROR);
        return;
    }
    if (is_array($args['extrainfo'])) foreach ($args['extrainfo'] as $text) $result[] = mymap_transform($text);
    else $result = mymap_transform($text);
    return $result;
}
?>
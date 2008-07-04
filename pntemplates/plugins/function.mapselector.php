<?php

function smarty_function_MyMap_mapSelector($params, &$smarty)
{
  if (!isset($params['albumId'])) 
    return $smarty->trigger_error('MyMap_albumSelector: albumId parameter required');

  $albumId = $params['albumId'];
  $mediaId = $params['mediaId'];

  if (!pnModAPILoad('MyMap', 'user'))
    return $smarty->trigger_error( MyMapErrorPage(__FILE__, __LINE__, 'Failed to load MyMap user API') );

  $items = pnModAPIFunc('MyMap', 'user', 'getMediaItems',
                        array('albumId' => $albumId));
  if ($items === false)
    return MyMapErrorAPIGet();

  if ($mediaId == 0  &&  count($items) > 0  &&  isset($params['fetchSelectedInto']))
  {
    $mediaId = $items[0]['id'];
    $mediaItem = pnModAPIFunc('MyMap', 'user', 'getMediaItem',
                              array('mediaId' => $mediaId));
    $smarty->assign($params['fetchSelectedInto'], $mediaItem);
  }

  if (isset($params['onchange']))
    $onChangeHtml = " onchange=\"$params[onchange]\"";
  else
    $onChangeHtml = '';

  $html = "<select name=\"mid\"$onChangeHtml>\n";

  foreach ($items as $item)
  {
    $title = $item['title'];
    $id    = (int)$item['id'];

    $selectedHtml = ($id == $mediaId ? ' selected="1"' : '');

    $html .= "<option value=\"$id\"$selectedHtml>$title</option>\n";
  }


  $html .= "</select>";

  if (isset($params['assign']))
    $smarty->assign($params['assign'], $html);
  else
    return $html;
}

?>
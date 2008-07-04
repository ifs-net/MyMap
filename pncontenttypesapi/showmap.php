<?php

class MyMap_contenttypesapi_showMapPlugin extends contentTypeBase
{
  var $mid;

  function getModule() { return 'MyMap'; }
  function getName() { return 'showMap'; }
  function getTitle() { return _MYMAP_CONTENTENTTYPE_SHOWMAPTITLE; }
  function getDescription() { return _MYMAP_CONTENTENTTYPE_SHOWMAPDESCR; }


  function loadData($data)
  {
    $this->mid = $data['mid'];
  }

  
  function display()
  {
	return $this->displayEditing();
  }

  
  function displayEditing()
  {
    if (!empty($this->mid))
    {
      // we'll use the hook function - this function exists already and 
	  // we are a little bit lazy ;-)
      $extrainfo = array();
      $extrainfo[] = '::mymap::'.$this->mid.'::';
	  $hookarray = array (	'objectid'	=> 0,
	  						'extrainfo'	=> $extrainfo	);
      $content = pnModAPIFunc('MyMap','hook','transform',$hookarray);
      return $content[0];
    }
    return _MYMAP_CONTENTTYPE_NOMIDFOUND;
  }

  
  function getDefaultData()
  { 
    return array('mid' => null);
  }

  
  function startEditing(&$render)
  {
    return "blubb";
  }
}


function MyMap_contenttypesapi_showmap($args)
{
  return new MyMap_contenttypesapi_showMapPlugin();
}

?>
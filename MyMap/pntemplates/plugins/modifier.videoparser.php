<?php
/**
 * @package      MyMap
 * @version      $Id: function.divpager.php 91 2008-08-24 09:05:40Z quan $
 * @author       Florian Schießl
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2008
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 
function smarty_modifier_videoparser($text=null)
{
  	$text = (string)$text;
	if (eregi('youtube\.com\/watch\?v=',$text)) {
	  	$a = explode('?v=',$text);
	  	$code = $a[1];
		return '<object width=425 height=344><param name=movie value=http://www.youtube.com/v/'.$code.'&hl=de&fs=1></param><param name=allowFullScreen value=true></param><param name=allowscriptaccess value=always></param><embed src=http://www.youtube.com/v/'.$code.'&hl=de&fs=1 type=application/x-shockwave-flash allowscriptaccess=always allowfullscreen=true width=425 height=344></embed></object>';
	}
	else return pnVarPrepForDisplay($text).":";
}

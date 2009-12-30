<?php
/**
 * Degree (fixed float) input plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformfloatinput.php 24666 2008-09-19 16:40:25Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/** Make sure to use require_once() instead of Loader::requireOnce() since "function.pnformtextinput.php"
 is loaded by Smarty (the base render class) with the use of require_once(). We do not want to
 get in conflict with that.*/
require_once 'system/pnForm/plugins/function.pnformtextinput.php';

/**
 * Floating value input
 *
 * Use for text inputs where you only want to accept floats. The value saved by
 * {@link pnForm::pnFormGetValues()} is either null or a valid float.
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormDegInput extends pnFormTextInput
{
    /**
     * Minimum value for validation
     * @var float
     */
    var $minValue;

    /**
     * Maximum value for validation
     * @var float
     */
    var $maxValue;


    function getFilename()
    {
        return __FILE__; // FIXME: may be found in smarty's data???
    }


    function create(&$render, &$params)
    {
        $this->maxLength = 30;
        $params['width'] = '6em';
        parent::create($render, $params);
    }


    function validate(&$render)
    {
        parent::validate($render);
        if (!$this->isValid)
            return;

        if ($this->text != '')
        {
            // process float value
            $this->text = $this->parseValue($render,$this->text);
            if ( $this->text === null ) {
                $this->setError(_NOTAVALIDNUMBER);
                return;
            }

            $i = (float)$this->text;
            if (   $this->minValue != null && $i < $this->minValue 
                || $this->maxValue != null && $i > $this->maxValue)
            {
                if ($this->minValue != null  &&  $this->maxValue != null)
                    $this->setError(_PNFORM_RANGEERROR . " [$this->minValue,$this->maxValue]");
                else if ($this->minValue != null)
                    $this->setError(pnML('_PNFORM_RANGEMINERROR', array('i' => $this->minValue)));
                else if ($this->maxValue != null)
                    $this->setError(pnML('_PNFORM_RANGEMAXERROR', array('i' => $this->maxValue)));
            }
        }
    }


    function parseValue(&$render, $text)
    {
        if ($text == '') {
            return null;
        }

        // process degree input
        if (!is_numeric($text)) {
	    $input = str_replace(" ", "", $text);
            $value = 0;
            $matches = array();
            if( preg_match("/^([NSWEO+-]?)(\d+)°(\d+)'(\d+\.?\d*)\"?([NSWEO]?)$/", $input, &$matches) ) {
                // matching ddd°mm'ss.s" with leading or trailing direction indicator 
                $value = $matches[2];
                $value += $matches[3] / 60.0;
                $value += $matches[4] / 3600.0;
                $dir = strlen($matches[1])==1 ? $matches[1] : $matches[5];
                if( strlen($dir)==1 && 
                    (strcmp($dir, "S")==0 || strcmp($dir, "W")==0 || strcmp($dir, "-")==0 )
                ) $value *= -1;
            } elseif( preg_match("/^([NSWEO+-]?)(\d+)°(\d+\.?\d*)'?([NSWEO]?)$/", $input, &$matches) ) {
                // matching ddd°mm.mm with leading or trailing direction indicator 
                $value = $matches[2];
                $value += $matches[3] / 60.0;
                $dir = strlen($matches[1])==1 ? $matches[1] : $matches[4];
                if( strlen($dir)==1 && 
                    (strcmp($dir, "S")==0 || strcmp($dir, "W")==0 || strcmp($dir, "-")==0 )
                ) $value *= -1;
            } elseif( preg_match("/^([NSWEO+-]?)(\d+\.?\d*)°?([NSWEO]?)$/", $input, &$matches) ) {
                // matching ddd.dd° with leading or trailing direction indicator 
                $value = $matches[2];
                $dir = strlen($matches[1])==1 ? $matches[1] : $matches[3];
                if( strlen($dir)==1 && 
                    (strcmp($dir, "S")==0 || strcmp($dir, "W")==0 || strcmp($dir, "-")==0 )
                ) $value *= -1;
            } else {
                return null;
            }
            $text = floatval($value);
        }
        // process float value
        // trouble is, that (float) to (string) conversion obviously takes care of LOCALE
        // so when the server uses a LOCALE with different "decimal_point"
        // the resulting string is not numeric - with regard to is_numeric()
        // and subsequent parsing with floatval() cuts off at the unusual "decimal_point"
        $text = floatval($text);
        $LocaleInfo = localeconv();
        $text = str_replace($LocaleInfo["thousands_sep"] , "", $text);
        $text = str_replace($LocaleInfo["decimal_point"] , ".", $text); 
        
        return $text;
    }
}


function smarty_function_pnformdeginput($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormDegInput', $params);
}

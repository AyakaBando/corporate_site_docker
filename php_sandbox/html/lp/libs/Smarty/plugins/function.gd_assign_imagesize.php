<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {debug} function plugin
 *
 * Type:     function<br>
 * Name:     debug<br>
 * Date:     July 1, 2002<br>
 * Purpose:  popup debug window
 * @link http://smarty.php.net/manual/en/language.function.debug.php {debug}
 *       (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @version  1.0
 * @param array
 * @param Smarty
 * @return string output from {@link Smarty::_generate_debug_output()}
 */
function smarty_function_gd_assign_imagesize($params, &$smarty)
{
    if ( !empty( $params['imagepath'] ) ) {
		list( $width, $height )=getimagesize( $params['imagepath'] );
		$smarty->assign( $params['index_width_name'], $width );
		$smarty->assign( $params['index_height_name'], $height );
    }
}

/* vim: set expandtab: */

?>

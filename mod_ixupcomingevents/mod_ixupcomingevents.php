<?php
/**
 * Imixtix Module
 * 
 * @package    ImixTix
 * @subpackage Modules
 * @link http://dev.joomla.org/component/option,com_jd-wiki/Itemid,31/id,tutorials:modules/
 * @license        GNU/GPL, see LICENSE.php
 * mod_imxitix is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
// Include the syndicate functions only once
require_once( dirname(__FILE__).DS.'helper.php' );
$imixtix_events = $params->get('imixtix_events', '1');
$imixtix_image_width = $params->get('imixtix_image_width', '150');
$imixtixmodulelayout = $params->get('imixtixmodulelayout', 'default');
$model = JModel::getInstance('Events', 'ImixtixModel');
$ImixTix = modIxUpcomingEventsHelper::getIxUpcomingEvents($imixtix_events);
require( JModuleHelper::getLayoutPath( 'mod_ixupcomingevents', $imixtixmodulelayout));
?>
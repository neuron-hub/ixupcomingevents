<?php

/**
 * Helper class for IxUpcomingEvents module
 * 
 * @package    IxUpcomingEvents
 * @subpackage Modules
 * @link http://dev.joomla.org/component/option,com_jd-wiki/Itemid,31/id,tutorials:modules/
 * @license        GNU/GPL, see LICENSE.php
 * mod_imixtix is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class modIxUpcomingEventsHelper {

    /**
     * Retrieves the display message
     *
     * @param array $params An object containing the module parameters
     * @access public
     */
    public static function getIxUpcomingEvents($params) {
                
        $mainframe = JFactory::getApplication();
        $db = JFactory::getDBO();
        jimport('joomla.html.pagination');
        
        $app = JFactory::getApplication();
        $limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $params, 'int');
        $limitstart = JRequest::getVar('limitstart', 'limitstart', '', 'int');
        $db->setQuery("SELECT count(*) from #__imixtix_events WHERE status=1 and start_date >= '" . date('Y-m-d') . "' ORDER By start_date ASC");
        $total = $db->loadResult();
        $Q = "SELECT event.id,event.event_title,GROUP_CONCAT(ticket.id) as ticket,event.image1,event.image2,event.start_date,event.end_date,event.status,venue.venue_name,venue.venue_region,venue.venue_country,venue.venue_state,venue.venue_city,venue.venue_street,venue.venue_zip 	 FROM `#__imixtix_events` as event  
            LEFT  JOIN   #__imixtix_categories as cat 
            on  cat.id = event.event_category  
            LEFT JOIN #__imixtix_venues as venue on venue.id= event.venue
            LEFT JOIN #__imixtix_tickets AS ticket ON ticket.event_id = event.id
            WHERE event.status='1' and event.start_date >= '" . date('Y-m-d') . "'  GROUP BY event.id ORDER BY event.start_date ASC ";
        $Query = ($limit != '') ? $Q . " LIMIT " . $limitstart . ", " . $limit : $Q;
        $db->setQuery($Query);
        $params = $db->loadObjectList();
        return $params;
    }
}

?>
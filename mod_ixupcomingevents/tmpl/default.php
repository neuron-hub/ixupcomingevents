<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() . "components/com_imixtix/assets/css/bootstrap.css", 'text/css', null, array());
$document->addStyleSheet(JURI::base() . "components/com_imixtix/assets/css/bootstrap-responsive.css", 'text/css', null, array());
$document->addStyleSheet(JURI::base() . "components/com_imixtix/assets/css/responsive.css", 'text/css', null, array());
$document->addStyleSheet(JURI::base() . "components/com_imixtix/assets/css/style.css", 'text/css', null, array());
$document->addStyleSheet(JURI::base() . "components/com_imixtix/assets/css/template.css", 'text/css', null, array());
$document->addStyleSheet(JURI::base() . "components/com_imixtix/assets/css/pagination.css", 'text/css', null, array());
?>
<style>
            .sidebar-events {
                background: #eee;
                text-align: center;
                text-transform: uppercase;
                padding: 20px 0;
            }

            .sidebar-events .day-events {
                font-size: 30px;
            }

            .sidebar-events .text-events {
                font-size: 16px;
            }
        </style>
<?php 
if (!empty($ImixTix)) {
    foreach ($ImixTix as $imix):
        ?>
        
        <div class="row-fluid">
            <div class="span3">
                <div class="sidebar-events">
                    <?php $event_date = $imix->start_date ?>
                    <div class="day-events"><?php echo $event_day = date('d', strtotime($event_date)); ?></div>
                    <div class="text-events" style="text-transform:uppercase;"><?php echo $event_month = date('M', strtotime($event_date)); ?></div>
                    <div class="text-events"><?php echo $event_year = date('Y', strtotime($event_date)); ?></div>
                </div>
            </div>
            <div class="span9">
                <h5 style="margin-top:0px;"><a href="<?php echo JRoute::_('index.php?option=com_imixtix&task=events.tickets&id=' . $imix->id); ?>"><?php echo $imix->event_title; ?></a></h5>
                <?php $event_venue = $imix->venue_name; ?>
                <p><i class="icon-briefcase"></i> <?php echo $event_venue; ?></p>
                <?php
                if (!empty($imix->ticket)) {
                    ?>
                    <a class="btn" href="<?php echo JRoute::_('index.php?option=com_imixtix&task=events.tickets&id=' . $imix->id); ?>">Buy Tickets</a>
                    <?php
                }
                ?>
            </div>
        </div>   
        <hr/>
        <?php
    endforeach;
} else {
    echo JText::_('No Upcoming Event found!');
}
?>

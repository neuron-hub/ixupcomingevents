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
    .imixtix_upcoming-events{
        margin: 5px 0px;
    }
    .listing-gallery {
        position: relative;
    }

    .listing-gallery .content-grouper {
        background-color: rgba(0,0,0,0.5);
        bottom: 0;
        left: 0;
        position: absolute;
        width: 100%;
    }

    .album-thumb {
        color: #fff;
        position: relative;
    }

    .album-thumb:hover .album-description {
        display: block !important;
    }


    .listing-gallery h3 {
        margin: 6px 0 5px;
    }

    .listing-gallery .album-title h3 {
        float: left;
        font-size: 13px;
        font-weight: bold;
        margin-right: 10px;
        max-height: 30px;
        line-height: 24px;
        overflow: hidden;
        margin-left: 10px;
    }

    .listing-gallery .album-title h3 a{
        color: #fff;
    }

    .listing-gallery .stats-venue{
        line-height: 24px;
        margin: 5px 0;
        padding-right: 10px;
        text-align: right;
    }

    .listing-gallery .album-description {
        display: none;
        padding: 0 10px 5px;
        position: relative;
    }

    .listing-gallery h5 {
        font-weight: normal;
        text-transform: none;
        margin: 0;
    }
</style>
<?php
if (!empty($ImixTix)) {
    foreach ($ImixTix as $imix):
        ($imix->image1 == '' && $imix->image1 == '') ? $image = JURI::base() . 'components/com_imixtix/assets/images/no_image.png' : (($imix->image1 != '') ? $image = JURI::base() . 'images/imixtix_events/' . $imix->image1 : $image = JURI::base() . 'images/imixtix_events/' . $imix->image2);
        ?>
        <div id="imixtix-upcoming-<?php echo $imix->id; ?>" class="imixtix_upcoming-events">
            <div class="row-fluid">
                <div class="span12">
                    <div class="album-thumb listing-gallery  clearfix" style="max-width: 100%;margin:auto;<?php echo ($imixtix_image_width ? 'width:'.$imixtix_image_width.'px;':''); ?>">
                        <a rel="<?php echo $imix->event_title; ?>" class="widget-upcoming-thumbnail album-image" href="<?php echo JRoute::_('index.php?option=com_imixtix&task=events.tickets&id=' . $imix->id); ?>">
                            <img class="event_image" id="event_image_<?php echo $imix->id; ?>" alt="<?php $imix->event_title; ?>" title="<?php echo $imix->event_title; ?>" src="<?php echo JURI::base(); ?>administrator/components/com_imixtix/includes/timthumb.php?src=<?php echo $image; ?>&w=<?php echo $imixtix_image_width; ?>&zc=0"/>
                        </a>

                        <div class="content-grouper">
                            <div class="album-title clearfix">
                                <h3 title="<?php echo $imix->event_title; ?>">
                                    <a href="<?php echo JRoute::_('index.php?option=com_imixtix&task=events.tickets&id=' . $imix->id); ?>">
                                        <?php echo $imix->event_title; ?>
                                    </a>
                                </h3>
                            </div>
                            <div class="album-description">
                                <?php $event_date = $imix->start_date ?>
                                <h5><i class="icon-calendar icon-white"></i> <?php echo date('M d, Y', strtotime($event_date)); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /flexslider -->
        <hr/>
        <?php
    endforeach;
} else {
    echo JText::_('No Upcoming Event found!');
}
?>

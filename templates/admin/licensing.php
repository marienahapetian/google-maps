<!-- https://goo.gl/4ZkFas -->

<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$license = array(
    array(
        "title" => "Custom Marker Upload",
        "text" => "Select colorful and bright marker from the big library of 44 markers in Maps Markers or upload your own. Choose the size and add the URL to it, so that users will be able to find the website connected with the marker easily",
        "icon" => "8px -219px"
    ),
    array(
        "title" => "Advanced Directions",
        "text" => "Functional directions tool will allow users to add destinations and get directions for it. See the distance for cars, bikes, buses and feet in miles and kilometers and search through the map",
        "icon" => "-93px -228px"
    ),
    array(
        "title" => "Advanced Maps Styling",
        "text" => "We included a huge repository of different styles for Google Map aimed towards web designers and developers. Which you can customize yourself",
        "icon" => "-298px -228px"
    ),
    array(
        "title" => "Maps shapes customisation",
        "text" => "You will have 3 ways to designate areas. Put geometric shape with a polygon, outline the route with the polyline and the circle to designate round areas",
        "icon" => "-411px -226px"
    ),
    array(
        "title" => "Advanced layers",
        "text" => "There are different types of road layers that you can use on you map. This comprehensive street map includes Traffic Layer, Bicycling Layer, Transit Layer",
        "icon" => "-107px -313px"
    ),
    array(
        "title" => "JSON file export support",
        "text" => "JSON file exporting makes it easy to export data, creates a JSON file of the objects that you submit",
        "icon" => "-274px -323px"
    ),
    array(
        "title" => "Store Locator",
        "text" => "Locate your store and allow users to see the destination and ways to reach you. This is a great way to either see how to get to the store or see the stores nearby when needed....",
        "icon" => "-10px -307px"
    ),
    array(
        "title" => "Over 20 Map Options",
        "text" => "In Huge-IT Google Map plugin you can find more than 20 various map options which will make your Map better for you and your visitors",
        "icon" => "-186px -307px"
    )
);
?>


<div class="responsive grid">
    <?php foreach ($license as $key => $val) { ?>
        <div class="col column_1_of_3">
            <div class="header">
                <div class="col-icon" style="background-position: <?= $val["icon"] ?>; ">
                </div>
                <?php echo __($val["title"],'hg_gmaps'); ?>
            </div>
            <p><?php echo  __($val["text"],'hg_gmaps'); ?></p>
            <div class="col-footer">
                <a href="https://goo.gl/4ZkFas" target="_blank" class="a-upgrate"><?php _e('Upgrade','hg_gmaps');?></a>
            </div>
        </div>
    <?php } ?>
</div>


<div class="license-footer">
    <p class="footer-text">
        <?php _e('You are using the Lite version of the Huge IT Google Map Plugin for WordPress. If you want to get more awesome options,
        advanced features, settings to customize every area of the plugin, then check out the Full License plugin.
        The full version of the plugin is available in 3 different packages of one-time payment.','hg_gmaps');?>
    </p>
    <p class="this-steps max-width">
        <?php _e('After the purchasing the commercial version follow this steps','hg_gmaps');?>
    </p>
    <ul class="steps">
        <li><?php _e('Deactivate Huge IT Google Map Plugin','hg_gmaps');?></li>
        <li><?php _e('Delete Huge IT Google Map','hg_gmaps');?></li>
        <li><?php _e('Install the downloaded commercial version of the plugin','hg_gmaps');?></li>
    </ul>
    <a href="https://goo.gl/4ZkFas" target="_blank"><?php _e('Purchase a License','hg_gmaps');?></a>
</div>

<!-- https://goo.gl/4ZkFas -->

<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$license = array(
    array(
        "title" => "Custom Marker Upload",
        "text" => "",
        "icon" => "8px -219px"
    ),
    array(
        "title" => "Advanced Directions",
        "text" => "",
        "icon" => "-93px -228px"
    ),
    array(
        "title" => "Links and HTML support",
        "text" => "",
        "icon" => "-192px -237px"
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
        "title" => "CSV file export support",
        "text" => "CSV file exporting makes it easy to export data, creates a CSV file of the objects that you submit",
        "icon" => "-274px -323px"
    )
);
?>


<div class="responsive grid">
    <?php foreach ($license as $key => $val) { ?>
        <div class="col column_1_of_3">
            <div class="header">
                <div class="col-icon" style="background-position: <?= $val["icon"] ?>; ">
                </div>
                <?= $val["title"] ?>
            </div>
            <p><?= $val["text"] ?></p>
            <div class="col-footer">
                <a href="https://goo.gl/4ZkFas" class="a-upgrate">Upgrade</a>
            </div>
        </div>
    <?php } ?>
</div>


<div class="license-footer">
    <p class="footer-text">
        You are using the Lite version of the Huge IT Google Map Plugin for WordPress. If you want to get more awesome options,
        advanced features, settings to customize every area of the plugin, then check out the Full License plugin.
        The full version of the plugin is available in 3 different packages of one-time payment.
    </p>
    <p class="this-steps max-width">
        After the purchasing the commercial version follow this steps
    </p>
    <ul class="steps">
        <li>Deactivate Huge IT Google Map Plugin</li>
        <li>Delete Huge IT Google Map</li>
        <li>Install the downloaded commercial version of the plugin</li>
    </ul>
    <a href="https://goo.gl/4ZkFas" target="_blank">Purchase a License</a>
</div>

<?php
/**
 * @var $map Hugeit_Maps_Map
 */
?>
<div id="locatorBox_<?php echo $map->get_id(); ?>" class="locatorBox">
    <input type="text" id="searchLocator_<?php echo $map->get_id(); ?>" class="searchLocator"
           name="searchLocator" maxlength="250"
           placeholder="Enter your location "
           value="<?php echo $map->get_locator_default_address();?>"
    >
    <select name="locatorRadius" id="locatorRadius_<?php echo $map->get_id(); ?>" class="locatorRadius">
        <option value="100000"><?php _e('No Limitation','hg_gmaps');?></option>
        <option value="200"><?php _e('200kms','hg_gmaps');?></option>
        <option value="100"><?php _e('100kms','hg_gmaps');?></option>
        <option value="50"><?php _e('50kms','hg_gmaps');?></option>
        <option value="30"><?php _e('30kms','hg_gmaps');?></option>
        <option value="20"><?php _e('20kms','hg_gmaps');?></option>
        <option value="10"><?php _e('10kms','hugeit_contact');?></option>
    </select>
    <input type="submit" value="<?php _e('Search','hg_gmaps');?>" id="submitLocator_<?php echo $map->get_id(); ?>" class="submitLocator">
</div>

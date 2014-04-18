<?php
/**
 * @package	mod_db8kivateam
 * @author	Peter Martin, www.db8.nl
 * @copyright	Copyright (C) 2014 Peter Martin. All rights reserved.
 * @license	GNU General Public License version 2 or later.
 */
defined('_JEXEC') or die;
?>
<h3>Members</h3>
<div class="db8kivateam<?php echo $moduleclass_sfx; ?>">

    <?php foreach ($members as $member) { ?>

        <div class="image">
            <a href="http://www.kiva.org/lender/<?php echo $member->uid; ?>" target="_blank" title="<?php echo $member->name; ?>">
                <img src="http://kiva.org/img/s300/<?php echo $member->image->id; ?>.jpg" height="150px" width="150px"></a>
        </div>
        <div>
            Name: <?php echo $member->name; ?>
        </div>
    <?php if(isset($member->whereabouts)){ ?>
        <div>
            From: <?php echo $member->whereabouts; ?>
    <?php } ?>   
    <?php if(isset($member->country_code)){ ?>
            <?php echo $member->country_code; ?>
        </div>
    <?php } ?>   
    <?php if(isset($member->team_join_date)){ ?>
        <div>
            Joined team: <?php echo substr ($member->team_join_date, 0, 10); ?>
        </div>
    <?php } ?>   
    <?php if(isset($member->lender_id)){ ?>
        <div>
            Kiva Profile: <a href="http://www.kiva.org/lender/<?php echo $member->lender_id; ?>" target="_blank" title="<?php echo $member->name; ?>">
                http://www.kiva.org/lender/<?php echo $member->lender_id; ?></a>
        </div>
    <?php } ?>   

    <?php } ?>
    
</div>
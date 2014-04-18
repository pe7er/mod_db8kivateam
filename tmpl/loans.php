<?php
/**
 * @package	mod_db8kivateam
 * @author	Peter Martin, www.db8.nl
 * @copyright	Copyright (C) 2014 Peter Martin. All rights reserved.
 * @license	GNU General Public License version 2 or later.
 */
defined('_JEXEC') or die;
$document = JFactory::getDocument();
// add minified CSS stylesheet (original CSS: db8socialmediashare_style.css)
$document->addStyleSheet('modules/mod_db8kivateam/assets/db8kivateam_style.css');
?>

<h3>Loans</h3>
<div class="db8kivateam<?php echo $moduleclass_sfx; ?>">

    <?php foreach ($loans as $loan) { ?>
    <article class="loanCard default vertical " id="biz_row_688646">

        <a class="img img-s100 thumb" data-kv-trackevent="" target="_blank" href="http://www.kiva.org/lend/<?php echo $loan->id; ?>">
            <img src="http://s3-1.kiva.org/img/s100/<?php echo $loan->image->id; ?>.jpg" alt="<?php echo $loan->name; ?>" title="<?php echo $loan->name; ?>" width="100" height="100"></a>

        <span class="info_status">
            <div class="name">
                <a href="http://www.kiva.org/lend/<?php echo $loan->id; ?>" target="_blank" title="<?php echo $loan->name ?>"><?php echo $loan->name; ?></a>				
            </div>
            <div class="info">
                <div class="activity"><span class="icon-wrench"></span> <?php echo $loan->activity; ?></div>
                <div class="sector"><span class="icon-pie"></span> <?php echo $loan->sector; ?></div>
                <div class="theme"><span class="icon-folder-open"></span> <?php echo $loan->theme; ?></div>
                <div class="use"><span class="icon-pie"></span> <?php echo $loan->use; ?></div>
                <div class="planned_expiration_date"><span class="icon-pie"></span> <?php echo $loan->planned_expiration_date; ?></div>
                <div class="loan_amount"><span class="icon-coin"></span> <?php echo $loan->loan_amount; ?></div>
                <div class="borrower_count"><span class="icon-stats"></span> <?php echo $loan->borrower_count; ?></div>
                <div class="lender_count"><span class="icon-bars"></span> <?php echo $loan->lender_count; ?></div>
                
                <div class="country">
                    <span class="f16 py"></span><span class="icon-earth"></span>
                    <a href="http://www.kiva.org/lend?countries=<?php echo $loan->location->country_code; ?>" 
                       target="_blank" title="<?php echo $loan->location->country; ?>"><?php echo $loan->location->country; ?></a>
                </div>									
            </div>

            <div class="status">

                <div class="loanStatusSubView">
                    <span class="status">Raised</span>
                    <div class="raisedMeter meter">
                        <div id="688646_bar" style="width:0%"></div>
                    </div>

                    <div id="688646_amount_raised" class="percentRaised raised ">
                        <span id="688646_percent_paid" class="number">0%</span>
                        repaid
                    </div>
                </div>

            </div>

        </span>
    </article>
    <?php } ?>    
</div>
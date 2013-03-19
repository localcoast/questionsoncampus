<?php
/**
 * Questions on Campus Website.
 *
 * @category    Website
 * @package     Website_View
 * @author      Andrew Sorensen <andrew@localcoast.net>
 *
 * @version     $Id: homepage.php 29 2013-03-19 17:39:29Z andrew@localcoast.net $
 */
$this->layout()->setLayout('homepage');

$this->headMeta()->appendName('description', $this->document->getDescription());
$this->headTitle($this->document->getTitle());
?>
<div class="header hero-unit">
    <div class="inner">
        <h1><?php echo $this->input('hero_headline'); ?></h1>
        <hr>
        <?php echo $this->wysiwyg('hero_callout'); ?>
    </div>
</div>

<h1>How it Works:</h1>
<br />
<div class="row-fluid">
    <?php while ($this->block('process', array('limit' => 3))->loop()) { ?>
        <div class="span4">
            <?php echo $this->wysiwyg('process_item') ?>
        </div>
    <?php } ?>
</div><!--/row-->
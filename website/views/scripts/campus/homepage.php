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
$this->layout()->setLayout('homepage-campus');

$this->headMeta()->appendName('description', $this->document->getDescription());
$this->headTitle($this->document->getTitle());
?>
<div class="row-fluid">
    <div class="span3">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <!-- recently asked -->
                <li class="nav-header">Recently Asked</li>
                <?php foreach ($this->questions as $question) { ?>
                    <li><a href="/question/<?php echo $question['id']; ?>"><?php echo $this->escape($question['question']);?></a></li>
                <?php } ?>
                <!-- quick links -->
                <li class="nav-header">Quick Links</li>
                <li><a href="http://www.tacoma.uw.edu/campus-map">Campus Map</a></li>
                <li><a href="https://myuw.washington.edu/">MyUW</a></li>
                <li><a href="http://www.tacoma.uw.edu/administrative-services/campus-safety">Campus Safety</a></li>
                <li><a href="http://www.tacoma.washington.edu/studentaffairs/SI/index.cfm">Student Involvement</a></li>
                <li><a href="http://tacoma.collegiatelink.net/">Student Organizations</a></li>
            </ul>
        </div><!--/.well -->
    </div><!--/span-->
    <div class="span9">
        <div class="well">
            <h1 style="margin-bottom: 15px;">What would you like to know more about?</h1>
            <p>Need to know where to find something on campus? Looking for something to do on your Husky Hour? Type your query below and we'll find something for you at <strong>University of Washington - Tacoma.</strong></p>
            <form class="form-search" action="/ask" method="post">
                <input type="text" class="input-medium search-query" style="width: 350px; height: 25px; margin-right: 10px;" name="question[question]" placeholder="Just type..." maxlength="160" data-provide="typeahead">
                <input type="hidden" name="_hide-validation_" value="1">
                <button type="submit" class="btn btn-primary btn-large">Ask</button>
            </form>
            <p><a class="btn btn-info btn-large pull-right">How it works &raquo;</a></p>
            <br style="clear:both;" />
        </div>
    </div>
</div>
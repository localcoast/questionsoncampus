<?php
/**
 * Questions on Campus Website.
 *
 * @category    Website
 * @package     Website_View
 * @author      Andrew Sorensen <andrew@localcoast.net>
 *
 * @version     $Id: ask.php 29 2013-03-19 17:39:29Z andrew@localcoast.net $
 */
$this->layout()->setLayout('homepage-campus');

$this->headMeta()->appendName('description', $this->document->getDescription());
$this->headTitle($this->document->getTitle());
?>
<div class="row well">
    <?php if (count($this->errors)) { ?>
        <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>You're not done yet!</h4>
            <ul>
                <?php foreach ($this->errors as $model) { ?>
                    <?php foreach ($model as $error) { ?>
                        <li><?php echo $this->escape($error); ?>.</li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
    <form class="form-horizontal span5" method="post" action='/ask' accept-charset="UTF-8">
        <fieldset>
            <legend>What is your question?</legend>
            <div class="control-group">
                <label class="control-label" for="question_question">Question:</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="question_question" name="question[question]" value="<?php if ($this->question) { echo $this->escape($this->question['question']); } ?>" required>
                    <p class="help-block">How can we help you?</p>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="contact_firstName">First name:</label>
                <div class="controls">
                    <input type="text" class="input-medium" id="contact_firstName" name="contact[firstName]">
                    <p class="help-block">Will be displayed publicly</p>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="contact_lastName">Last name:</label>
                <div class="controls">
                    <input type="text" class="input-medium" id="contact_lastName" name="contact[lastName]">
                    <p class="help-block">Will be displayed publicly</p>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="contact_email">Email:</label>
                <div class="controls">
                    <input type="email" class="input-xlarge" id="contact_email" name="contact[email]">
                    <p class="help-block">We'll send answers to here. Keep it valid or leave it out!</p>
                </div>
            </div>
            <input class="btn btn-primary pull-right" type="submit" value="Ask">
        </fieldset>
    </form>
    <div class="offset2 span4">
        <h2>Any of these answers help?</h2>
        <ul class="">
            <li>Sample Text <span class="label label-success">Recommended</span></li>
            <li>Sample Text</li>
            <li>Sample Text</li>
            <li>Sample Text</li>
            <li>Sample Text</li>
            <li>Sample Text</li>
        </ul>
        <ul class="pager">
            <li class="next">
                <a href="#">More &rarr;</a>
            </li>
        </ul>
    </div>
</div>
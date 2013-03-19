<?php
/**
 * Questions on Campus Website.
 *
 * @category    Website
 * @package     Website_View
 * @author      Andrew Sorensen <andrew@localcoast.net>
 *
 * @version     $Id: question.php 29 2013-03-19 17:39:29Z andrew@localcoast.net $
 */
$this->layout()->setLayout('campus');

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
    <?php if ($this->isNew) { ?>
        <div class="alert alert-success">
            <h4>Thanks for contributing!</h4>
        </div>
    <?php } ?>
    <div class="span5">
        <div class="question clearfix">
            <blockquote>
                <p><?php echo $this->escape($this->question['question']); ?></p>
                <?php require_once 'Website/View/Helper/FormatTime.php'; ?>
                <small><?php echo $this->escape($this->question['contact']['fullName']); ?> <span class="label label-info"><?php echo $this->escape($this->formatTime($this->question['creationTime']->getTimestamp())); ?></span></small>
            </blockquote>
        </div>

        <hr />

        <div class="answers">
            <?php foreach ($this->question['answers'] as $answer) { ?>
                <div class="row-fluid posting">
                    <blockquote class="pull-right">
                        <p><?php echo $this->escape($answer['answer']); ?></p>
                        <small><?php echo $this->escape($answer['contact']['fullName']); ?> <span class="label label-info"><?php echo $this->escape($this->formatTime($answer['creationTime']->getTimestamp())); ?></span></small>
                    </blockquote>
                </div>
            <?php } ?>
        </div>
        <form class="form-horizontal" method="post">
            <fieldset>
                <legend>Got an answer? Help them out!</legend>
                <div class="control-group">
                    <label class="control-label" for="answer_answer">Answer:</label>
                    <div class="controls">
                        <input id="answer_answer"name="answer[answer]" type="text" class="input-xlarge" value="<?php if ($this->answer) { echo $this->escape($this->answer['answer']); } ?>" maxlength="160" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="contact_firstName">First name:</label>
                    <div class="controls">
                        <input id="contact_firstName" name="contact[firstName]" type="text" class="input-medium" value="<?php if ($this->answer) { echo $this->escape($this->answer['contact']['firstName']); } ?>">
                        <p class="help-block">Will be displayed publicly</p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="contact_lastName">Last name:</label>
                    <div class="controls">
                        <input id="contact_lastName" name="contact[lastName]" type="text" class="input-medium" <?php if ($this->answer) { echo $this->escape($this->answer['answer']['lastName']); } ?>>
                        <p class="help-block">Will be displayed publicly</p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="contact_email">Email:</label>
                    <div class="controls">
                        <input id="contact_email" name="contact[email]" type="email" class="input-xlarge">
                        <p class="help-block">We'll let you know if your answer was helpful</p>
                    </div>
                </div>
                <input class="btn btn-primary pull-right" type="submit" value="Answer">
            </fieldset>
        </form>
    </div>
    <div class="offset1 span5">
        <h2>Know someone who can help?</h2>
        <span class='st_sharethis' displayText='ShareThis'></span>
        <span class='st_facebook' displayText='Facebook'></span>
        <span class='st_twitter' displayText='Tweet'></span>
        <span class='st_email' displayText='Email'></span>
    </div>
</div>
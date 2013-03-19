<?php
/**
 * Questions on Campus Website.
 *
 * @category    Website
 * @package     Website_View
 * @author      Andrew Sorensen <andrew@localcoast.net>
 *
 * @version     $Id: campus.php 13 2012-08-17 05:15:53Z andrew@localcoast.net $
 */
?>

<?= $this->doctype('HTML5'); ?>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?php echo $this->render('_head.php'); ?>
    <body>
        <?php echo $this->render('_nav-homepage.php'); ?>
        <div class="container">
            <?php echo $this->layout()->content ?>
            <?php echo $this->render('_footer.php'); ?>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/static/js/jquery-1.8.0.min.js"><\/script>')</script>
        <script src="/static/js/bootstrap.min.js"></script>
        <script src="/static/js/global.js"></script>
    </body>
</html>
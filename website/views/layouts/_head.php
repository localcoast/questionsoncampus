<?php
/**
 * Questions on Campus Website.
 *
 * @category    Website
 * @package     Website_View
 * @author      Andrew Sorensen <andrew@localcoast.net>
 *
 * @version     $Id: _head.php 13 2012-08-17 05:15:53Z andrew@localcoast.net $
 */
?>

<head>
    <meta charset="utf-8">
    <?= $this->headTitle('Questions on Campus')->setSeparator(' | '); ?>

    <?= $this->headMeta(); ?>

    <?= $this->headScript(); ?>
    <script src="/static/js/modernizr-2.5.3.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/static/css/global.css" rel="stylesheet">
    <style>body {padding-top: 60px <?php if ($this->editmode) { echo '!important'; } ?>;}</style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="static/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="//w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "175e16da-eb72-4a26-ad05-45e76a064250"}); </script>
    <!-- Powered by LocalCoast Forge. Copyright 2009-<?=date('Y'); ?> LocalCoast Enterprises -->
</head>
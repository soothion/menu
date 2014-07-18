<!doctype html>
<?php $config = Config::model()->find(); ?>
<html lang="en" ng-app="myApp">

    <head>
        <title><?php echo $config->title; ?><?php if (isset($_REQUEST['alias'])) echo '-' . $_REQUEST['alias'] ?></title>

        <!-- meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1">
        <meta name="author" content="soothion">
        <meta name="description" content="<?php echo $config->des ?>">
        <meta name="keywords" content="<?php echo $config->keyword ?>">

        <!-- favicon -->
        <link rel="shortcut icon" href="assets/img/favicon.ico">
        <!-- we're minifying and combining all our css -->
        <link href="assets/css/style.css" rel="stylesheet">
        
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/stickUp.min.js"></script>
        
        <script src="assets/js/angular.min.js"></script>
        <script src="assets/js/i18n/angular-locale_zh-cn.js"></script>
        <script src="assets/js/shoppingCart.js"></script>
        <script src="assets/js/controllers.js"></script>
        

        <!-- some conditionals for ie -->
        <!--[if IE]><link href="assets/css/ie.css" rel="stylesheet" type="text/css" /><![endif]-->

        <!-- HTML5 elements in less than IE9, yes please! -->
        <!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

        <!-- If less than IE8 add some JS for the webfont icons -->
        <!--[if lt IE 8]><script src="assets/js/ie_font.js"></script><![endif]-->
    </head>

    <body id="index" class="page" ng-controller="MenuList">
        <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6 -->
        <!--[if lt IE 7]>
                <p>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p>
        <![endif]-->

        <!-- wrapper -->
        <div id="wrapper">

            <?php echo $content; ?>

            <!-- to the top -->
            <div id="top">
                <a href="#index" title="Back to the top">
                    <i class="icon-chevron-up"></i>
                </a>
            </div>
            <!-- /to the top -->

        </div>
        <!-- /wrapper -->

        <!-- copyright -->
        <section id="copyright" class="textcenter">
            <div class="boxed">
                <div class="animated slideInLeft"><?php echo $config->copyright; ?></div>
            </div>
        </section>
        <!-- /copyright -->

    </body>
</html>
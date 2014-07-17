<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php Yii::app()->bootstrap->register(); ?>
        <link rel="stylesheet" type="text/css" href="assets/css/admin/login.css" media="all" />
    </head>

    <body>
        <div id="login">
            <?php echo $content; ?>
        </div>
    </body>
</html>
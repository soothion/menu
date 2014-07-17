<!-- header -->
<header id="header" role="header">
    <div class="boxed">
        <!-- tagline -->
        <div id="tagline">
            <h1><?php echo $code; ?></h1>
        </div>
        <!-- /tagline -->

    </div>
</header>
<!-- /header -->   

<!-- nav -->
<nav id="primary">
    <div class="boxed">
        <div id="logo-head">
            <a href="<?php echo Yii::app()->createUrl('index');?>"><img src="assets/img/logo-foot.png" alt="火焰雨" /></a>
        </div>
        <?php $this->widget('NavWidget'); ?>
    </div>
</nav>
<!-- /nav -->

<!-- content -->
<div id="content">

    <!-- docs -->
    <section id="documentation">
        <article class="boxed">
            <p style="height:500px;line-height:500px;text-align: center;">
                <a href="<?php echo Yii::app()->createUrl('index');?>"><img src="assets/img/error.png"/></a>
            </p>
        </article>
    </section>
    <!-- /docs -->
</div>
<!-- /content -->
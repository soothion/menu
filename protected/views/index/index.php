<!-- header -->
<header id="header" role="header">
    <div class="boxed">
        <!-- tagline -->
        <div id="tagline">
            <h1>饭否</h1>
        </div>
        <!-- /tagline -->

    </div>
</header>
<!-- /header -->   

<!-- nav -->
<nav id="primary">
    <div class="boxed">
        <div id="logo-head">
            <a href="<?php echo Yii::app()->createUrl('index');?>"><img src="assets/img/logo-head.png" alt="Laravel" /></a>
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

                <!-- docs content -->
                <div id="docs-content">
                    <ul class="menu">
                        <li ng-repeat="phone in phones | filter:query | orderBy:orderProp">
                          {{phone.name}}
                          <p>{{phone.snippet}}</p>
                        </li>
                    </ul>
                </div>
               
            <!-- /docs content -->

        </article>
    </section>
    <!-- /docs -->
</div>
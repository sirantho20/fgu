<?php

use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en-us">
    <head>

        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>

    </head>
    <body id="login" class="animated fadeInDown">
<?php $this->beginBody() ?>
        <!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->
        <header id="header">
                <!--<span id="logo"></span>-->



        </header>

        <div id="main" role="main">

            <!-- MAIN CONTENT -->
            <div id="content" class="container">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-lg-offset-4">
                        <div class="well no-padding">
                            
                            <?= $content ?>

                        </div>


                    </div>
                </div>
            </div>

        </div>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

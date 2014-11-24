<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\helpers\BaseHtml;

/**
 * @var \yii\web\View $this
 * @var string $content
 */

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?= BaseHtml::csrfMetaTags();  ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        
        <!-- HEADER -->
<header id="header">
        <div id="logo-group">

                <!-- PLACE YOUR LOGO HERE -->
                <span id="logo"> <img src="/images/htg-logo.png" alt="HTG"> </span>
                <!-- END LOGO PLACEHOLDER -->
        </div>
    
        <!-- pulled right: nav area -->
        <div class="pull-right">
            <div style="float: left; margin-top: 15px; margin-right: 10px;" class="btn-header">
                <?= Html::a(' <i class="fa fa-power-off"> logout </i>', yii\helpers\Url::to(['site/logout']),['title'=>'Log Out']) ?>
            </div>    
                <!-- collapse menu button -->
                <div id="hide-menu" class="btn-header pull-right">
                        <span> <a href="javascript:void(0);" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
                </div>
                <!-- end collapse menu -->

                

        </div>
        <!-- end pulled right: nav area -->

</header>
<!-- END HEADER -->

<?php include('adminNav.php'); ?>

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> <span id="refresh" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true"><i class="fa fa-refresh"></i></span> </span>

				<!-- breadcrumb -->
				        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->
                        

			<div id="content">
                            <?= $content ?>

			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->
    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

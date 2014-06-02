<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

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
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        
        <!-- HEADER -->
<header id="header">
        <div id="logo-group">

                <!-- PLACE YOUR LOGO HERE -->
                <span id="logo"> <img src="/smartadmin/img/logo.png" alt="SmartAdmin"> </span>
                <!-- END LOGO PLACEHOLDER -->

                <!-- Note: The activity badge color changes when clicked and resets the number to 0
                Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
                <span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 21 </b> </span>

                <!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
                <div class="ajax-dropdown">

                        <!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
                        <div class="btn-group btn-group-justified" data-toggle="buttons">
                                <label class="btn btn-default">
                                        <input type="radio" name="activity" id="ajax/notify/mail.html">
                                        Msgs (14) </label>
                                <label class="btn btn-default">
                                        <input type="radio" name="activity" id="ajax/notify/notifications.html">
                                        notify (3) </label>
                                <label class="btn btn-default">
                                        <input type="radio" name="activity" id="ajax/notify/tasks.html">
                                        Tasks (4) </label>
                        </div>

                        <!-- notification content -->
                        <div class="ajax-notifications custom-scroll">

                                <div class="alert alert-transparent">
                                        <h4>Click a button to show messages here</h4>
                                        This blank page message helps protect your privacy, or you can show the first message here automatically.
                                </div>

                                <i class="fa fa-lock fa-4x fa-border"></i>

                        </div>
                        <!-- end notification content -->

                        <!-- footer: refresh area -->
                        <span> Last updated on: 12/12/2013 9:43AM
                                <button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
                                        <i class="fa fa-refresh"></i>
                                </button> </span>
                        <!-- end footer -->

                </div>
                <!-- END AJAX-DROPDOWN -->
        </div>

        <!-- projects dropdown -->
        <div id="project-context">

                <span class="label">Projects:</span>
                <span id="project-selector" class="popover-trigger-element dropdown-toggle" data-toggle="dropdown">Recent projects <i class="fa fa-angle-down"></i></span>

                <!-- Suggestion: populate this list with fetch and push technique -->
                <ul class="dropdown-menu">
                        <li>
                                <a href="javascript:void(0);">Online e-merchant management system - attaching integration with the iOS</a>
                        </li>
                        <li>
                                <a href="javascript:void(0);">Notes on pipeline upgradee</a>
                        </li>
                        <li>
                                <a href="javascript:void(0);">Assesment Report for merchant account</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                                <a href="javascript:void(0);"><i class="fa fa-power-off"></i> Clear</a>
                        </li>
                </ul>
                <!-- end dropdown-menu-->

        </div>
        <!-- end projects dropdown -->

        <!-- pulled right: nav area -->
        <div class="pull-right">

                <!-- collapse menu button -->
                <div id="hide-menu" class="btn-header pull-right">
                        <span> <a href="javascript:void(0);" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
                </div>
                <!-- end collapse menu -->

                <!-- logout button -->
                <div id="logout" class="btn-header transparent pull-right">
                        <span> <a href="login.html" title="Sign Out"><i class="fa fa-sign-out"></i></a> </span>
                </div>
                <!-- end logout button -->

                <!-- search mobile button (this is hidden till mobile view port) -->
                <div id="search-mobile" class="btn-header transparent pull-right">
                        <span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
                </div>
                <!-- end search mobile button -->

                <!-- input: search field -->
                <form action="#search.html" class="header-search pull-right">
                        <input type="text" placeholder="Find reports and more" id="search-fld">
                        <button type="submit">
                                <i class="fa fa-search"></i>
                        </button>
                        <a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
                </form>
                <!-- end input: search field -->

                <!-- multiple lang dropdown : find all flags in the image folder -->
                <ul class="header-dropdown-list hidden-xs">
                        <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img alt="" src="/smartadmin/img/flags/us.png"> <span> US </span> <i class="fa fa-angle-down"></i> </a>
                                <ul class="dropdown-menu pull-right">
                                        <li class="active">
                                                <a href="javascript:void(0);"><img alt="" src="/smartadmin/img/flags/us.png"> US</a>
                                        </li>
                                        <li>
                                                <a href="javascript:void(0);"><img alt="" src="/smartadmin/img/flags/es.png"> Spanish</a>
                                        </li>
                                        <li>
                                                <a href="javascript:void(0);"><img alt="" src="/smartadmin/img/flags/de.png"> German</a>
                                        </li>
                                </ul>
                        </li>
                </ul>
                <!-- end multiple lang -->

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

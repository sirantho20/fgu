<?php
/**
 * @var yii\web\View $this
 */
$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>

<!--
<div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark"><i class="fa fa-bar-chart-o fa-fw "></i> Dashboard <span>>
                        FGU Overview </span></h1>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                 <ul id="sparks" class="">
                        <li class="sparks-info">
                                <h5> My Income <span class="txt-color-blue">$47,171</span></h5>
                                <div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
                                        1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
                                </div>
                        </li>
                        <li class="sparks-info">
                                <h5> Site Traffic <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;45%</span></h5>
                                <div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
                                        110,150,300,130,400,240,220,310,220,300, 270, 210
                                </div>
                        </li>
                        <li class="sparks-info">
                                <h5> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
                                <div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
                                        110,150,300,130,400,240,220,310,220,300, 270, 210
                                </div>
                        </li>
                </ul>
        </div>
</div> -->
<!-- widget grid -->
<section id="widget-grid" class="">
                                    
<!-- row -->
<div class="row">

<!-- NEW WIDGET START -->
<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
  
            <header>
                    <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                    <h2>Fuel Stock </h2>

            </header>

            <!-- widget div-->
            <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                            <input type="text">
                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body no-padding">

                            <div id="fgu-fuel-on-site" class="no-padding"></div>

                    </div>
                    <!-- end widget content -->

            </div>
            <!-- end widget div -->

    </div>
    <!-- end widget -->

</article>
<!-- WIDGET END -->

</div>

<!-- end row -->
                                        
                                        
<!-- row -->
<div class="row">

<!-- NEW WIDGET START -->
<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
            
            <header>
                    <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                    <h2>Weekly Fuel Delivery </h2>

            </header>

            <!-- widget div-->
            <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                            <input type="text">
                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body no-padding">

                            <div id="test-delivery" class=" no-padding"></div>

                    </div>
                    <!-- end widget content -->

            </div>
            <!-- end widget div -->

    </div>
    <!-- end widget -->

</article>
<!-- WIDGET END -->

</div>

<!-- end row -->


<!-- row -->
<div class="row">

<!-- NEW WIDGET START -->
<article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
            
            <header>
                    <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                    <h2>Fuel Theft Trended </h2>

            </header>

            <!-- widget div-->
            <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                            <input type="text">
                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body no-padding">

                            <div id="theft-trend" class=" no-padding"></div>

                    </div>
                    <!-- end widget content -->

            </div>
            <!-- end widget div -->

    </div>
    <!-- end widget -->

</article>
<!-- WIDGET END -->

<!-- NEW WIDGET START -->
<article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
            
            <header>
                    <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                    <h2>Fuel Consumption Trended </h2>

            </header>

            <!-- widget div-->
            <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                            <input type="text">
                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body no-padding">

                            <div id="consumption-trend" class=" no-padding"></div>

                    </div>
                    <!-- end widget content -->

            </div>
            <!-- end widget div -->

    </div>
    <!-- end widget -->

</article>
<!-- WIDGET END -->

</div>

<!-- end row -->

</section>
<?php
Yii::$app->controller->view->registerJs('<script type="text/javascript">

var siteRoot = '.Yii::$app->urlManager->baseUrl.'; console.log(siteRoot);
<script>');

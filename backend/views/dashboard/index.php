<?php
/**
 * @var yii\web\View $this
 */
$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>



<!-- widget grid -->
<section id="widget-grid" class="">

<!-- row -->
<div class="row">
<article class="col-sm-12">
<!-- new widget -->
<div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
<!-- widget options:
usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

data-widget-colorbutton="false"
data-widget-editbutton="false"
data-widget-togglebutton="false"
data-widget-deletebutton="false"
data-widget-fullscreenbutton="false"
data-widget-custombutton="false"
data-widget-collapsed="true"
data-widget-sortable="false"

-->
<header>
<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
<h2>FGU Overview </h2>

<ul class="nav nav-tabs pull-right in" id="myTab">
    <li class="active">
            <a data-toggle="tab" href="#s1"><i class="fa fa-clock-o"></i> <span class="hidden-mobile hidden-tablet">Fuel On Site</span></a>
    </li>

    <li>
            <a data-toggle="tab" href="#s2"><i class="fa fa-dollar"></i> <span class="hidden-mobile hidden-tablet">Avg Consumption</span></a>
    </li>

    <li>
            <a data-toggle="tab" href="#s3"><i class="fa fa-dollar"></i> <span class="hidden-mobile hidden-tablet">Power Consumption</span></a>
    </li>
</ul>

</header>

<!-- widget div-->
<div class="no-padding">
<!-- widget edit box -->
<div class="jarviswidget-editbox">

    test
</div>
<!-- end widget edit box -->

<div class="widget-body">
    <!-- content -->
    <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in padding-10 no-padding-bottom" id="s1">
                    <div class="row no-space">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <span class="demo-liveupdate-1">

                                </span>
                                    <div id="updating-chart" class="chart-large txt-color-blue"></div>

                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 show-stats">

                                    <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> My Tasks <span class="pull-right">130/200</span> </span>
                                                    <div class="progress">
                                                            <div class="progress-bar bg-color-blueDark" style="width: 65%;"></div>
                                                    </div> </div>
                                            <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> Transfered <span class="pull-right">440 GB</span> </span>
                                                    <div class="progress">
                                                            <div class="progress-bar bg-color-blue" style="width: 34%;"></div>
                                                    </div> </div>
                                            <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> Bugs Squashed<span class="pull-right">77%</span> </span>
                                                    <div class="progress">
                                                            <div class="progress-bar bg-color-blue" style="width: 77%;"></div>
                                                    </div> </div>
                                            <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> User Testing <span class="pull-right">7 Days</span> </span>
                                                    <div class="progress">
                                                            <div class="progress-bar bg-color-greenLight" style="width: 84%;"></div>
                                                    </div> </div>

                                            

                                    </div>

                            </div>
                    </div>

            </div>
            <!-- end s1 tab pane -->

            <div class="tab-pane fade" id="s2">
                    <div class="widget-body-toolbar bg-color-white">

                            <form class="form-inline" role="form">

                                    <div class="form-group">
                                            <label class="sr-only" for="s123">Show From</label>
                                            <input type="email" class="form-control input-sm" id="s123" placeholder="Show From">
                                    </div>
                                    <div class="form-group">
                                            <input type="email" class="form-control input-sm" id="s124" placeholder="To">
                                    </div>

                                    <div class="btn-group hidden-phone pull-right">
                                            <a class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown"><i class="fa fa-cog"></i> More <span class="caret"> </span> </a>
                                            <ul class="dropdown-menu pull-right">
                                                    <li>
                                                            <a href="javascript:void(0);"><i class="fa fa-file-text-alt"></i> Export to PDF</a>
                                                    </li>
                                                    <li>
                                                            <a href="javascript:void(0);"><i class="fa fa-question-sign"></i> Help</a>
                                                    </li>
                                            </ul>
                                    </div>

                            </form>

                    </div>
                    <div class="padding-10">
                            <div id="statsChart" class="chart-large has-legend-unique"></div>
                    </div>

            </div>
            <!-- end s2 tab pane -->

            <div class="tab-pane fade" id="s3">

                    <div class="widget-body-toolbar bg-color-white smart-form" id="rev-toggles">

                            <div class="inline-group">

                                    <label for="gra-0" class="checkbox">
                                            <input type="checkbox" name="gra-0" id="gra-0" checked="checked">
                                            <i></i> Target </label>
                                    <label for="gra-1" class="checkbox">
                                            <input type="checkbox" name="gra-1" id="gra-1" checked="checked">
                                            <i></i> Actual </label>
                                    <label for="gra-2" class="checkbox">
                                            <input type="checkbox" name="gra-2" id="gra-2" checked="checked">
                                            <i></i> Signups </label>
                            </div>

                            <div class="btn-group hidden-phone pull-right">
                                    <a class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown"><i class="fa fa-cog"></i> More <span class="caret"> </span> </a>
                                    <ul class="dropdown-menu pull-right">
                                            <li>
                                                    <a href="javascript:void(0);"><i class="fa fa-file-text-alt"></i> Export to PDF</a>
                                            </li>
                                            <li>
                                                    <a href="javascript:void(0);"><i class="fa fa-question-sign"></i> Help</a>
                                            </li>
                                    </ul>
                            </div>

                    </div>

                    <div class="padding-10">
                            <div id="flotcontainer" class="chart-large has-legend-unique"></div>
                    </div>
            </div>
            <!-- end s3 tab pane -->
    </div>

    <!-- end content -->
</div>

</div>
<!-- end widget div -->
</div>
<!-- end widget -->

</article>
</div>

<!-- end row -->

</section>
<!-- end widget grid -->

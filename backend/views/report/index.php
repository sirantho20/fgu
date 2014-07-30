<?php
use bburim\daterangepicker\DateRangePicker;


$ranges = new \yii\web\JsExpression("{
                        'Today'        : [Date.today(), Date.today()],
                        'Yesterday'    : [Date.today().add({ days: -1 }), Date.today().add({ days: -1 })],
                        'Last 7 Days'  : [Date.today().add({ days: -6 }), Date.today()],
                        'Last 30 Days' : [Date.today().add({ days: -29 }), Date.today()],
                        'This Month'   : [Date.today().moveToFirstDayOfMonth(), Date.today().moveToLastDayOfMonth()],
                        'This Year'    : [Date.today().moveToMonth(0,-1).moveToFirstDayOfMonth(), Date.today()],
                        'Last Month'   : [Date.today().moveToFirstDayOfMonth().add({ months: -1 }), Date.today().moveToFirstDayOfMonth().add({ days: -1 })]
                    }");

$callback = new \yii\web\JsExpression("function(){}");
?>
<div class="row">

<!-- NEW COL START -->
<article class="col-sm-12 col-md-8 col-lg-8" style="margin-bottom: 15px;">

<!-- Widget ID (each widget will need unique ID)-->
<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
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
       <header><span class="widget-icon"> <i class="fa fa-edit"></i> </span><h2>FGU Report Export</h2></header>
        <!-- widget div-->
        <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">

                   
                </div>
        </div>
</div>
</article>
</div>
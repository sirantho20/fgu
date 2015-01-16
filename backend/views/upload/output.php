<?php
use yii\widgets\ActiveForm;
?>
<?php
$total = 0;
$uploaded = 0;
$rejected = 0;
foreach($output as $check)
{
    $total++;
    if(empty($check['error']))
    {
        $uploaded++;
    }
    else
    {
        $rejected++;
    }
}

?>
<div class="row">

    <!-- NEW COL START -->
    <article class="col-sm-12 col-md-10 col-lg-10" style="margin-bottom: 15px;">

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
            <header><span class="widget-icon"> <i class="fa fa-upload"></i> </span><h2>Mass Upload Status</h2><div class="pull-right" style="margin-right: 5px;"><?= $rejected ?> out of <?= $total ?> uploaded records have errors</div></header>
            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">
                <table class="table table-striped table-hover table-bordered smart-form">
                    <tr>
                        <th>Site ID</th>
                        <th>Access Code</th>
                        <th>Reading Date</th>
                        <th>Run Hrs</th>
                        <th>KWH Reading</th>
                        <th>Fuel Reading</th>
                        <th>Status</th>
                        <th>Comments</th>
                    </tr>

                    <tr>
                        <?php foreach($output as $record): $rejected++; ?>

                            <td><?= $record['site_id']; ?></td>
                            <td><?= $record['access_code']; ?></td>
                            <td><?= $record['reading_date']; ?></td>
                            <td><?= $record['run_hours']; ?></td>
                            <td><?= $record['kwh_reading']; ?></td>
                            <td><?= $record['fuel_level_cm']; ?></td>
                            <td><?= empty($record['error'])? '<i style="color:green; font-size: 18px;" class="fa icon-fa-check-square-o">Ok</i>':'<i style="color:red; font-size: 18px;" class="fa fa-times-circle"></i>' ?></td>

                            <td>
                                <?php
                                $out = '<ul>';
                                    foreach($record['error'] as $arr)
                                    {
                                        $out .= '<li>'.$arr[0].'</li>';
                                    }
                                    $out .='</ul>';
                                    echo $out;

                                ?></td>



                    </tr>
                    <?php endforeach; ?>
                </table>

                </div>
            </div>
        </div>
    </article>
</div>
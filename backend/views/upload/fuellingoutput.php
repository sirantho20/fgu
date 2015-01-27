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
            <header><span class="widget-icon"> <i class="fa fa-upload"></i> </span><h2>Mass Upload Status</h2><div class="pull-right" style="margin-right: 5px;"><?php if($rejected > 0): ?><?= $rejected ?> out of <?= $total ?> uploaded records have errors | <a class="" id="output-download-button" href="#" role="">Download</a><?php else: ?>All records uploaded successfully.<?php endif; ?></div></header>
            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">
                <table id="upload-output-table" class="table table-striped table-hover table-bordered smart-form">
                    <tr>
                        <th>Site ID</th>
                        <th>Access Code</th>
                        <th>Delivery Date</th>
                        <th>Qty Before</th>
                        <th>Qty After</th>
                        <th>Fuelling Type</th>
                        <th>Comments</th>
                    </tr>

                        <?php foreach($output as $record): $rejected++; ?>
                            <?php if(!empty($record['error'])): ?>
                        <tr>
                            <td><?= $record['site_id']; ?></td>
                            <td><?= $record['access_code']; ?></td>
                            <td><?= $record['delivery_date']; ?></td>
                            <td><?= $record['quantity_before_in_cm']; ?></td>
                            <td><?= $record['quantity_after_in_cm']; ?></td>
                            <td><?= $record['fuelling_type']; ?></td>
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
                    <?php endif; ?>
                    <?php endforeach; ?>
                </table>

                </div>
            </div>
        </div>
    </article>
</div>
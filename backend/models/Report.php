<?php


/**
 * FGU report extraction
 *
 * @author aafetsrom
 */
namespace backend\models;
use yii\base\Model;

class Report extends Model {
    //put your code here

    public $startDate;
    public $endDate;
    public $reportDates;
    public $type;

    public function rules() {

        return [
            [['startDate','endDate','type'],'required'],

        ];
    }

    public function beforeValidate() {
        $arr = explode('to', $_POST['Report']['reportDates']);

        $this->startDate = trim($arr[0]);
        $this->endDate = trim($arr[1]);

        return parent::beforeValidate();
    }

    public function getQuery()
    {
        $qr = '';
        switch ($this->type)
        {
            case 'fgu':

                if(\Yii::$app->user->identity->company =='HTG')
                {
                    $qr = $query = \Yii::$app->db->createCommand('select site_id,
                reading_date,
                fuel_level_cm,
                genset_run_hours,
                entry_date,
                entry_by,
                days_from_last_reading,
                access_code,
                meter_reading,
                fuel_delivered,
                fuel_consumed,
                fuel_consumption_per_hr_lts,
                last_fuel_level,
                fuel_quantity_lts,
                power_consumed,
                power_consumed_per_hr_kwh,
                grid_hours,
                mc,
                kva,
                cph,
                fuel_theft,
                genset_run_hours_for_period,
                field_supervisor,
                x3_site_id,
                grid_power_percent_availability,
                genset_power_percent_availability
                from fgu_step_3 where reading_date between :date1 and :date2',[':date1'=>$this->startDate, ':date2'=>$this->endDate])->queryAll();
                }
                else
                {
                    $qr = $query = \Yii::$app->db->createCommand('select site_id,
                    reading_date,
                    fuel_level_cm,
                    genset_run_hours,
                    entry_date,
                    entry_by,
                    days_from_last_reading,
                    access_code,
                    meter_reading,
                    fuel_delivered,
                    fuel_consumed,
                    fuel_consumption_per_hr_lts,
                    last_fuel_level,
                    fuel_quantity_lts,
                    power_consumed,
                    power_consumed_per_hr_kwh,
                    grid_hours,
                    kva,
                    cph,
                    fuel_theft,
                    genset_run_hours_for_period,
                    field_supervisor,
                    x3_site_id,
                    grid_power_percent_availability,
                    genset_power_percent_availability
                    from fgu_step_3 where mc = :mc and reading_date between :date1 and :date2',[':date1'=>$this->startDate, ':date2'=>$this->endDate,':mc' => \Yii::$app->user->identity->company])->queryAll();
                }
                break;
            case 'fuelling':
                if(\Yii::$app->user->identity->company =='HTG')
                {
                    $qr = $query = \Yii::$app->db->createCommand('select * from fgu_fuelling where delivery_date between :date1 and :date2',[':date1' => $this->startDate, ':date2' => $this->endDate])->queryAll();
                }
                else
                {
                    $qr = $query = \Yii::$app->db->createCommand('select * from fgu_fuelling where mc = :mc and delivery_date between :date1 and :date2',[':date1' => $this->startDate, ':date2' => $this->endDate,':mc' =>\Yii::$app->user->identity->company])->queryAll();
                }
                break;
            case 'prepaid':
                if(\Yii::$app->user->identity->company =='HTG')
                {
                    $qr = $query = \Yii::$app->db->createCommand('select * from prepaid_reload where reload_date between :date1 and date2',[':date1' => $this->startDate, ':date2' => $this->endDate])->queryAll();
                }
                else
                {
                    $qr = $query = \Yii::$app->db->createCommand('select * from prepaid_reload where mc = :mc and reload_date between :date1 and date2',[':mc'=>\Yii::$app->user->identity->company,':date1' => $this->startDate, ':date2' => $this->endDate])->queryAll();
                }
                break;
            default:

        }
        return $qr;
    }


}
<?php


/**
 * FGU report extraction
 *
 * @author aafetsrom
 */
namespace backend\models;
use yii\base\Model;
use Yii;

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
        $arr = explode('to', $this->reportDates);
        
        $this->startDate = trim($arr[0]);
        $this->endDate = trim($arr[1]);
        
        return parent::beforeValidate();
    }
    
    public function fguReport()
    {
        $query = \Yii::$app->db->createCommand('select site_id,fuel_consumed,last_fuel_level,fuel_quantity_lts,power_consumed from fgu_step_3 where reading_date between :date1 and :date2',[':date1'=>$this->startDate, ':date2'=>$this->endDate])->queryAll();
        $this->setHeaders('thereportname');
        $fp = fopen('out.csv', 'w');
        fputcsv($fp, array_keys($query[0]));
            foreach ($query as $row)
            {
                fputcsv($fp, array_values($row));
            }
            fclose($fp);
    }
    
    private function setHeaders($filename)
    {
//            header("Content-type: text/x-csv");
//            header("Content-type: text/csv");
//            header("Content-type: application/csv");
            header( 'Content-Disposition: attachment;filename='.$filename.'.csv');
            
    }
}

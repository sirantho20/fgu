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
                $qr = $query = \Yii::$app->db->createCommand('select site_id,fuel_consumed,last_fuel_level,fuel_quantity_lts,power_consumed from fgu_step_3 where reading_date between :date1 and :date2',[':date1'=>$this->startDate, ':date2'=>$this->endDate])->queryAll();
                }
                else
                {
                    $qr = $query = \Yii::$app->db->createCommand('select site_id,fuel_consumed,last_fuel_level,fuel_quantity_lts,power_consumed from fgu_step_3 where mc = :mc and reading_date between :date1 and :date2',[':date1'=>$this->startDate, ':date2'=>$this->endDate,':mc' => \Yii::$app->user->identity->company])->queryAll();
                }
                break;
            case 'fuelling':
               if(\Yii::$app->user->identity->company =='HTG')
               {
               $qr = $query = \Yii::$app->db->createCommand('select * from fgu_fuelling')->queryAll(); 
               }
               else 
               {
                   $qr = $query = \Yii::$app->db->createCommand('select * from fgu_fuelling where mc = :mc',[':mc' =>\Yii::$app->user->identity->company])->queryAll(); 
               }
               break;
            case 'prepaid':
                if(\Yii::$app->user->identity->company =='HTG')
                {
                    $qr = $query = \Yii::$app->db->createCommand('select * from prepaid_reload')->queryAll();
                }
                else 
                {
                    $qr = $query = \Yii::$app->db->createCommand('select * from prepaid_reload where mc = :mc ',[':mc'=>\Yii::$app->user->identity->company])->queryAll();
                }
                break;
            default:
                
        }
        return $qr;
    }
    

}

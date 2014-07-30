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
    public $mc;
    
    public function rules() {
        
        return [
            []
        ];
    }
    
}

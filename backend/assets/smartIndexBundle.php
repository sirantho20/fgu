<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of smartIndex
 *
 * @author tony
 */
namespace backend\assets;
use backend\assets\smartadminBundle;

class smartIndexBundle extends smartadminBundle {
    
    
    //public $sourcePath = '@yii/assets/';
    public $baseUrl = '@web/smartadmin';
    public $js = ['js/plugin/flot/jquery.flot.cust.js',
                  'js/plugin/flot/jquery.flot.resize.js',
                  'js/plugin/flot/jquery.flot.tooltip.js',
                  'js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js',
                  'js/plugin/vectormap/jquery-jvectormap-world-mill-en.js',
                  'js/plugin/fullcalendar/jquery.fullcalendar.min.js',
                  'js/plugin/jquery-validate/jquery.validate.min.js',
                  'js/login.js',
        ];
     public $depends = [ 'backend\assets\smartadminBundle'];
}

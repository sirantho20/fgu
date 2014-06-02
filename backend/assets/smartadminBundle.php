<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of smartadminBundle
 *
 * @author tony
 */

namespace backend\assets;
use yii\web\AssetBundle;

class smartadminBundle extends AssetBundle {
    
     public $basePath = '@webroot';
    public $baseUrl = '@web/smartadmin';
    public $css = ['css/font-awesome.min.css','css/smartadmin-production.css','css/smartadmin-skins.css'];
    public $js = ['js/notification/SmartNotification.min.js',
                    'js/libs/jquery-ui-1.10.3.min.js',
                    'js/smartwidgets/jarvis.widget.min.js',
                    'js/plugin/sparkline/jquery.sparkline.min.js',
                    'js/plugin/msie-fix/jquery.mb.browser.min.js',
                    'js/plugin/fastclick/fastclick.js',
                    'js/app.js',
                    
                ];
    public $depends = [ 'backend\assets\AppAsset'];
}

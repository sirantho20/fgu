<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of smartDashboardBundle
 *
 * @author aafetsrom
 */
namespace backend\assets;
use backend\assets\smartadminBundle;
class smartDashboardBundle extends smartadminBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web/smartadmin';
    public $js = [
        'js/dashboard.js',
        'js/plugin/morris/morris.min.js',
        'js/plugin/morris/morris-chart-settings.js',
        'js/plugin/morris/raphael.2.1.0.min.js',
    ];
    public $depends = [ 'backend\assets\smartadminBundle'];
}

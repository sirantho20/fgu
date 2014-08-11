<?php $this->beginContent('@app/views/layouts/adminBase.php'); ?>
<?php \backend\assets\smartDashboardBundle::register($this); ?>
        
                <?= $content ?>

<?php $this->endContent();
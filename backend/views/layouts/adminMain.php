<?php $this->beginContent('@app/views/layouts/adminBase.php'); ?>
<?php \backend\assets\smartIndexBundle::register($this); ?>
        
                <?= $content ?>

<?php $this->endContent();
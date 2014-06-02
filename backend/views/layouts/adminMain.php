<?php $this->beginContent('@app/views/layouts/adminBase.php'); ?>
<?php \backend\assets\smartadminBundle::register($this); ?>
        
                <?= $content ?>

<?php $this->endContent();
<?php $this->beginContent('@app/views/layouts/adminBase.php'); ?>
<?php \backend\assets\smartIndexBundle::register($this); ?>
<div id="notification-area"></div>

<?php if(Yii::$app->session->hasFlash('error')): ?>
       <?php $this->registerJs('$("#notification-area").notify("'.Yii::$app->session->getFlash('error').'",{elementPosition:"bottom right",className:"error"});'); ?> 
        <?php endif; ?>

<?php if(Yii::$app->session->hasFlash('success')): ?>
        <?php $this->registerJs('$("#notification-area").notify("'.Yii::$app->session->getFlash('success').'",{elementPosition:"bottom right",className:"success"});'); ?> 
        <?php endif; ?>

                <?= $content ?>

<?php $this->endContent();
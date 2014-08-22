<?php $this->beginContent('@app/views/layouts/adminBase.php'); ?>
<?php \backend\assets\smartIndexBundle::register($this); ?>
<div id="notification-area">
    <i style="font-size: 25px; color: green; float: right;" class="fa fa-spinner fa-spin hidden activitySpinner"></i>
    <?php
    $user = \common\models\User::findOne(['username' => Yii::$app->user->identity->username]);
    if($user->validatePassword('P@ssw0rd')):
    ?>
    
    <p class="bg-danger"><i class="badge-warning">Warning!</i> You are required to change your default password. <?= yii\helpers\Html::a('Click here to change!', \yii\helpers\Url::toRoute('site/resetpassword')) ?></p>
    
    <?php    endif; ?>
</div>

<?php if(Yii::$app->session->hasFlash('error')): ?>
       <?php $this->registerJs('$("#notification-area").notify("'.Yii::$app->session->getFlash('error').'",{elementPosition:"bottom right",className:"error"});'); ?> 
        <?php endif; ?>

<?php if(Yii::$app->session->hasFlash('success')): ?>
        <?php $this->registerJs('$("#notification-area").notify("'.Yii::$app->session->getFlash('success').'",{elementPosition:"bottom right",className:"success"});'); ?> 
        <?php endif; ?>

<?php if(Yii::$app->session->hasFlash('info')): ?>
        <?php $this->registerJs('$("#notification-area").notify("'.Yii::$app->session->getFlash('info').'",{elementPosition:"bottom right",className:"info"});'); ?> 
        <?php endif; ?>

                <?= $content ?>

<?php $this->endContent();
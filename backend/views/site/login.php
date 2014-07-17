<?php
use yii\helpers\Html;
use yii\helpers\BaseHtml;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var \common\models\LoginForm $model
 */
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
\backend\assets\smartIndexBundle::register($this);
Yii::$app->controller->layout = '/login';
?>

            <?php $form = ActiveForm::begin(['id' => 'login-form','options' => ['class' => 'smart-form client-form']]); ?>
                                            <header>
                                    Log In
                                </header>
            <fieldset>
                <section>
                <label class="label">Username</label>
                <label class="input"> <i class="icon-append fa fa-user"></i>
                <?= BaseHtml::activeTextInput($model, 'username'); ?>
                <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter your username</b></label>
                </section>
                <section>
                <label class="label">Password</label>
                <label class="input"> <i class="icon-append fa fa-lock"></i>
                <?= BaseHtml::activePasswordInput($model, 'password'); ?>
                <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>

                </section>
            </fieldset>
                <footer>
                    <?= Html::submitButton('Login', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                </footer>
            <?php ActiveForm::end(); ?>


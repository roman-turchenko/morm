<?php
/* @var $this yii\web\View */
?>
<!--<div class="container">
    <form action="/admin/?controller=auth" class="form-signin" role="form" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input name="login" type="login" class="form-control" placeholder="Login" required="" autofocus="" value="">
        <input name="password" type="password" class="form-control" placeholder="Password" required=""><br />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div>-->

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin([
    'options' => [
        'class' => 'form-signin'
    ]
]); ?>

<?= $form->field($model, 'username')->textInput()->label('Login') ?>
<?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-block btn-lg']) ?>
    </div>

<?php ActiveForm::end(); ?>

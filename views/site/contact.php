<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Contacto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact container py-5">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')) : ?>

        <div class="alert alert-success">

            Gracias por contactarnos. Nosotros responderemos a la mayor brevedad posible.
        </div>

        

    <?php else : ?>

      

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->label('Nombre')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email')->label('Correo electrónico') ?>

                <?= $form->field($model, 'subject')->label('Sujeto') ?>

                <?= $form->field($model, 'body')->label('Mensaje')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->label('Completa el captcha')->widget(Captcha::class, [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Enviar', ['class' => 'boton-secondary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
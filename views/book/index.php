<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var $model app\models\Book */
/** @var $books app\models\Book[] */
?>

<h1>Biblioteca</h1>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger">
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>

<div class="book-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'published_at')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<hr>

<h2>Lista de todos los Libros</h2>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Fecha de Publicación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?= Html::encode($book->id) ?></td>
                <td><?= Html::encode($book->title) ?></td>
                <td><?= Html::encode($book->author) ?></td>
                <td><?= Html::encode($book->published_at) ?></td>
                <td>
                    <?= Html::a('Editar', ['book/edit', 'id' => $book->id], ['class' => 'btn btn-primary btn-sm']) ?>
                    <?= Html::a('Eliminar', ['book/delete', 'id' => $book->id], [
                        'class' => 'btn btn-danger btn-sm',
                        'data' => [
                            'confirm' => '¿Seguro que deseas eliminar este libro?',
                            'method' => 'post',
                        ]
                    ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

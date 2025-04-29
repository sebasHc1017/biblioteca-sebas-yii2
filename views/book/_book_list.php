<?php
use yii\helpers\Html;

/** @var $books app\models\Book[] */
?>

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
                    <button class="btn btn-primary btn-sm btn-edit" data-id="<?= $book->id ?>">Editar</button>
                    <button class="btn btn-danger btn-sm btn-delete" data-id="<?= $book->id ?>">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

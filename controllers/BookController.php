<?php
namespace app\controllers;

use Yii;
use app\models\Book;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class BookController extends Controller{

    // listar y crear libros
    public function actionIndex(){
        
        $model = new Book();
        $books = Book::find()->all();  //todos los libros 

        // Si el formulario es enviado (crea o edita el libro)
        if ($model->load(Yii::$app->request->post())) {

            // Verificar si es un nuevo libro o si estamos editando uno existente
            if ($model->isNewRecord) {

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Libro guardado con éxito');
                } else {
                    Yii::$app->session->setFlash('error', 'Error al guardar el libro');
                }
            } else {
                // Si ya tiene un ID se edita 
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Libro actualizado con éxito');
                } else {
                    Yii::$app->session->setFlash('error', 'Error al actualizar el libro');
                }
            }

            return $this->redirect(['book/index']);
        }

        // mostrar el formulario y la lista de libros
        return $this->render('index', [
            'model' => $model,
            'books' => $books,
        ]);
    }

    // Acción para editar un libro existente
    public function actionEdit($id){

        $book = Book::findOne($id);

        if (!$book) {
            throw new NotFoundHttpException('El libro no existe.');
        }

        $model = $book;
        
        // Si el formulario es enviado (actualizar libro)
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Libro actualizado con éxito');
            return $this->redirect(['book/index']);
        }

        return $this->render('index', [
            'model' => $model,
            'books' => Book::find()->all(),  
        ]);
    }

    // Acción para eliminar un libro
    public function actionDelete($id){

        $book = Book::findOne($id);
        
        if ($book !== null) {
            if ($book->delete()) {
                Yii::$app->session->setFlash('success', 'Libro eliminado');
            } else {
                Yii::$app->session->setFlash('error', 'Error al eliminar el libro');
            }
        } else {
            Yii::$app->session->setFlash('error', 'No se encontró el libro');
        }

        return $this->redirect(['book/index']);  
    }
}

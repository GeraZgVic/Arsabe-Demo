<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Servicios;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\ServiciosSearch;
use yii\web\NotFoundHttpException;

/**
 * ServiciosController implements the CRUD actions for Servicios model.
 */
class ServiciosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Servicios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ServiciosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Servicios model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Servicios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Servicios();

        if ($this->request->isPost) {
            $model->load($this->request->post());

            // Validar y cargar la imagen si se ha proporcionado
            $imagen = $model->imagen = UploadedFile::getInstance($model, 'imagen');

            if ($imagen) {
                // Guardar la imagen
                $uploadPath = 'uploads/';
                // Genera un nombre único basado en el id_propiedad y un hash
                $imageName = $model->id . uniqid() . '.' . $imagen->extension;

                // Verificar si el directorio de destino existe, si no, crearlo
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                /// Guarda en Uploads con su extension
                $imagen->saveAs($uploadPath . $imageName);


                // Asignar la ruta de la imagen al modelo antes de guardar
                $model->imagen = $imageName;

                if ($model->save()) {

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Servicios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost) {
            // Cargar los datos del formulario
            $model->load($this->request->post());

            // Validar y cargar la nueva imagen si se ha proporcionado
            $newImage = UploadedFile::getInstance($model, 'imagen');

            if ($newImage) {
                // Borrar la imagen anterior si existe
                $oldImage = $model->imagen;
                if ($oldImage && file_exists('uploads/' . $oldImage)) {
                    unlink('uploads/' . $oldImage);
                }

                // Guardar la nueva imagen
                $uploadPath = 'uploads/';
                $imageName = $model->id . uniqid() . '.' . $newImage->extension;

                // Verificar si el directorio de destino existe, si no, crearlo
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                // Guardar la nueva imagen
                $newImage->saveAs($uploadPath . $imageName);

                // Asignar la ruta de la nueva imagen al modelo antes de guardar
                $model->imagen = $imageName;
            }

            // Guardar el modelo actualizado
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Servicios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Servicios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Servicios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Servicios::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

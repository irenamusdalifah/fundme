<?php

namespace frontend\controllers;

use Yii;
use frontend\models\fiturRap;
use frontend\models\fiturRapSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Campaign;
use yii\web\UploadedFile;

/**
 * FiturRapController implements the CRUD actions for fiturRap model.
 */
class FiturRapController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all fiturRap models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new fiturRapSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Displays a single fiturRap model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new fiturRap model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new fiturRap();

        $req = Yii::$app->request->post();

        $query = (new \yii\db\Query())
        ->select('*')
        ->from('fitur_rap')
        //->where(['user_id' => $user_id])
        ->leftJoin('campaign', '`campaign`.`cmpg_id` = `fitur_rap`.`cmpg_id`');

         $command = $query->createCommand(); 
        $data = $command->queryAll();


        //$cmpg_id = $data[0]['cmpg_id'];


        //$model->cmpg_id = $cmpg_id;

        //var_dump($model->cmpg_id);
        //die();


        if($model->load($req)){
            $model->cmpg_id = $id;
            $file = UploadedFile::getInstance($model, 'rap_file');
            $model->rap_file = 'file_rap/' . $file->baseName. '.' . $file->extension;
            $file->saveAs($model->rap_file);
            $model->save();
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->rap_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing fiturRap model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->rap_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing fiturRap model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the fiturRap model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return fiturRap the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = fiturRap::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

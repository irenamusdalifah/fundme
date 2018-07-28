<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Investor;
use frontend\models\InvestorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * InvestorController implements the CRUD actions for Investor model.
 */
class InvestorController extends Controller
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
     * Lists all Investor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "investor/mainInvestor";
        $searchModel = new InvestorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $user_id = Yii::$app->user->identity->id;

        $query = (new \yii\db\Query())
                ->select('inv_id')
                ->from('investor')
                ->where(['user_id' => $user_id])
                ->leftJoin('user', '`user`.`id` = `investor`.`user_id`');

        if ($query->count()==0) {

            $model = new Investor();
            $req = Yii::$app->request->post();
            $user_id = Yii::$app->user->identity->id;

            $query = (new \yii\db\Query())
            ->select('*')
            ->from('investor')
            ->where(['user_id' => $user_id])
            ->leftJoin('user', '`user`.`id` = `investor`.`user_id`');


            $command = $query->createCommand(); 
            $data = $command->queryOne();

            if($model->load($req)){
                $model->user_id = $user_id;
                $image = UploadedFile::getInstance($model, 'inv_foto');
                $image2 = UploadedFile::getInstance($model, 'inv_foto_kartu');
                $model->inv_foto = 'investor_foto/' . $image->baseName. '.' . $image->extension;
                $model->inv_foto_kartu = 'investor_fotoidentitas/' . $image2->baseName. '.' . $image->extension;
                $image->saveAs($model->inv_foto);
                $image2->saveAs($model->inv_foto_kartu);
                $model->save();
                if ($model->save()) {
                    return $this->redirect(['view','id' => $model->inv_id]);
                }
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }else {
            return $this->render('view', [
            'model' => $this->findModel($query),
        ]);
        }

        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
    }

    /**
     * Displays a single Investor model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = "investor/mainInvestor";
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Investor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Investor();
        $this->layout = "investor/mainInvestor";
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->inv_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Investor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->inv_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Investor model.
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
     * Finds the Investor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Investor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Investor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace frontend\controllers;

use Yii;
use frontend\models\PengajuDana;
use frontend\models\PengajuDanaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PengajuDanaController implements the CRUD actions for PengajuDana model.
 */
class PengajuDanaController extends Controller
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
     * Lists all PengajuDana models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PengajuDanaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        /*return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/

        $user_id = Yii::$app->user->identity->id;
        $this->layout = "pengajudana/mainPengajuDana";
        $query = (new \yii\db\Query())
                ->select('pd_id')
                ->from('pengaju_dana')
                ->where(['user_id' => $user_id])
                ->leftJoin('user', '`user`.`id` = `pengaju_dana`.`user_id`');

        if ($query->count()==0) {

            $model = new PengajuDana();
            $req = Yii::$app->request->post();
            $user_id = Yii::$app->user->identity->id;

            $query = (new \yii\db\Query())
            ->select('*')
            ->from('pengaju_dana')
            ->where(['user_id' => $user_id])
            ->leftJoin('user', '`user`.`id` = `pengaju_dana`.`user_id`');


            $command = $query->createCommand(); 
            $data = $command->queryOne();

            if($model->load($req)){
                $model->user_id = $user_id;
                $image = UploadedFile::getInstance($model, 'pd_foto');
                $image2 = UploadedFile::getInstance($model, 'pd_foto_kartu');
                $model->pd_foto = 'pengajudana_foto/' . $image->baseName. '.' . $image->extension;
                $model->pd_foto_kartu = 'pengajudana_fotoidentitas/' . $image2->baseName. '.' . $image->extension;
                $image->saveAs($model->pd_foto);
                $image2->saveAs($model->pd_foto_kartu);
                $model->save();
                if ($model->save()) {
                    return $this->redirect(['view','id' => $model->pd_id]);
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
    }

    /**
     * Displays a single PengajuDana model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    { 
        $this->layout = "pengajudana/mainPengajuDana";
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PengajuDana model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PengajuDana();
        $this->layout = "pengajudana/mainPengajuDana";

        $req = Yii::$app->request->post();
        $user_id = Yii::$app->user->identity->id;

        $query = (new \yii\db\Query())
                ->select('*')
                ->from('pengaju_dana')
                ->where(['user_id' => $user_id])
                ->leftJoin('user', '`user`.`id` = `pengaju_dana`.`user_id`');


        $command = $query->createCommand(); 
        $data = $command->queryOne();

        if($model->load($req)){
            $model->user_id = $user_id;
            $image = UploadedFile::getInstance($model, 'pd_foto');
            $image2 = UploadedFile::getInstance($model, 'pd_foto_kartu');
            $model->pd_foto = 'pengajudana_foto/' . $image->baseName. '.' . $image->extension;
            $model->pd_foto_kartu = 'pengajudana_fotoidentitas/' . $image2->baseName. '.' . $image->extension;
            $image->saveAs($model->pd_foto);
            $image2->saveAs($model->pd_foto_kartu);
            $model->save();
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PengajuDana model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $this->layout = "pengajudana/mainPengajuDana";

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pd_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PengajuDana model.
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
     * Finds the PengajuDana model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PengajuDana the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PengajuDana::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

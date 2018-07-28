<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Komentar;
use frontend\models\KomentarSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KomentarController implements the CRUD actions for Komentar model.
 */
class KomentarController extends Controller
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
     * Lists all Komentar models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $user_id = Yii::$app->user->identity->id;
        // $query2 = (new \yii\db\Query())
        //     ->select('inv_id')
        //     ->from('investor')
        //     ->where(['user_id' => $user_id])
        //     ->leftJoin('user', '`user`.`id` = `investor`.`user_id`');

        //     $command2 = $query2->createCommand(); 
        //     $data2 = $command2->queryAll();
        //     //$model->user_id = $user_id;

        // $inv_id=$data2[0]['inv_id'];
        $this->layout = "pengajudana/mainPengajuDana";
        $searchModel = new KomentarSearch();
        $dataProvider = new ActiveDataProvider(['query' => Komentar::find()->andFilterWhere(['cmpg_id' => $id])]);

        $cmpg_id = $id;



        return $this->render('index', [
            'id' => $cmpg_id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Komentar model.
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
     * Creates a new Komentar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Komentar();
        $req = Yii::$app->request->post();
        $this->layout = "investor/mainInvestor";
        $query = (new \yii\db\Query())
        ->select('*')
        ->from('komentar')
        //->where(['user_id' => $user_id])
        ->leftJoin('campaign', '`campaign`.`cmpg_id` = `komentar`.`cmpg_id`');

        $command = $query->createCommand(); 
        $data = $command->queryAll();
        
        //$cmpg_id = $data[0]['cmpg_id'];
        //$model->cmpg_id = $cmpg_id;

        //var_dump($model->cmpg_id);
        //die();


        if($model->load($req)){
            $model->cmpg_id = $id;
            $user_id = Yii::$app->user->identity->id;

            $query2 = (new \yii\db\Query())
            ->select('inv_id')
            ->from('investor')
            ->where(['user_id' => $user_id])
            ->leftJoin('user', '`user`.`id` = `investor`.`user_id`');

            $command2 = $query2->createCommand(); 
            $data2 = $command2->queryAll();
            //$model->user_id = $user_id;

            $tgl = date('Y-m-d H:i:s');

            $model->inv_id=$data2[0]['inv_id'];
            $model->tanggal=$tgl;
            $model->save();

            $model->save();
            if ($model->save()) {
                return $this->redirect(['cari-campaign/detail', 'id' => $model->cmpg_id]);
            }
        }

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->komentar_id]);
        // }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Komentar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->komentar_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Komentar model.
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
     * Finds the Komentar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Komentar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Komentar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

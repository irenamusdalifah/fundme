<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Laporan;
use frontend\models\LaporanSearch;
use frontend\models\LabaInvestor;
use frontend\models\Investor;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;

/**
 * LaporanController implements the CRUD actions for Laporan model.
 */
class LaporanController extends Controller
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
     * Lists all Laporan models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $cmpg_id = $id;

        // $query = (new \yii\db\Query())
        // ->select('*')
        // ->from('laporan')
        // ->where(['cmpg_id' => $cmpg_id]);

        $dataProvider = Laporan::find()
        ->where(['cmpg_id' => $cmpg_id])
        ->all();

        $dataProvider = new ActiveDataProvider([
        'query' => Laporan::find()->andFilterWhere(['cmpg_id' => $cmpg_id])
       ]);
     
        // $command = $query->createCommand(); 
        // $data = $command->queryAll();

        // var_dump($data);
        // die();

        $searchModel = new LaporanSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout = "pengajudana/mainPengajuDana";
        return $this->render('index', [
            'id' => $cmpg_id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            
        ]);
    }

    /**
     * Displays a single Laporan model.
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
     * Creates a new Laporan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $this->layout = "pengajudana/mainPengajuDana";
        $model = new Laporan();

        $req = Yii::$app->request->post();

        $query = (new \yii\db\Query())
        ->select('*')
        ->from('laporan')
        //->where(['user_id' => $user_id])
        ->leftJoin('campaign', '`campaign`.`cmpg_id` = `laporan`.`cmpg_id`');

        $command = $query->createCommand(); 
        $data = $command->queryAll();

        $query2 = (new \yii\db\Query())
        ->select('*')
        ->from('transaksi_campaign')
        //->where(['user_id' => $user_id])
        ->where(['cmpg_id' => $id]);

        $command2 = $query2->createCommand(); 
        $data2 = $command2->queryAll();
 

        if($model->load($req)){
            $id=$id;
            $model->cmpg_id = $id;
            $file = UploadedFile::getInstance($model, 'lap_file');
            $model->lap_file = 'file_laporan/' . $file->baseName. '.' . $file->extension;
            $file->saveAs($model->lap_file);
            $model->save();
            $i=0;
            foreach ($data2 as $key) {
                //var_dump($key);
                $modellaba = new LabaInvestor;
                $modellaba->lap_id=$model->lap_id;
                $modellaba->inv_id=$key['inv_id'];
                $modellaba->bulan=$model->lap_bulan;
                $persen = $key['tc_bagian'];
                $laba = $model->lap_totallaba;
                $hasil= ($persen*$laba)/100;
                $modellaba->laba=$hasil;
                $modellaba->save();

                $modelsaldoupdate = Investor::findOne($modellaba->inv_id);
                $modelsaldoupdate->inv_saldo=$modelsaldoupdate->inv_saldo+$hasil;
                $modelsaldoupdate->save();
                // if ($i == 3) {
                //     $modellaba = new LabaInvestor;
                //     $modellaba->lap_id=$model->lap_id;
                //     $modellaba->inv_id=$key['inv_id'];
                //     $modellaba->bulan=$model->lap_bulan;
                //     $persen = $key['tc_bagian'];
                //     $laba = $model->lap_totallaba;
                //     $hasil= ($persen*$laba)/100;
                //     $modellaba->laba=$hasil;
                //     $modellaba->save();
                //     var_dump($modellaba->laba);
                // }
                // $i++;
                
            }
            die();
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->lap_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Laporan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = "pengajudana/mainPengajuDana";
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->lap_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Laporan model.
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
     * Finds the Laporan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Laporan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Laporan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

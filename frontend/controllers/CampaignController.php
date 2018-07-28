<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Campaign;
use frontend\models\Kategori;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\widgets\FileInput;
use yii\web\UploadedFile;

/**
 * CampaignController implements the CRUD actions for Campaign model.
 */
class CampaignController extends Controller
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
     * Lists all Campaign models.
     * @return mixed
     */
    public function actionIndex()
    {
        $user_id = Yii::$app->user->identity->id;
        $this->layout = "pengajudana/mainPengajuDana";
        $dataProvider = new ActiveDataProvider(['query' => Campaign::find()->andFilterWhere(['user_id' => $user_id])]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Campaign model.
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
     * Creates a new Campaign model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Campaign();
        $this->layout = "pengajudana/mainPengajuDana";
        $req = Yii::$app->request->post();
        $user_id = Yii::$app->user->identity->id;

        $query = (new \yii\db\Query())
                ->select('*')
                ->from('campaign')
                ->where(['user_id' => $user_id])
                ->leftJoin('user', '`user`.`id` = `campaign`.`user_id`');
                //->leftJoin('penjahit_profil', '`penjahit_profil`.`pjht_id` = `orderan`.`pjht_id`');
                // ->where(['user_id' => $user_id])
                // ->andWhere(['pjht_id' => $pjht_id]);


        $command = $query->createCommand(); 
        $data = $command->queryAll();


       if($model->load($req)){
            $model->user_id = $user_id;
            $image = UploadedFile::getInstance($model, 'cmpg_namaposter');
            $model->cmpg_namaposter = 'image_campaign/' . $image->baseName. '.' . $image->extension;
            $image->saveAs($model->cmpg_namaposter);
            $model->save();
            if ($model->save()) {
                return $this->redirect(['penarikan-investasi/create', 'id' => $model->cmpg_id]);
            }
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Campaign model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // $gambar = Yii::$app->request->baseUrl.'/image_campaign/010.png';
        // var_dump($gambar);
        // die();
        $this->layout = "pengajudana/mainPengajuDana";
        $req = Yii::$app->request->post();
        $user_id = Yii::$app->user->identity->id;

        $query = (new \yii\db\Query())
                ->select('*')
                ->from('campaign')
                ->where(['user_id' => $user_id])
                ->leftJoin('user', '`user`.`id` = `campaign`.`user_id`');
                //->leftJoin('penjahit_profil', '`penjahit_profil`.`pjht_id` = `orderan`.`pjht_id`');
                // ->where(['user_id' => $user_id])
                // ->andWhere(['pjht_id' => $pjht_id]);


        $command = $query->createCommand(); 
        $data = $command->queryAll();


       if($model->load($req)){
            $model->user_id = $user_id;
            $image = UploadedFile::getInstance($model, 'cmpg_namaposter');
            $model->cmpg_namaposter = 'image_campaign/' . $image->baseName. '.' . $image->extension;
            $image->saveAs($model->cmpg_namaposter);
            
            $model->save();
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->cmpg_id]);
            }
        }


        return $this->render('update', [
            'model' => $model,
            
        ]);
    }

    /**
     * Deletes an existing Campaign model.
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

    public function actionLaunch($id)
    {
        //$this->findModel($id)->delete();

        $cmpg_id = $id;
        $modelupdate = Campaign::findOne($cmpg_id);

        //$uangtmp = $model->tc_dana;
        $dimulai = date('Y-m-d H:i:s');
        $timestampdimulai = strtotime($dimulai);
        // var_dump($dimulai);
        // die();

        $akhir = $modelupdate->cmpg_durasihari;
        // var_dump($akhir);
        // die();
        $stop_date = date('Y-m-d H:i:s', strtotime($dimulai . ' + '.$akhir.' day'));
        // $timestampakhir = strtotime('+' . $akhir . ' days');
        // $total1 = (int)($timestampakhir + $timestampdimulai);
        // $total = date('Y-m-d H:i:s',$total1);
        // var_dump($stop_date);
        // die();
        
        $modelupdate->tgl_dimulai=$dimulai;
        $modelupdate->tgl_akhir=$stop_date;
        $modelupdate->cmpg_status=3;
        $modelupdate->update();

        return $this->redirect(['index']);
    }

    // public function actionRefresh($id)
    // {
    //     //$this->findModel($id)->delete();

    //     $cmpg_id = $id;
    //     $modelupdate = Campaign::findOne($cmpg_id);

    //     //$uangtmp = $model->tc_dana;
    //     $dimulai = date('Y-m-d H:i:s');
    //     $timestampdimulai = strtotime($dimulai);
    //     // var_dump($dimulai);
    //     // die();

    //     $akhir = $modelupdate->cmpg_durasihari;
    //     // var_dump($akhir);
    //     // die();
    //     $stop_date = date('Y-m-d H:i:s', strtotime($dimulai . ' + '.$akhir.' day'));
    //     // $timestampakhir = strtotime('+' . $akhir . ' days');
    //     // $total1 = (int)($timestampakhir + $timestampdimulai);
    //     // $total = date('Y-m-d H:i:s',$total1);
    //     // var_dump($stop_date);
    //     // die();
        
    //     $modelupdate->tgl_dimulai=$dimulai;
    //     $modelupdate->tgl_akhir=$stop_date;
    //     $modelupdate->cmpg_status=3;
    //     $modelupdate->update();

    //     return $this->redirect(['index']);
    // }

    /**
     * Finds the Campaign model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Campaign the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Campaign::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

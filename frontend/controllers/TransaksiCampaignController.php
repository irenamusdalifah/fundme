<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TransaksiCampaign;
use frontend\models\PenarikanInvestasiInv;
use frontend\models\PenarikanInvestasi;
use frontend\models\Campaign;
use frontend\controllers\CariCampaignController;
use frontend\models\TransaksiCampaignSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransaksiCampaignController implements the CRUD actions for TransaksiCampaign model.
 */
class TransaksiCampaignController extends Controller
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
     * Lists all TransaksiCampaign models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransaksiCampaignSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TransaksiCampaign model.
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
     * Creates a new TransaksiCampaign model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $req = Yii::$app->request->post();
        $model = new TransaksiCampaign;
        $this->layout = 'investor/mainInvestor';
        
        if($model->load($req)){

            $total = TransaksiCampaign::find()->select('inv_id')->distinct()->count();

            $user_id = Yii::$app->user->identity->id;
            $cmpg_id = $id;

            //query mencari inv_id
            $query = (new \yii\db\Query())
            ->select('inv_id')
            ->from('investor')
            ->where(['user_id' => $user_id])
            ->leftJoin('user', '`user`.`id` = `investor`.`user_id`');
            $command = $query->createCommand(); 
            $data = $command->queryAll();

            //ngesave model transaksi
            $orderid = date('Y-m-d H:i:s');
            $model->inv_id=$data[0]['inv_id'];
            $model->cmpg_id=$cmpg_id;
            $model->tc_tanggal=$orderid;
            $uangtmp = $model->tc_dana;

            //mengganti total dana dan bagian inv
            $modelcampaign = Campaign::findOne($cmpg_id);
            $modelcampaign->total_investor=$total;
            $target = $modelcampaign->cmpg_targetdana;
            $persen = ($uangtmp/$target)*100;
            $model->tc_bagian = $persen;
            $modelcampaign->cmpg_totaldana=$modelcampaign->cmpg_totaldana+$uangtmp;


            //MEMBUAT PENARIKAN DANA
            $query3 = (new \yii\db\Query())
            ->select('pi_id')
            ->from('penarikan_investasi')
            ->where(['cmpg_id' => $cmpg_id]);
            $command3 = $query3->createCommand(); 
            $data3 = $command3->queryAll();

            $modelPI = PenarikanInvestasi::findOne($data3);
            // var_dump($modelPI);
            // die();
            $modelpenarikaninvestasi = new PenarikanInvestasiInv;
            $modelpenarikaninvestasi->pi_id=(int)$data3;
            $modelpenarikaninvestasi->inv_id=$model->inv_id;

            $dimulai = $modelcampaign->tgl_akhir;
            $timestampdimulai = strtotime($dimulai);
            $dateawal = date('Y-m-d H:i:s', strtotime($dimulai . ' + 30 days'));
            $modelpenarikaninvestasi->tgl_awal_usaha=$dateawal;
            $datemulai = date('Y-m-d H:i:s', strtotime($dateawal . ' + 365 days'));
            $modelpenarikaninvestasi->tgl_dimulai=$datemulai;
            
            $query4 = (new \yii\db\Query())
            ->select('opsi_satu_tahun, opsi_dua_tahun')
            ->from('penarikan_investasi')
            ->where(['cmpg_id' => $cmpg_id]);
            $command4 = $query4->createCommand(); 
            $data4 = $command4->queryAll();

            // var_dump($data4);
            // die();

            $extension = 0;
            if ($persen <= $data4[0]['opsi_satu_tahun']) {
              $extension = 1;
            }elseif ($persen <= $data4[0]['opsi_dua_tahun']) {
              $extension = 2;
            }else{
              $extension = 3;
            }

            

            $totalhari = $extension * 365;

            $dateakhir = date('Y-m-d H:i:s', strtotime($datemulai . ' + '.$totalhari.' days'));
            $modelpenarikaninvestasi->tgl_kembali=$dateakhir;
            

            // if(!$modelpenarikaninvestasi->update()){
            //     echo 'Error to save user model<br />';
            //     var_dump($modelpenarikaninvestasi->getErrors());
            // }

            // die();
            
            //$orderid = date('Y-m-d H:i:s');
            // var_dump($orderid);
            // die();

            //start midtrans 
            $body = array(
                "transaction_details" => array(
                    "order_id" => "ORDER-".$orderid,
                    "gross_amount" => $uangtmp
                ),
            );

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://app.sandbox.midtrans.com/snap/v1/transactions",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => json_encode($body),
              CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "authorization: Basic U0ItTWlkLXNlcnZlci1pVVhNUlpUZlRGUnFUZFpKd1U0N1VfYTA6Og==",
                "cache-control: no-cache",
                "content-type: application/json",
                "postman-token: 690f1bbf-fe9f-0af2-073c-260ea460ea65"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              // echo $response;
              $url = json_decode($response)->redirect_url;
              // print_r($url);
              // die();
              $model->save();
              $modelcampaign->save();
              $modelpenarikaninvestasi->save();
              return $this->redirect($url);
            }

            

            // if ($model->save() && $modelupdate->save()) {
            //     return $this->redirect(['cari-campaign/detail', 'id' => $modelupdate->cmpg_id]);
                // return $this->redirect(['view', 'id' => $model->tc_id]);
            // }
        }

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->tc_id]);
        // }

        return $this->render('create', [
            'id' => $id,
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TransaksiCampaign model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tc_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TransaksiCampaign model.
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
     * Finds the TransaksiCampaign model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TransaksiCampaign the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TransaksiCampaign::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

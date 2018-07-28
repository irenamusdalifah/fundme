<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TransaksiCampaign;
use yii\data\ActiveDataProvider;
use frontend\models\Campaign;
use frontend\controllers\CariCampaignController;
use frontend\models\TransaksiCampaignSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransaksiCampaignController implements the CRUD actions for TransaksiCampaign model.
 */
class TransaksiCampaignInvestorController extends Controller
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
        $user_id = Yii::$app->user->identity->id;
        $this->layout = "investor/mainInvestor";

        $query = (new \yii\db\Query())
            ->select('inv_id')
            ->from('investor')
            ->where(['user_id' => $user_id])
            ->leftJoin('user', '`user`.`id` = `investor`.`user_id`');

            $command = $query->createCommand(); 
            $data = $command->queryAll();

        $inv_id=$data[0]['inv_id'];

        $searchModel = new TransaksiCampaignSearch();
        $dataProvider = new ActiveDataProvider(['query' => TransaksiCampaign::find()->andFilterWhere(['inv_id' => $inv_id])]);
        
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRefresh()
    {
        //$this->findModel($id)->delete();

        //$cmpg_id = $id;
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
        // var_dump($req);
        // die();

        // $model->inv_id=$data;
        // var_dump($data);
        // die();
        // $model->cmpg_id=$cmpg_id;

        if($model->load($req)){
            $user_id = Yii::$app->user->identity->id;
            $cmpg_id = $id;

            $query = (new \yii\db\Query())
            ->select('inv_id')
            ->from('investor')
            ->where(['user_id' => $user_id])
            ->leftJoin('user', '`user`.`id` = `investor`.`user_id`');

            $command = $query->createCommand(); 
            $data = $command->queryAll();
            //$model->user_id = $user_id;

            $orderid = date('Y-m-d H:i:s');

            $model->inv_id=$data[0]['inv_id'];
            $model->cmpg_id=$cmpg_id;
            $model->tc_tanggal=$orderid;
            $model->save();

            $uangtmp = $model->tc_dana;
            $modelupdate = Campaign::findOne($cmpg_id);

            $modelupdate->cmpg_totaldana=$modelupdate->cmpg_totaldana+$uangtmp;
            $modelupdate->save();

            $orderid = date('Y-m-d H:i:s');
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

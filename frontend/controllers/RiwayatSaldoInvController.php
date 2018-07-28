<?php

namespace frontend\controllers;

use Yii;
use frontend\models\RiwayatSaldoInv;
use frontend\models\RiwayatSaldoInvSearch;
use yii\web\Controller;
use frontend\models\Investor;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RiwayatSaldoInvController implements the CRUD actions for RiwayatSaldoInv model.
 */
class RiwayatSaldoInvController extends Controller
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
     * Lists all RiwayatSaldoInv models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RiwayatSaldoInvSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RiwayatSaldoInv model.
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
     * Creates a new RiwayatSaldoInv model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $user_id = Yii::$app->user->identity->id;
        $inv_id = $id;
        $this->layout = "investor/mainInvestor";

        $req = Yii::$app->request->post();
        $model = new RiwayatSaldoInv();
        

        

        if ($model->load($req)) {
            $tanggal = date('Y-m-d H:i:s');
            $uangtmp=$model->saldo;
            
            
           
            //$inv_saldo = $modelupdate->inv_saldo;
            $modelupdate = Investor::findOne($inv_id);
            $modelupdate->inv_saldo=$modelupdate->inv_saldo+$uangtmp;
            $model->saldo=(int)$uangtmp;

            // var_dump($modelupdate->inv_saldo);
            // die();

            $model->inv_id=$inv_id;
            $model->tanggal=$tanggal;

            $model->save();
            //$modelupdate->inv_saldo->save();
            $modelupdate->update();

            if(!$modelupdate->update()){
                echo 'Error to save user model<br />';
                var_dump($modelupdate->getErrors());
            }

            // var_dump($modelupdate->update());
            // die();


            // var_dump($modelupdate->inv_saldo);
            // die();


            // $body = array(
            //     "transaction_details" => array(
            //         "order_id" => "ORDER-".$tanggal,
            //         "gross_amount" => $model->saldo
            //     ),
            // );

            $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://app.sandbox.midtrans.com/snap/v1/transactions",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\t\"transaction_details\":{\n\t\t\"order_id\":\"$tanggal\",\n\t\t\"gross_amount\":$uangtmp\n\t}\n}",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "authorization: Basic U0ItTWlkLXNlcnZlci1pVVhNUlpUZlRGUnFUZFpKd1U0N1VfYTA6Og==",
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: f877d272-40c3-dc25-b368-8112acd2eb78"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    // var_dump($response);
    // die();
  $url = json_decode($response)->redirect_url;
              // print_r($url);
              // die();
              
              return $this->redirect($url);
}

            // $curl = curl_init();

            // curl_setopt_array($curl, array(
            //   CURLOPT_URL => "https://app.sandbox.midtrans.com/snap/v1/transactions",
            //   CURLOPT_RETURNTRANSFER => true,
            //   CURLOPT_ENCODING => "",
            //   CURLOPT_MAXREDIRS => 10,
            //   CURLOPT_TIMEOUT => 30,
            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //   CURLOPT_CUSTOMREQUEST => "POST",
            //   CURLOPT_POSTFIELDS => "",
            //   CURLOPT_HTTPHEADER => array(
            //     "accept: application/json",
            //     "authorization: Basic U0ItTWlkLXNlcnZlci1pVVhNUlpUZlRGUnFUZFpKd1U0N1VfYTA6Og==",
            //     "cache-control: no-cache",
            //     "content-type: application/x-www-form-urlencoded",
            //     "postman-token: d3691e6d-ca00-44e5-93fe-4effcf1b1326"
            //   ),
            // ));

            // $response = curl_exec($curl);
            // $err = curl_error($curl);

            // curl_close($curl);

            // var_dump($response);
            // die();

            // if ($err) {
            //   echo "cURL Error #:" . $err;
            // } else {
            //   echo $response;
            // }

            if ($model->save() && $modelupdate->save()) {
                //return $this->redirect(['cari-campaign/detail', 'id' => $modelupdate->cmpg_id]);
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RiwayatSaldoInv model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RiwayatSaldoInv model.
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
     * Finds the RiwayatSaldoInv model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RiwayatSaldoInv the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RiwayatSaldoInv::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

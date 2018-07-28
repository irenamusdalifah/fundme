<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Investor;
use frontend\models\RiwayatSaldoInv;
use frontend\models\Campaign;

class SaldoInvestorController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	//$this->layout = "investor/mainInvestor";

    	//$user_id = Yii::$app->user->identity->id;

        $user = Yii::$app->user;

        $user_id = Yii::$app->user->identity->id;
        $this->layout = "investor/mainInvestor";

        $query = (new \yii\db\Query())
            ->select('*')
            ->from('investor')
            ->where(['user_id' => $user_id])
            ->leftJoin('user', '`user`.`id` = `investor`.`user_id`');

        $command = $query->createCommand(); 
        $data = $command->queryAll();

        //$inv_id=$data[0]['inv_id'];

        // $query = (new \yii\db\Query())
        //         ->select('*')
        //         ->from('investor')
        //         ->where('')

        // $command = $query->createCommand(); 
        // $data = $command->queryAll();

        // var_dump($data);
        // die();

        return $this->render('index', [
        	'datas' => $data,
        ]);
    }

    public function actionTambah($id)
    {
        //$this->layout = "investor/mainInvestor";

        //$user_id = Yii::$app->user->identity->id;
        $req = Yii::$app->request->post();
        $user = Yii::$app->user;

        $user_id = Yii::$app->user->identity->id;
        $inv_id = $id;
        $this->layout = "investor/mainInvestor";

        $model = new RiwayatSaldoInv;
        

        if ($model->load($req)) {
            # code...
            $tanggal = date('Y-m-d H:i:s');
            $uangtmp=$model->saldo;
            $model->save();

            $modelupdate = Investor::findOne($inv_id);

            $modelupdate->inv_saldo=$modelupdate->inv_saldo+$uangtmp;
            $modelupdate->save();

            $body = array(
                "transaction_details" => array(
                    "order_id" => "ORDER-".$tanggal,
                    "gross_amount" => $model->saldo
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
                  CURLOPT_HTTPHEADER => array(
                    "accept: application/json",
                    "authorization: Basic U0ItTWlkLXNlcnZlci1pVVhNUlpUZlRGUnFUZFpKd1U0N1VfYTA6Og==",
                    "cache-control: no-cache",
                    "content-type: application/x-www-form-urlencoded",
                    "postman-token: 462d1ee9-8f66-d821-a6ca-9af507e0ae5a"
                ),
              ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
          } else {
              // echo $response;
            var_dump($response);
            die();
              $url = json_decode($response)->redirect_url;
              // print_r($url);
              // die();
              
              return $this->redirect($url);
          }

            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              
            }
        }

        // $query = (new \yii\db\Query())
        //     ->select('*')
        //     ->from('investor')
        //     ->where(['user_id' => $user_id])
        //     ->leftJoin('user', '`user`.`id` = `investor`.`user_id`');

        // $command = $query->createCommand(); 
        // $data = $command->queryAll();

        //$inv_id=$data[0]['inv_id'];

        // $query = (new \yii\db\Query())
        //         ->select('*')
        //         ->from('investor')
        //         ->where('')

        // $command = $query->createCommand(); 
        // $data = $command->queryAll();

        // var_dump($data);
        // die();

        return $this->render('tambah', [
            'id' => $id,
            'model' => $model,
        ]);
    }

    public function actionDetail($id){
    	$this->layout = "investor/mainInvestor";

    	//$user_id = $id;
        $cmpg_id = $id;
    	$query = (new \yii\db\Query())
    	 		->select('*')
    	 		->from('campaign')
                ->where(['cmpg_id'=> $cmpg_id])
                ;

    	 $command = $query->createCommand();
    	 $data = $command->queryOne();

         $uangterkumpul = $data['cmpg_totaldana'];
         $uangbutuh = $data['cmpg_targetdana'];
         $persenan = ($uangterkumpul/$uangbutuh) * 100;

         // var_dump($persenan);
         // die();


    	return $this->render('detail', [
    		'datas' => $data,
            'persenan' => $persenan,
    	]);

    }

    public function actionKomentar($id)
    {
        $this->layout = "investor/mainInvestor";

        $user_id = Yii::$app->user->identity->id;

        $user = Yii::$app->user;

        $query = (new \yii\db\Query())
                ->select('*')
                ->from('campaign');

        $command = $query->createCommand(); 
        $data = $command->queryAll();

        // var_dump($data);
        // die();

        return $this->render('index', [
            'datas' => $data,
        ]);
    }

}

<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\PengajuDana;
use frontend\models\Campaign;
use frontend\models\TransaksiCampaign;

class CariCampaignController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$this->layout = "investor/mainInvestor";

    	//$user_id = Yii::$app->user->identity->id;

        $user = Yii::$app->user;

        $tanggal = date('Y-m-d H:i:s');

        $query = (new \yii\db\Query())
                ->select('*')
                ->from('campaign')
                ->where(['cmpg_status'=> 3])
                ->andWhere(['>=','tgl_akhir',date("Y-m-d H:i:s")])
                ;

        $command = $query->createCommand(); 
        $data = $command->queryAll();

        // var_dump($data);
        // die();

        return $this->render('index', [
        	'datas' => $data,
        ]);
    }

    public function actionDetail($id){
    	$this->layout = "investor/mainInvestor";

    	//$user_id = $id;
        $cmpg_id = $id;
    	$query = (new \yii\db\Query())
    	 		->select('*')
    	 		->from('campaign')
                ->where(['cmpg_id'=> $cmpg_id]  )
                ;

    	 $command = $query->createCommand();
    	 $data = $command->queryOne();

         $uangterkumpul = $data['cmpg_totaldana'];
         $uangbutuh = $data['cmpg_targetdana'];
         $persenan = ($uangterkumpul/$uangbutuh) * 100;

        $q = 'count(distinct inv_id)';

         $query2 = (new \yii\db\Query())
            ->select($q)
            ->from('transaksi_campaign')
            ->where(['cmpg_id'=> $cmpg_id]);

            $command2 = $query2->createCommand(); 
            $data2 = $command2->queryAll();

            //$total = $data2->distinct()->count();

        //$total = $data2()->count();

         // var_dump($data2);
         // die();

    	return $this->render('detail', [
    		'datas' => $data,
            'persenan' => $persenan,
            'data2s' => $data2,
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

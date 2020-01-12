<?php

namespace frontend\models;

use Yii;


class Match extends \common\models\MatchBase{

    public function getMatch($type=1,$value=0)
    {
        $sql = "SELECT * FROM match WHERE status = 1 AND deleted = 0";
        if ($type == 2 && $value != 0) {
            $sql = "SELECT * FROM match WHERE status = 1 AND deleted = 0 AND league_id = $value";
        }

        $connection = Yii::$app->getDb();
        $data = $connection->createCommand($sql)->queryAll();

        return $data;
    }

}
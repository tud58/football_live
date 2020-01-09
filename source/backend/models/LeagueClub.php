<?php

namespace backend\models;

use Yii;
use yii\db\Query;


class LeagueClub extends \common\models\LeagueClubBase{

    public function getLeagueClubArr()
    {
        $sql = "SELECT lc.club_id, GROUP_CONCAT(l.name) as league_id FROM leagues_clubs lc JOIN leagues l ON lc.league_id = l.id WHERE lc.status = 1 AND lc.deleted = 0 GROUP BY lc.club_id";
        $connection = Yii::$app->getDb();
        $data = $connection->createCommand($sql)->queryAll();

        return $data;
    }

}
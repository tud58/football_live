<?php

namespace backend\models;

use Yii;
use yii\db\Query;


class LeagueClub extends \common\models\LeagueClubBase{

    public function getLeagueClubArr($club_id=null)
    {
        $sql = "SELECT lc.club_id, GROUP_CONCAT(l.name) as league_id FROM leagues_clubs lc JOIN leagues l ON lc.league_id = l.id WHERE lc.status = 1 AND lc.deleted = 0 AND l.status =1 AND l.deleted = 0";
        if (!empty($club_id)) {
            $sql .= " AND lc.club_id = $club_id";
        }
        $sql .= " GROUP BY lc.club_id";
        $connection = Yii::$app->getDb();
        $data = $connection->createCommand($sql)->queryAll();

        return $data;
    }

    public function getClubByLeague($league_id=null)
    {
        $sql = "SELECT lc.club_id, c.name as name FROM leagues_clubs lc JOIN clubs c ON lc.club_id = c.id WHERE lc.status = 1 AND lc.deleted = 0 AND c.status =1 AND c.deleted = 0";
        if (!empty($league_id)) {
            $sql .= " AND lc.league_id = $league_id";
        }
        $sql .= " GROUP BY lc.club_id";
        $connection = Yii::$app->getDb();
        $data = $connection->createCommand($sql)->queryAll();

        return $data;
    }

}
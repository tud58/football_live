<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "leagues_clubs".
 *
 * @property integer $id
 * @property integer $club_id
 * @property integer $league_id
 * @property integer $status
 * @property integer $deleted
 * @property integer $created_by
 * @property string $created_time
 * @property integer $updated_by
 * @property string $updated_time
 */
class LeagueClubDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leagues_clubs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'club_id', 'league_id'], 'required'],
            [['id', 'club_id', 'league_id', 'status', 'deleted', 'created_by', 'updated_by'], 'integer'],
            [['created_time', 'updated_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'club_id' => 'Club ID',
            'league_id' => 'League ID',
            'status' => 'Status',
            'deleted' => 'Deleted',
            'created_by' => 'Created By',
            'created_time' => 'Created Time',
            'updated_by' => 'Updated By',
            'updated_time' => 'Updated Time',
        ];
    }
}

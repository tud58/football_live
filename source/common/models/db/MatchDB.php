<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "matchs".
 *
 * @property integer $id
 * @property string $title
 * @property integer $league_id
 * @property integer $club1_id
 * @property integer $club2_id
 * @property string $start_time
 * @property integer $stadium_id
 * @property string $url
 * @property integer $status
 * @property integer $deleted
 * @property string $thumb
 * @property integer $created_by
 * @property string $created_time
 * @property integer $updated_by
 * @property string $updated_time
 * @property integer $sort
 * @property integer $url_status
 */
class MatchDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matchs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'league_id', 'club1_id', 'club2_id', 'start_time'], 'required'],
            [['id', 'league_id', 'club1_id', 'club2_id', 'stadium_id', 'status', 'deleted', 'created_by', 'updated_by', 'sort', 'url_status'], 'integer'],
            [['start_time', 'created_time', 'updated_time'], 'safe'],
            [['title', 'url'], 'string', 'max' => 500],
            [['thumb'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'league_id' => 'League ID',
            'club1_id' => 'Club1 ID',
            'club2_id' => 'Club2 ID',
            'start_time' => 'Start Time',
            'stadium_id' => 'Stadium ID',
            'url' => 'Url',
            'status' => 'Status',
            'deleted' => 'Deleted',
            'thumb' => 'Thumb',
            'created_by' => 'Created By',
            'created_time' => 'Created Time',
            'updated_by' => 'Updated By',
            'updated_time' => 'Updated Time',
            'sort' => 'Sort',
            'url_status' => 'Url Status',
        ];
    }
}

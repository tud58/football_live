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
 * @property string $url1
 * @property integer $status
 * @property integer $deleted
 * @property string $thumb
 * @property integer $created_by
 * @property string $created_time
 * @property integer $updated_by
 * @property string $updated_time
 * @property integer $sort
 * @property integer $feature_match
 * @property string $slug
 * @property integer $hot_match
 * @property string $url2
 * @property string $url3
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
            [['league_id', 'club1_id', 'club2_id', 'start_time'], 'required'],
            [['league_id', 'club1_id', 'club2_id', 'stadium_id', 'status', 'deleted', 'created_by', 'updated_by', 'sort', 'feature_match', 'hot_match'], 'integer'],
            [['start_time', 'created_time', 'updated_time'], 'safe'],
            [['title', 'url1', 'slug', 'url2', 'url3'], 'string', 'max' => 500],
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
            'url1' => 'Url1',
            'status' => 'Status',
            'deleted' => 'Deleted',
            'thumb' => 'Thumb',
            'created_by' => 'Created By',
            'created_time' => 'Created Time',
            'updated_by' => 'Updated By',
            'updated_time' => 'Updated Time',
            'sort' => 'Sort',
            'feature_match' => 'Feature Match',
            'slug' => 'Slug',
            'hot_match' => 'Hot Match',
            'url2' => 'Url2',
            'url3' => 'Url3',
        ];
    }
}

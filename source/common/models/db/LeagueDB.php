<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "leagues".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property integer $deleted
 * @property string $logo
 * @property integer $created_by
 * @property string $created_time
 * @property integer $updated_by
 * @property string $updated_time
 * @property integer $sort
 */
class LeagueDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leagues';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'deleted', 'created_by', 'updated_by', 'sort'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['name', 'description', 'logo'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'deleted' => 'Deleted',
            'logo' => 'Logo',
            'created_by' => 'Created By',
            'created_time' => 'Created Time',
            'updated_by' => 'Updated By',
            'updated_time' => 'Updated Time',
            'sort' => 'Sort',
        ];
    }
}

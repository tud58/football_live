<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "clubs".
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
 * @property integer $stadium_id
 */
class ClubDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clubs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'deleted', 'created_by', 'updated_by', 'stadium_id'], 'integer'],
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
            'stadium_id' => 'Stadium ID',
        ];
    }
}

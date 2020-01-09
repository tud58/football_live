<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "ads".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $ads_location_id
 * @property string $url
 * @property string $img
 * @property integer $created_by
 * @property string $created_time
 * @property integer $updated_by
 * @property string $updated_time
 * @property integer $status
 * @property integer $deleted
 */
class AdsDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ads_location_id', 'url', 'img'], 'required'],
            [['ads_location_id', 'created_by', 'updated_by', 'status', 'deleted'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['title', 'description'], 'string', 'max' => 255],
            [['url', 'img'], 'string', 'max' => 500]
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
            'description' => 'Description',
            'ads_location_id' => 'Ads Location ID',
            'url' => 'Url',
            'img' => 'Img',
            'created_by' => 'Created By',
            'created_time' => 'Created Time',
            'updated_by' => 'Updated By',
            'updated_time' => 'Updated Time',
            'status' => 'Status',
            'deleted' => 'Deleted',
        ];
    }
}

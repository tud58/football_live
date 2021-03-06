<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AdsLocation;

/**
 * AdsLocationSearch represents the model behind the search form about `backend\models\AdsLocation`.
 */
class AdsLocationSearch extends AdsLocation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by', 'status', 'deleted'], 'integer'],
            [['name', 'description', 'created_time', 'updated_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AdsLocation::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_by' => $this->created_by,
            'created_time' => $this->created_time,
            'updated_by' => $this->updated_by,
            'updated_time' => $this->updated_time,
            'status' => $this->status,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}

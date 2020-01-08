<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\LeagueClub;

/**
 * LeagueClubSearch represents the model behind the search form about `backend\models\LeagueClub`.
 */
class LeagueClubSearch extends LeagueClub
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'club_id', 'league_id', 'status', 'deleted', 'created_by', 'updated_by'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
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
        $query = LeagueClub::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'club_id' => $this->club_id,
            'league_id' => $this->league_id,
            'status' => $this->status,
            'deleted' => $this->deleted,
            'created_by' => $this->created_by,
            'created_time' => $this->created_time,
            'updated_by' => $this->updated_by,
            'updated_time' => $this->updated_time,
        ]);

        return $dataProvider;
    }
}
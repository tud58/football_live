<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Match;

/**
 * MatchSearch represents the model behind the search form about `backend\models\Match`.
 */
class MatchSearch extends Match
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'league_id', 'club1_id', 'club2_id', 'stadium_id', 'status', 'deleted', 'created_by', 'updated_by', 'sort', 'url_status', 'hot'], 'integer'],
            [['title', 'start_time', 'url', 'thumb', 'created_time', 'updated_time', 'slug'], 'safe'],
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
        $query = Match::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'league_id' => $this->league_id,
            'club1_id' => $this->club1_id,
            'club2_id' => $this->club2_id,
            'start_time' => $this->start_time,
            'stadium_id' => $this->stadium_id,
            'status' => $this->status,
            'deleted' => 0,
            'created_by' => $this->created_by,
            'created_time' => $this->created_time,
            'updated_by' => $this->updated_by,
            'updated_time' => $this->updated_time,
            'sort' => $this->sort,
            'feature_match' => $this->feature_match,
            'hot_match' => $this->hot_match,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'url1', $this->url1])
            ->andFilterWhere(['like', 'url2', $this->url2])
            ->andFilterWhere(['like', 'url3', $this->url3])
            ->andFilterWhere(['like', 'thumb', $this->thumb])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        $query->orderBy(['hot_match'=>SORT_DESC,'feature_match'=>SORT_DESC,'sort'=>SORT_DESC,'start_time'=>SORT_ASC]);

        return $dataProvider;
    }
}

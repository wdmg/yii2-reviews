<?php

namespace wdmg\reviews\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use wdmg\reviews\models\Reviews;

/**
 * ReviewsSearch represents the model behind the search form of `wdmg\reviews\models\Reviews`.
 */
class ReviewsSearch extends Reviews
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'rating', 'is_published'], 'integer'],
            [['name', 'email', 'phone', 'photo', 'condition', 'review', 'advantages', 'disadvantages', 'created_at', 'updated_at', 'session'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Reviews::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'rating' => $this->rating,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_published' => $this->is_published,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'condition', $this->condition])
            ->andFilterWhere(['like', 'review', $this->review])
            ->andFilterWhere(['like', 'advantages', $this->advantages])
            ->andFilterWhere(['like', 'disadvantages', $this->disadvantages])
            ->andFilterWhere(['like', 'session', $this->session]);

        return $dataProvider;
    }
}

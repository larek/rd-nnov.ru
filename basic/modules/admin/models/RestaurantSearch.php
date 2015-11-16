<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Restaurant;

/**
 * RestaurantSearch represents the model behind the search form about `app\models\Restaurant`.
 */
class RestaurantSearch extends Restaurant
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_active'], 'integer'],
            [['title', 'concept', 'menu', 'address_street', 'address_building', 'address_comment', 'time', 'time2', 'phone', 'soc_pagev', 'link', 'email', 'coord_g', 'coord_k', 'updatelink'], 'safe'],
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
        $query = Restaurant::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                    'pageSize' => false,
                ],
            
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'concept', $this->concept])
            ->andFilterWhere(['like', 'menu', $this->menu])
            ->andFilterWhere(['like', 'address_street', $this->address_street])
            ->andFilterWhere(['like', 'address_building', $this->address_building])
            ->andFilterWhere(['like', 'address_comment', $this->address_comment])
            ->andFilterWhere(['like', 'time', $this->time])
            ->andFilterWhere(['like', 'time2', $this->time2])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'soc_pagev', $this->soc_pagev])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'coord_g', $this->coord_g])
            ->andFilterWhere(['like', 'coord_k', $this->coord_k])
            ->andFilterWhere(['like', 'updatelink', $this->updatelink]);

        return $dataProvider;
    }
}

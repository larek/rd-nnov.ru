<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Todolist;

/**
 * TodolistSearch represents the model behind the search form of `app\modules\admin\models\Todolist`.
 */
class TodolistSearch extends Todolist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userId', 'status'], 'integer'],
            [['title', 'params', 'createDate', 'updateDate'], 'safe'],
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
        $query = Todolist::find();

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
            'userId' => $this->userId,
            'status' => $this->status,
            'createDate' => $this->createDate,
            'updateDate' => $this->updateDate,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'params', $this->params]);

        return $dataProvider;
    }
}

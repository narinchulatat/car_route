<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\car;

/**
 * CarSearch represents the model behind the search form of `app\models\car`.
 */
class CarSearch extends car
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id'], 'integer'],
            [['car_name', 'car_size', 'car_seate', 'car_description', 'car_img'], 'safe'],
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
        $query = car::find();

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
            'car_id' => $this->car_id,
        ]);

        $query->andFilterWhere(['like', 'car_name', $this->car_name])
            ->andFilterWhere(['like', 'car_size', $this->car_size])
            ->andFilterWhere(['like', 'car_seate', $this->car_seate])
            ->andFilterWhere(['like', 'car_description', $this->car_description])
            ->andFilterWhere(['like', 'car_img', $this->car_img]);

        return $dataProvider;
    }
}

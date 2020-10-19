<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CarStatus;

/**
 * CarStatusSearch represents the model behind the search form of `app\models\CarStatus`.
 */
class CarStatusSearch extends CarStatus
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_status_id'], 'integer'],
            [['car_status_name', 'car_statust_color'], 'safe'],
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
        $query = CarStatus::find();

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
            'car_status_id' => $this->car_status_id,
        ]);

        $query->andFilterWhere(['like', 'car_status_name', $this->car_status_name])
            ->andFilterWhere(['like', 'car_statust_color', $this->car_statust_color]);

        return $dataProvider;
    }
}

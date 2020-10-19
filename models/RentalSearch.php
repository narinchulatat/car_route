<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rental;

/**
 * RentalSearch represents the model behind the search form of `app\models\Rental`.
 */
class RentalSearch extends Rental
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id', 'car_room', 'car_usefor', 'departments_id', 'car_seate', 'car_status'], 'integer'],
            [['car_start', 'car_end', 'car_user', 'car_tel', 'car_title', 'car_description', 'car_cur_date', 'file'], 'safe'],
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
        $query = Rental::find();

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
            'car_room' => $this->car_room,
            'car_usefor' => $this->car_usefor,
            'departments_id' => $this->departments_id,
            'car_seate' => $this->car_seate,
            'car_status' => $this->car_status,
        ]);

        $query->andFilterWhere(['like', 'car_start', $this->car_start])
            ->andFilterWhere(['like', 'car_end', $this->car_end])
            ->andFilterWhere(['like', 'car_user', $this->car_user])
            ->andFilterWhere(['like', 'car_tel', $this->car_tel])
            ->andFilterWhere(['like', 'car_title', $this->car_title])
            ->andFilterWhere(['like', 'car_description', $this->car_description])
            ->andFilterWhere(['like', 'car_cur_date', $this->car_cur_date])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PersonStatus;

/**
 * PersonStatusSearch represents the model behind the search form of `app\models\PersonStatus`.
 */
class PersonStatusSearch extends PersonStatus
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_status_id'], 'integer'],
            [['person_status_name', 'person_statust_color'], 'safe'],
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
        $query = PersonStatus::find();

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
            'person_status_id' => $this->person_status_id,
        ]);

        $query->andFilterWhere(['like', 'person_status_name', $this->person_status_name])
            ->andFilterWhere(['like', 'person_statust_color', $this->person_statust_color]);

        return $dataProvider;
    }
}

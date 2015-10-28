<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Award;

/**
 * AwardSearch represents the model behind the search form about `app\models\Award`.
 */
class AwardSearch extends Award
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title_th', 'title_en', 'title_l3', 'title_l4', 'title_l5', 'title_l6', 'title_l7', 'title_l8', 'detail_th', 'detail_en', 'detail_l3', 'detail_l4', 'detail_l5', 'detail_l6', 'detail_l7', 'detail_l8', 'pic', 'date_create', 'date_update'], 'safe'],
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
        $query = Award::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
        ]);

        $query->andFilterWhere(['like', 'title_th', $this->title_th])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'title_l3', $this->title_l3])
            ->andFilterWhere(['like', 'title_l4', $this->title_l4])
            ->andFilterWhere(['like', 'title_l5', $this->title_l5])
            ->andFilterWhere(['like', 'title_l6', $this->title_l6])
            ->andFilterWhere(['like', 'title_l7', $this->title_l7])
            ->andFilterWhere(['like', 'title_l8', $this->title_l8])
            ->andFilterWhere(['like', 'detail_th', $this->detail_th])
            ->andFilterWhere(['like', 'detail_en', $this->detail_en])
            ->andFilterWhere(['like', 'detail_l3', $this->detail_l3])
            ->andFilterWhere(['like', 'detail_l4', $this->detail_l4])
            ->andFilterWhere(['like', 'detail_l5', $this->detail_l5])
            ->andFilterWhere(['like', 'detail_l6', $this->detail_l6])
            ->andFilterWhere(['like', 'detail_l7', $this->detail_l7])
            ->andFilterWhere(['like', 'detail_l8', $this->detail_l8])
            ->andFilterWhere(['like', 'pic', $this->pic]);

        return $dataProvider;
    }
}

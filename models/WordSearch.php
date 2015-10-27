<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Word;

/**
 * WordSearch represents the model behind the search form about `\app\models\Word`.
 */
class WordSearch extends Word
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'TH', 'EN', 'L3', 'L4', 'L5', 'L6', 'L7', 'L8'], 'safe'],
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
        $query = Word::find();

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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'TH', $this->TH])
            ->andFilterWhere(['like', 'EN', $this->EN])
            ->andFilterWhere(['like', 'L3', $this->L3])
            ->andFilterWhere(['like', 'L4', $this->L4])
            ->andFilterWhere(['like', 'L5', $this->L5])
            ->andFilterWhere(['like', 'L6', $this->L6])
            ->andFilterWhere(['like', 'L7', $this->L7])
            ->andFilterWhere(['like', 'L8', $this->L8]);

        return $dataProvider;
    }
}

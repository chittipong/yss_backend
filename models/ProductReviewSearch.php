<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductReview;

/**
 * ProductReviewSearch represents the model behind the search form about `app\models\ProductReview`.
 */
class ProductReviewSearch extends ProductReview
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id'], 'integer'],
            [['from', 'comment', 'ip', 'date_create'], 'safe'],
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
        $query = ProductReview::find();

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
            'product_id' => $this->product_id,
            'date_create' => $this->date_create,
        ]);

        $query->andFilterWhere(['like', 'from', $this->from])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'ip', $this->ip]);

        return $dataProvider;
    }
}

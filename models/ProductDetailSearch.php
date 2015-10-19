<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductDetail;

/**
 * ProductDetailSearch represents the model behind the search form about `app\models\ProductDetail`.
 */
class ProductDetailSearch extends ProductDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id'], 'integer'],
            [['title', 'detail', 'lang', 'keyword'], 'safe'],
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
        $query = ProductDetail::find();

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
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'lang', $this->lang])
            ->andFilterWhere(['like', 'keyword', $this->keyword]);

        return $dataProvider;
    }
}

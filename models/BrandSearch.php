<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Brand;

/**
 * BrandSearch represents the model behind the search form about `app\models\Brand`.
 */
class BrandSearch extends Brand
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_id'], 'integer'],
            [['brand', 'logo'], 'safe'],
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
        $query = Brand::find();

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
            'brand_id' => $this->brand_id,
        ]);

        $query->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'logo', $this->logo]);

        return $dataProvider;
    }
}

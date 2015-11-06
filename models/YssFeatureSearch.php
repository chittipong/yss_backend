<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\YssFeature;

/**
 * YssFeatureSearch represents the model behind the search form about `app\models\YssFeature`.
 */
class YssFeatureSearch extends YssFeature
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['feature', 'title', 'description_th', 'description_en', 'remark'], 'safe'],
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
        $query = YssFeature::find();

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

        $query->andFilterWhere(['like', 'feature', $this->feature])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description_th', $this->description_th])
            ->andFilterWhere(['like', 'description_en', $this->description_en])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lang;

/**
 * LangSearch represents the model behind the search form about `app\models\Lang`.
 */
class LangSearch extends Lang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sort_order'], 'integer'],
            [['abb', 'lang_name', 'remark', 'default'], 'safe'],
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
        $query = Lang::find();

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
            'sort_order' => $this->sort_order,
        ]);

        $query->andFilterWhere(['like', 'abb', $this->abb])
            ->andFilterWhere(['like', 'lang_name', $this->lang_name])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'default', $this->default]);

        return $dataProvider;
    }
}

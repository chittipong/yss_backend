<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Importers;

/**
 * ImportersSearch represents the model behind the search form about `app\models\Importers`.
 */
class ImportersSearch extends Importers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'import_cat_id', 'sort_order'], 'integer'],
            [['title', 'pic', 'detil', 'status', 'lang'], 'safe'],
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
        $query = Importers::find();

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
            'import_cat_id' => $this->import_cat_id,
            'sort_order' => $this->sort_order,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'pic', $this->pic])
            ->andFilterWhere(['like', 'detil', $this->detil])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'lang', $this->lang]);

        return $dataProvider;
    }
}

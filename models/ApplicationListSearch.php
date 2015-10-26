<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ApplicationList;

/**
 * ApplicationListSearch represents the model behind the search form about `app\models\ApplicationList`.
 */
class ApplicationListSearch extends ApplicationList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cc', 'length', 'piston', 'shaft'], 'integer'],
            [['brand', 'model', 'ref_no', 'abe1', 'year', 'type', 'product_code', 'abe_shock', 'top', 'bottom', 'spring', 'preload', 'rebound', 'compression', 'length_adjst', 'hydraulic', 'emulsion', 'piggy_back', 'on_host', 'free_piston', 'dtg', 'vehicle_type'], 'safe'],
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
        $query = ApplicationList::find();

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
            'cc' => $this->cc,
            'length' => $this->length,
            'piston' => $this->piston,
            'shaft' => $this->shaft,
        ]);

        $query->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'ref_no', $this->ref_no])
            ->andFilterWhere(['like', 'abe1', $this->abe1])
            ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'product_code', $this->product_code])
            ->andFilterWhere(['like', 'abe_shock', $this->abe_shock])
            ->andFilterWhere(['like', 'top', $this->top])
            ->andFilterWhere(['like', 'bottom', $this->bottom])
            ->andFilterWhere(['like', 'spring', $this->spring])
            ->andFilterWhere(['like', 'preload', $this->preload])
            ->andFilterWhere(['like', 'rebound', $this->rebound])
            ->andFilterWhere(['like', 'compression', $this->compression])
            ->andFilterWhere(['like', 'length_adjst', $this->length_adjst])
            ->andFilterWhere(['like', 'hydraulic', $this->hydraulic])
            ->andFilterWhere(['like', 'emulsion', $this->emulsion])
            ->andFilterWhere(['like', 'piggy_back', $this->piggy_back])
            ->andFilterWhere(['like', 'on_host', $this->on_host])
            ->andFilterWhere(['like', 'free_piston', $this->free_piston])
            ->andFilterWhere(['like', 'dtg', $this->dtg])
            ->andFilterWhere(['like', 'vehicle_type', $this->vehicle_type]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AppList;

/**
 * AppListSearch represents the model behind the search form about `app\models\AppList`.
 */
class AppListSearch extends AppList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cc', 'length', 'piston', 'shaft'], 'integer'],
            [['brand', 'model', 'ref_no', 'abe1', 'year', 'type', 'product_code', 'abe_shock', 'top', 'bottom', 'spring', 'preload', 'rebound', 'compression', 'length_adjust', 'hydraulic', 'emulsion', 'piggy_back', 'on_hose', 'free_piston', 'dtg', 'vehicle_type', 'pic', 'date_create', 'date_update'], 'safe'],
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
        $query = AppList::find();

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
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
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
            ->andFilterWhere(['like', 'length_adjust', $this->length_adjust])
            ->andFilterWhere(['like', 'hydraulic', $this->hydraulic])
            ->andFilterWhere(['like', 'emulsion', $this->emulsion])
            ->andFilterWhere(['like', 'piggy_back', $this->piggy_back])
            ->andFilterWhere(['like', 'on_hose', $this->on_hose])
            ->andFilterWhere(['like', 'free_piston', $this->free_piston])
            ->andFilterWhere(['like', 'dtg', $this->dtg])
            ->andFilterWhere(['like', 'vehicle_type', $this->vehicle_type])
            ->andFilterWhere(['like', 'pic', $this->pic]);

        return $dataProvider;
    }
}

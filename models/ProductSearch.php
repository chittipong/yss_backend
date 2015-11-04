<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'brand_id', 'model_id', 'abeflag', 'hyd', 'emu', 'res','vehicle_type', 'closeflag'], 'integer'],
            [['product_group', 'product_type', 'code', 'type', 'top', 'bot', 'image', 'contenttype', 'image_name', 'Thumbnails', 'spring', 'length', 'piston', 'shaft', 'preload', 'rebound', 'compression', 'length_adjuster', 'hydraulic', 'emulsion', 'piggy_back', 'on_hose', 'free_piston', 'dtg', 'create_by', 'update_by', 'date_create', 'date_update', 'price', 'discount'], 'safe'],
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
        $query = Product::find();

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
            'product_id' => $this->product_id,
            'brand_id' => $this->brand_id,
            'model_id' => $this->model_id,
            'vehicle_type'=>$this->vehicle_type,
            'abeflag' => $this->abeflag,
            'hyd' => $this->hyd,
            'emu' => $this->emu,
            'res' => $this->res,
            'closeflag' => $this->closeflag,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
        ]);

        $query->andFilterWhere(['like', 'product_group', $this->product_group])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'vehicle_type', $this->vehicle_type])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'top', $this->top])
            ->andFilterWhere(['like', 'bot', $this->bot])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'contenttype', $this->contenttype])
            ->andFilterWhere(['like', 'image_name', $this->image_name])
            ->andFilterWhere(['like', 'Thumbnails', $this->Thumbnails])
            ->andFilterWhere(['like', 'spring', $this->spring])
            ->andFilterWhere(['like', 'length', $this->length])
            ->andFilterWhere(['like', 'piston', $this->piston])
            ->andFilterWhere(['like', 'shaft', $this->shaft])
            ->andFilterWhere(['like', 'preload', $this->preload])
            ->andFilterWhere(['like', 'rebound', $this->rebound])
            ->andFilterWhere(['like', 'compression', $this->compression])
            ->andFilterWhere(['like', 'length_adjuster', $this->length_adjuster])
            ->andFilterWhere(['like', 'hydraulic', $this->hydraulic])
            ->andFilterWhere(['like', 'emulsion', $this->emulsion])
            ->andFilterWhere(['like', 'piggy_back', $this->piggy_back])
            ->andFilterWhere(['like', 'on_hose', $this->on_hose])
            ->andFilterWhere(['like', 'free_piston', $this->free_piston])
            ->andFilterWhere(['like', 'dtg', $this->dtg])
            ->andFilterWhere(['like', 'create_by', $this->create_by])
            ->andFilterWhere(['like', 'update_by', $this->update_by])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'discount', $this->discount]);

        return $dataProvider;
    }
}

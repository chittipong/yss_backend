<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\YssModel;

/**
 * YssModelSearch represents the model behind the search form about `app\models\YssModel`.
 */
class YssModelSearch extends YssModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_id', 'brand_id', 'abeflag', 'closeflag'], 'integer'],
            [['model', 'year', 'start', 'end', 'len', 'cc', 'Manafacturer_Code', 'abe', 'imgpath'], 'safe'],
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
        $query = YssModel::find();

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
            'model_id' => $this->model_id,
            'brand_id' => $this->brand_id,
            'abeflag' => $this->abeflag,
            'closeflag' => $this->closeflag,
        ]);

        $query->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'start', $this->start])
            ->andFilterWhere(['like', 'end', $this->end])
            ->andFilterWhere(['like', 'len', $this->len])
            ->andFilterWhere(['like', 'cc', $this->cc])
            ->andFilterWhere(['like', 'Manafacturer_Code', $this->Manafacturer_Code])
            ->andFilterWhere(['like', 'abe', $this->abe])
            ->andFilterWhere(['like', 'imgpath', $this->imgpath]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\YssConfig;

/**
 * YssConfigSearch represents the model behind the search form about `app\models\YssConfig`.
 */
class YssConfigSearch extends YssConfig
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'zipcode'], 'integer'],
            [['company_th', 'company_en', 'tel1', 'tel2', 'tel3', 'fax1', 'fax2', 'default_mail', 'admin_mail', 'support_mail', 'sale_mail', 'contact_mail', 'info_mail', 'address_th', 'address_en', 'district_th', 'district_en', 'province_th', 'province_en', 'date_create', 'date_update', 'update_by'], 'safe'],
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
        $query = YssConfig::find();

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
            'zipcode' => $this->zipcode,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
        ]);

        $query->andFilterWhere(['like', 'company_th', $this->company_th])
            ->andFilterWhere(['like', 'company_en', $this->company_en])
            ->andFilterWhere(['like', 'tel1', $this->tel1])
            ->andFilterWhere(['like', 'tel2', $this->tel2])
            ->andFilterWhere(['like', 'tel3', $this->tel3])
            ->andFilterWhere(['like', 'fax1', $this->fax1])
            ->andFilterWhere(['like', 'fax2', $this->fax2])
            ->andFilterWhere(['like', 'default_mail', $this->default_mail])
            ->andFilterWhere(['like', 'admin_mail', $this->admin_mail])
            ->andFilterWhere(['like', 'support_mail', $this->support_mail])
            ->andFilterWhere(['like', 'sale_mail', $this->sale_mail])
            ->andFilterWhere(['like', 'contact_mail', $this->contact_mail])
            ->andFilterWhere(['like', 'info_mail', $this->info_mail])
            ->andFilterWhere(['like', 'address_th', $this->address_th])
            ->andFilterWhere(['like', 'address_en', $this->address_en])
            ->andFilterWhere(['like', 'district_th', $this->district_th])
            ->andFilterWhere(['like', 'district_en', $this->district_en])
            ->andFilterWhere(['like', 'province_th', $this->province_th])
            ->andFilterWhere(['like', 'province_en', $this->province_en])
            ->andFilterWhere(['like', 'update_by', $this->update_by]);

        return $dataProvider;
    }
}

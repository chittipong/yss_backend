<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contact;

/**
 * ContactSearch represents the model behind the search form about `app\models\Contact`.
 */
class ContactSearch extends Contact
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'zipcode'], 'integer'],
            [['specific_name', 'title', 'address', 'district', 'province', 'phone1', 'phone2', 'phone3', 'fax1', 'fax2', 'fax3', 'default_mail', 'support_mail', 'sale_mail', 'description', 'lang'], 'safe'],
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
        $query = Contact::find();

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
        ]);

        $query->andFilterWhere(['like', 'specific_name', $this->specific_name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'phone1', $this->phone1])
            ->andFilterWhere(['like', 'phone2', $this->phone2])
            ->andFilterWhere(['like', 'phone3', $this->phone3])
            ->andFilterWhere(['like', 'fax1', $this->fax1])
            ->andFilterWhere(['like', 'fax2', $this->fax2])
            ->andFilterWhere(['like', 'fax3', $this->fax3])
            ->andFilterWhere(['like', 'default_mail', $this->default_mail])
            ->andFilterWhere(['like', 'support_mail', $this->support_mail])
            ->andFilterWhere(['like', 'sale_mail', $this->sale_mail])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'lang', $this->lang]);

        return $dataProvider;
    }
}

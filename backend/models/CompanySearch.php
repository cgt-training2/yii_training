<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Company;

/**
 * CompanySearch represents the model behind the search form about `app\models\Company`.
 */
class CompanySearch extends Company
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Company_id'], 'integer'],
            [['Company_name', 'Company_email', 'Company_address', 'Company_profile', 'Company_created', 'Company_status'], 'safe'],
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
        $query = Company::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => (!empty($params['noItemShow'])) ? $params['noItemShow'] : 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        /*$query->andFilterWhere([
            'Company_id' => $this->Company_id,
            'Company_created' => $this->Company_created,
        ]);*/

        /*$query->andFilterWhere(['like', 'Company_name', $this->Company_name])
            ->andFilterWhere(['like', 'Company_email', $this->Company_email])
            ->andFilterWhere(['like', 'Company_address', $this->Company_address])
            ->andFilterWhere(['like', 'Company_profile', $this->Company_profile])
            ->andFilterWhere(['like', 'Company_status', $this->Company_status]);
*/
        $query->orFilterWhere(['like', 'Company_id', $this->Company_name])
            ->orFilterWhere(['like', 'Company_created', $this->Company_name])
            ->orFilterWhere(['like', 'Company_name', $this->Company_name])
            ->orFilterWhere(['like', 'Company_email', $this->Company_name])
            ->orFilterWhere(['like', 'Company_address', $this->Company_name])
            ->orFilterWhere(['like', 'Company_profile', $this->Company_name])
            ->orFilterWhere(['like', 'Company_status', $this->Company_name]);
        return $dataProvider;
    }
    public function count(){
        $count = (new \yii\db\Query())->from('company')->count();
        return $count;
    }
}

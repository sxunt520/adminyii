<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Edify;

/**
 * EdifySearch represents the model behind the search form about `common\models\Edify`.
 */
class EdifySearch extends Edify
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'orderid', 'posttime', 'hits'], 'integer'],
            [['title', 'flag', 'picurl', 'checkinfo', 'source', 'author', 'camera', 'address', 'digest', 'other', 'digestPage', 'px260Pic'], 'safe'],
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
        $query = Edify::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'orderid' => $this->orderid,
            'posttime' => $this->posttime,
            'hits' => $this->hits,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'flag', $this->flag])
            ->andFilterWhere(['like', 'picurl', $this->picurl])
            ->andFilterWhere(['like', 'checkinfo', $this->checkinfo])
            ->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'camera', $this->camera])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'digest', $this->digest])
            ->andFilterWhere(['like', 'other', $this->other])
            ->andFilterWhere(['like', 'digestPage', $this->digestPage])
            ->andFilterWhere(['like', 'px260Pic', $this->px260Pic]);

        return $dataProvider;
    }
}

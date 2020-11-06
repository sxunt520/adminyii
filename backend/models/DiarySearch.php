<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Diary;

/**
 * DiarySearch represents the model behind the search form about `common\models\Diary`.
 */
class DiarySearch extends Diary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cid'], 'integer'],
            [['pic', 'weather', 'date_time', 'address', 'people', 'title', 'content', 'author', 'keyword', 'description'], 'safe'],
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
        $query = Diary::find();

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
            'cid' => $this->cid,
            'date_time' => $this->date_time,
        ]);

        $query->andFilterWhere(['like', 'pic', $this->pic])
            ->andFilterWhere(['like', 'weather', $this->weather])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'people', $this->people])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}

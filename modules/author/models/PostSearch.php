<?php

namespace app\modules\author\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Post;
use Yii;

/**
 * PostSearch represents the model behind the search form of `app\models\Post`.
 */
class PostSearch extends Post
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'theme_id', 'status_id', 'user_id'], 'integer'],
            [['title', 'text', 'theme', 'created', 'updated', 'preview', 'img'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        // var_dump($params);  die;s
        $query = Post::find()->where(['user_id' => Yii::$app->user->id, ])->with(['status', 'theme0', 'comments'// => function ($query) {
            // $query->andWhere(['post_id' => $params['id']]);
            // }
        ]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            
            'sort' => [
                'defaultOrder' => [
                    'updated' => SORT_DESC,
                    'title' => SORT_ASC, 
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'theme_id' => $this->theme_id,
            // 'created' => $this->created,
            'updated' => $this->updated,
            'status_id' => $this->status_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'theme', $this->theme])
            ->andFilterWhere(['like', 'preview', $this->preview])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'created', $this->created]);
            

        return $dataProvider;
    }
}

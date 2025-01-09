<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\VarDumper;
use app\models\Reaction;
/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int|null $theme_id
 * @property string|null $theme
 * @property string $created
 * @property string $updated
 * @property string $preview
 * @property string|null $img
 * @property int $status_id
 * @property int $user_id
 *
 * @property Comment[] $comments
 * @property Reaction[] $reactions
 * @property Status $status
 * @property Theme $theme0
 * @property User $user
 */
class Post extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATETHEME = 'create-theme';
    const SCENARIO_CREATETHEMEID = 'create-theme-id';
    const SCENARIO_UPDATETHEME = 'update-theme';
    const SCENARIO_UPDATETHEMEID = 'update-theme-id';
    public bool $check = false;
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text', 'preview', 'status_id', 'user_id'], 'required'],
            [['text'], 'string'],
            [['theme_id', 'status_id', 'user_id', 'is_moderate'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['title', 'theme', 'preview', 'img'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['theme_id'], 'exist', 'skipOnError' => true, 'targetClass' => Theme::class, 'targetAttribute' => ['theme_id' => 'id']],

           
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'on' => self::SCENARIO_CREATETHEME],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'on' => self::SCENARIO_CREATETHEMEID],            
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'on' => self::SCENARIO_UPDATETHEME],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'on' => self::SCENARIO_UPDATETHEMEID],
            [['check', 'is_moderate'], 'boolean'],
            ['theme', 'required', 'on' => self::SCENARIO_CREATETHEME],
            ['theme_id', 'required', 'on' => self::SCENARIO_CREATETHEMEID],
            ['theme', 'required', 'on' => self::SCENARIO_UPDATETHEME],
            ['theme_id', 'required', 'on' => self::SCENARIO_UPDATETHEMEID],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'text' => 'Текст',
            'theme_id' => 'Тема поста',
            'theme' => 'Своя тема',
            'created' => 'Дата создания',
            'updated' => 'Дата обновления',
            'preview' => 'Превью',
            'img' => 'Изображение',
            'imageFile' => 'Изображение',
            'status_id' => 'Статус',
            'user_id' => 'Автор',
            'check' => 'Другая тема',
            'is_moderate' => 'На модерации',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['post_id' => 'id']);
    }

    /**
     * Gets query for [[Reactions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReactions()
    {
        return $this->hasMany(Reaction::class, ['post_id' => 'id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[Theme0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTheme0()
    {
        return $this->hasOne(Theme::class, ['id' => 'theme_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getLikes()
    {
        return Reaction::find()->where(['post_id' => $this->id, 'reaction' => 1])->count();
    }

    public function getDislikes()
    {
        return Reaction::find()->where(['post_id' => $this->id, 'reaction' => 0])->count();
    }

    public function upload()
    {

        if ($this->validate()) {
            $fileName = Yii::$app->user->id . '_' . time() . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs('uploads/' . $fileName);
            $this->img = $fileName;
            return true;
        } else {

            return false;
        }
    }
}

<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
use app\models\Role;
use yii\web\UploadedFile;
use yii\helpers\VarDumper;
/**
 * registerForm is the model behind the register form.
 */
class RegisterForm extends Model
{
   
 
    public string $name = '';
    public string $surname = '';
    
    public string $patronymic = '';
    
    public string $login = '';
    
    public string $email = '';
    
    public string $password = '';
    public string $password_repeat = '';

    
    public string $phone = '';
    
    public string $avatar = '';
    public bool $rules =  false;
    public $imageFile;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'password_repeat', 'surname', 'login', 'email', 'password', 'phone'], 'required'],
          
            [['name', 'surname', 'patronymic', 'login', 'email', 'password', 'phone', 'password_repeat'], 'string', 'max' => 255],
            [['login'], 'unique','targetClass' => User::class],
            [['login'], 'match', 'pattern' => '/^[a-z\-]+$/i', 'message' => 'Латиница, тире'],
            
            [['email'], 'unique','targetClass' => User::class],
            ['email', 'email'],
            [['password'], 'string', 'min' => 6],
            [['password'], 'match', 'pattern' => '/^[a-z0-9]+$/i', 'message' => 'Латиница, цифры'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            [['name', 'surname', 'patronymic'], 'match', 'pattern' => '/^[А-ЯЁ]{1}[А-ЯЁа-яё\s\-]+$/u', 'message' => 'Первая буква - заглавная, кириллица, пробел, тире'],
            [['phone'], 'match', 'pattern' => '/^\+7\([\d]{3}\)\-[\d]{3}(\-[\d]{2}){2}$/', 'message' => '+7(XXX)-XXX-XX-XX'],
            ['rules', 'required', 'requiredValue' => true, 'message' => 'Необходимо согласие с правилами регистрации'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
          
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'login' => 'Логин',
            'email' => 'Эл. почта',
            'password' => 'Пароль',
            'phone' => 'Телефон',
            'avatar' => 'Аватарка',
            'password_repeat' => 'Подтверждение пароля',
            'rules' => 'Cогласие с правилами регистрации',
            'imageFile' => 'Аватарка'
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function register()
    {
        $user = null;
        
        if ($this->validate()) {

            $user = new User();

            if (!is_null($this->imageFile)) {
                $this->upload(); 
            }

            $user->attributes = $this->attributes;
            $user->password = Yii::$app->security->generatePasswordHash($this->password);
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->role_id = Role::getRole('user');
            
            if (!$user->save(false)) {

            }
            
            
        }
        return $user ?? null;
    }

    public function upload()
    {

        $fileName = Yii::$app->user->id . '_' . time() . '_' . Yii::$app->security->generateRandomString() . '.' . $this->imageFile->extension;

        $this->imageFile->saveAs('avatars/' . $fileName);
        $this->avatar = $fileName;
        return true;
    }
    
}

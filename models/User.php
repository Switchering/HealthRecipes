<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $isAdmin
 * @property string $photo
 *
 * @property Comment[] $comments
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isAdmin','isSubscriber'], 'integer'],
            [['name', 'email', 'password', 'photo', 'about'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Почта',
            'password' => 'Пароль',
            'isAdmin' => 'Админ',
            'photo' => 'Фото',
            'about' => 'Обо мне',
            'isSubscriber'=>'Подписчик'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_id' => 'id']);
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function findByName($name)
    {
        return User::find()->where(['name'=>$name])->one();
    }

    public static function findByEmail($email)
    {
        return User::find()->where(['email'=>$email])->one();
    }

    public function validatePassword($password)
    {
        return ($this->password == $password) ? true:false;
    }

    public function create()
    {
        return $this->save(false);
    }

    public function saveFromVk($uid, $name, $photo)
    {
        $user = User::findOne($uid);
        if($user)
        {
            return Yii::$app->user->login($user);
        }
        $this->id = $uid;
        $this->name = $name;
        $this->photo = $photo;
        $this->create();

        Yii::$app->user->login($this);
    }

    public function getImage()
    {
        return $this->photo;
    }

    public function getArticles()
    {
        return $this->hasMany(Article::className(),['user_id'=>'id']);
    }

    public function makeSubscriber($email)
    {
      $newsub = $this->findByEmail($email);  
      if ($newsub != null)
      {
        $newsub->isSubscriber = 1;
        $newsub->save();
      }
    }

    public function sendMail($view, $subject, $articles, $categories,$subscribes)
    {
        // Set layout params
        \Yii::$app->mailer->getView()->params['name'] = $this->name;

        $result = \Yii::$app->mailer->compose([
            'html' => 'views/' . $view . '-html',
            'text' => 'views/' . $view . '-text'
        ], ['articles' => $articles, 'categories' => $categories])
            ->setTo($subscribes)
            ->setSubject($subject)
            ->send();

        // Reset layout params
        \Yii::$app->mailer->getView()->params['name'] = null;

        return $result;
    }

    public function getAuthKey()
    {

    }

    public function validateAuthKey($authKey)
    {

    }

    public static function findIdentityByAccessToken($token, $type = null)
    {

    }
}

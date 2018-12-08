<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\data\Pagination;
/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $date
 * @property string $image
 * @property int $viewed
 * @property int $user_id
 * @property int $status
 * @property int $category_id
 *
 * @property ArticleTag[] $articleTags
 * @property Comment[] $comments
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'description','content'],'string'],
            [['category_id'], 'integer'],
            [['image'], 'string'],
            [['title'],'string','max'=>255],
            [['date'],'date','format'=>'php:Y-m-d'],
            [['date'],'default','value'=>date('Y-m-d')],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'content' => 'Контент',
            'date' => 'Дата',
            'image' => 'Изображение',
            'viewed' => 'Просмотров',
            'user_id' => 'Автор',
            'status' => 'Статус',
            'category_id' => 'Категория',
        ];
    }

    public function saveArticle()
    {
        $this->user_id = Yii::$app->user->id;
        return $this->save();
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/' . $this->image : '/uploads/no-image.jpg';
    }

    public function deleteImage()
    {
     $imageUpLoadModel = new ImageUpload();
     $imageUpLoadModel->deleteCurrentImage($this->image);

    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete();
    }

    public function getCategory()
    {
     return $this->hasOne(Category::className(), ['id'=>'category_id']);
    }

    public function saveCategory($category_id)
    {
     $category = Category::findOne($category_id);
     if ($category != null)
     {
        $this->link('category', $category);
        return true;
     }
    }

    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id'=>'tag_id'])->viaTable('article_tag', ['article_id'=>'id']);
    }

    public function getSelectedTags()
    {
        $selectedIds = $this->getTags()->select('id')->asArray()->all();

        return ArrayHelper::getColumn($selectedIds, 'id');
    }

    public function saveTags($tags)
    {
        if (is_array($tags))
        {
            ArticleTag::deleteAll(['article_id'=>$this->id]);
            foreach($tags as $tag_id)
            {
                $tag = Tag::findOne($tag_id);
                $this->link('tags', $tag);
            }
        }
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }

     public static function getAll($pageSize = 5)
    {
        // build a DB query to get all articles
        $query = Article::find()->orderBy('date desc');
        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();
        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        // limit the query using the pagination and retrieve the articles
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['articles'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }

    public static function getPopular()
    {
        return Article::find()->orderBy('viewed desc')->limit(3)->all();
    }

    public static function getRecent()
    {
        return Article::find()->orderBy('date desc')->limit(3)->all();
    }

    public static function getRelated($id)
    {
        $article = Article::findOne($id);
        return Article::find()->where(['user_id'=>$article->user_id])->limit(3)->all();
    }

    public static function getPrevious($id)
    {
        $article = Article::find()->where(['id'=>($id-1)])->one();
        if($article!=null)
        {
            return $article;
        }
        else
        {
            $article = Article::find()->orderBy('viewed desc')->one();
            return $article;
        }
    }

    public static function getNext($id)
    {
        $article = Article::find()->where(['id'=>($id+1)])->one();
        if($article != null)
        {
            return $article;
        }
        else
        {
            $article = Article::find()->orderBy('viewed asc')->one();
            return $article;
        }
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['article_id'=>'id']);
    }

    public function getArticleComments()
    {
        return $this->getComments()->where(['status'=>1])->all();
    }

    public function getCommentsCount()
    {
        return $this->getComments()->where(['status'=>1])->count();
//        if($count !=null)
//        {
//            return $count;
//        }
//        else
//        {
//            return 0;
//        }
    }

    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id'=>'user_id']);
    }

    public function viewedCounter()
    {
        $this->viewed += 1;
        return $this->save(false);
    }
}

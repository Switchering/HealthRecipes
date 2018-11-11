<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'image' => 'Image'
        ];
    }
    
    public function saveImage($filename) 
    {
        $this->image = $filename;
        return $this->save(false);
    }
    
    public function getImage() 
    {    
        return ($this->image) ? '/uploads/' . $this->image : 'public/images/no-image.png';
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
    
    public function getArticles() 
    {
        return $this->hasMany(Article::className(),['category_id'=>'id']);
    }
    
    public function getArticlesCount() 
    {
        return $this->getArticles()->count();
    }
    
    public function getAll() 
    {
        $categories = Category::find()->all();
        
        return $categories;
    }
    
    public static function getArticlesByCategory($id)
    {
        // build a DB query to get all articles
        $query = Article::find()->where(['category_id'=>$id])->orderBy('date desc');
        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();
        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>3]);
        // limit the query using the pagination and retrieve the articles
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
        $data['articles'] = $articles;
        $data['pagination'] = $pagination;
        
        return $data;
    }
    
    
}

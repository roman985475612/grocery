<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\Pagination;
use yii\web\UploadedFile;

class Product extends AbstractModel
{
    const IMAGE_URL = '/images/';

    public $old_img = '';

    public static function tableName()
    {
        return '{{%product}}';
    }
    
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['category_id', 'is_offer'], 'integer'],
            [['price', 'old_price'], 'number'],
            [['price', 'old_price'], 'default', 'value' => 0],
            [['keywords', 'description', 'img'], 'string'],
            [['img'], 'image'],
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public static function all()
    {
        return static::find()->with('category')->all();
    }

    public static function getList()
    {
        $query = static::find()->with('category');

        $pagination = new Pagination([
            'totalCount'     => $query->count(),
            'pageSize'       => 4,
            'forcePageParam' => false,
            'pageSizeParam'  => false,
        ]);

        $objects = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return [
            'objects'    => $objects,
            'pagination' => $pagination,
        ];
    }

    public static function getListByCategory($category)
    {
        $query = static::find()->where(['category_id' => $category->id]);

        $pagination = new Pagination([
            'totalCount'     => $query->count(),
            'pageSize'       => 4,
            'forcePageParam' => false,
            'pageSizeParam'  => false,
        ]);

        $objects = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return [
            'objects'    => $objects,
            'pagination' => $pagination,
        ];
    }

    public static function getListBySearch($q)
    {
        $query = static::find()->where(['like', 'title', $q]);

        $pagination = new Pagination([
            'totalCount'     => $query->count(),
            'pageSize'       => 4,
            'forcePageParam' => false,
            'pageSizeParam'  => false,
        ]);

        $objects = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return [
            'objects'    => $objects,
            'pagination' => $pagination,
        ];
    }

    public static function getOffers()
    {
        return static::find()
                        ->where(['is_offer' => 1])
                        ->limit(4)
                        ->all();
    }

    public function getImage()
    {
        $path = Yii::getAlias('@web') . static::IMAGE_URL;

        if ( empty( $this->img ) )
            return $path . 'no-image.png';
        else 
            return $path . $this->img;
    }

    private function generateFilename($imageFile)
    {
        $subdir = date('Y').'/'
                 .date('m').'/'
                 .date('d'); 

        $pathname = Yii::getAlias("@webroot") 
                   .static::IMAGE_URL
                   .$subdir;

        if ( !file_exists( $pathname ) )
            mkdir( $pathname, 0777, true );

        $filename = $subdir . '/' 
                   .md5(uniqid($imageFile->baseName)).'.'
                   .$imageFile->extension;
        
        $filename = strtolower($filename);

        return $filename;
    }

    public function setImage()
    {
        $imageFile = UploadedFile::getInstance($this, 'img');
        if (is_null($imageFile)) {
            if (!empty($this->old_img)) {
                $this->img = $this->old_img;
            }
            return;
        }

        $filename = $this->generateFilename($imageFile);

        $path = Yii::getAlias("@webroot")
               .static::IMAGE_URL 
               .$filename;
        
        $imageFile->saveAs($path);
        
        static::deleteFile($this->old_img);        

        $this->img = $filename;
    }

    public static function deleteFile($filename)
    {
        $path = Yii::getAlias('@webroot') . static::IMAGE_URL;

        if ( !empty($filename) && file_exists($path . $filename) ) {
            unlink($path . $filename);
        }
    }

    public function beforeSave($insert)
    {
        $this->setImage($this->img);

        return parent::beforeSave($insert);
    }

    public function beforeDelete()
    {
        static::deleteFile($this->img);

        return parent::beforeDelete();
    }

}
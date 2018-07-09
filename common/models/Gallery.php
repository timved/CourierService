<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "galleries".
 *
 * @property string $guid
 * @property string $img
 * @property string $description
 *
 * @property NewsGalleries[] $newsGalleries
 * @property Tags[] $tags
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'galleries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['guid'], 'required'],
            [['description'], 'string'],
//            [['guid'], 'string', 'max' => 36],
//            [['img'], 'string', 'max' => 255],
//            [['guid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'guid' => 'Guid',
            'img' => 'Картинка',
            'description' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsGalleries()
    {
        return $this->hasMany(NewsGalleries::className(), ['guid_gallery' => 'guid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['gallery_guid' => 'guid']);
    }

    public function findGallery($gallery)
    {
        $mass =[];
        foreach($gallery as  $key => $value) {
            $mass[$key] = $value;
        }

        $mass2=[];
        $keys = ['id','name'];
        foreach ($gallery->tags as $value) {
            $mass2[$value->id] =  $value->name;

//            var_dump($value);
//            foreach ($value as   $item) {
//                $mass2['id'] = $value->id;
//            }
//            $mass2['name'] = $value->name;
//            foreach ($value as  $key => $item){
//                var_dump($key);
//            }
        }
$mass3 =[];
//         $mass4 = array_fill_keys($keys, $mass2);
//        $mass3 = array_combine($a, $b);
        $k= array_keys($mass2);
        $v= array_values($mass2);
        $mass3['id'] = $k;
        $mass3['name'] = $v;
//        foreach ($mass2 as $key => $value){
//            $mass3['id'] = $k;
//            $mass3['name'] = $v;
////            $mass3['name'] = $value;
////            var_dump($key);
////            $mass3[] = $key;
//
//        }
//        $mass['tags'] = $mass2;
//        var_dump($mass3);
        return $mass3;
    }
}

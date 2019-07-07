<?php

namespace common\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "post".
 */
class Post extends \yii\db\ActiveRecord
{
    private $_oldTags;

    const POST_TYPE_NORMAL = 0;
    const POST_TYPE_SYSTEM = 1;

    public static function postType(){
        return [
            self::POST_TYPE_NORMAL => '普通',
            self::POST_TYPE_SYSTEM => '系统'
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'type'], 'required'],
            [['content', 'tags', 'key'], 'string'],
            [['valid', 'type', 'create_time', 'update_time', 'author_id'], 'integer'],
            [['title'], 'string', 'max' => 128],
         ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'key' => '索引值',
            'type' => '类型',
            'tags' => '标签',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
            'author_id' => '作者',
            'valid' => '状态',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id']);
    }

    public function getActiveComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id'])
            ->where('status=:status',[':status'=>2])->orderBy('id DESC');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Adminuser::className(), ['id' => 'author_id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($insert){
                $this->create_time=time();
                $this->update_time=time();
            }else{
                $this->update_time=time();
            }
            return true;

        }else{
            return false;
        }

    }

    public function afterFind()
    {
        parent::afterFind(); // TODO: Change the autogenerated stub
        $this->_oldTags = $this->tags;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
        Tag::updateFrequency($this->_oldTags,$this->tags);
    }

    public function afterDelete()
    {
        parent::afterDelete(); // TODO: Change the autogenerated stub
        Tag::updateFrequency($this->tags,'');
    }

    public function getUrl(){

        return Yii::$app->urlManager->createUrl(
            ['post/detail','id' => $this->id,
            'title' => $this->title]);
    }

    public function getBeginning($length=288)
    {
        $tmpStr = strip_tags($this->content);
        $tmpLen = mb_strlen($tmpStr);

        $tmpStr = mb_substr($tmpStr,0,$length,'utf-8');
        return $tmpStr.($tmpLen>$length?'...':'');
    }

    public function  getTagLinks()
    {
        $links=array();
        foreach(Tag::string2array($this->tags) as $tag)
        {
            $links[]=Html::a(Html::encode($tag),array('post/index','PostSearch[tags]'=>$tag));
        }
        return $links;
    }

    public function getCommentCount()
    {
        return Comment::find()->where(['post_id'=>$this->id,'status'=>2])->count();
    }


}

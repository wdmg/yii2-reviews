<?php

namespace wdmg\reviews\models;

use Yii;

/**
 * This is the model class for table "{{%reviews}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $photo
 * @property string $condition
 * @property string $review
 * @property int $rating
 * @property string $advantages
 * @property string $disadvantages
 * @property string $created_at
 * @property string $updated_at
 * @property string $session
 * @property int $is_published
 *
 * @property Users $user
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%reviews}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $rules = [
            [['user_id', 'rating', 'is_published'], 'integer'],
            [['name', 'email', 'condition', 'session'], 'required'],
            [['review'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email', 'phone', 'session'], 'string', 'max' => 32],
            [['photo', 'condition'], 'string', 'max' => 64],
            [['advantages', 'disadvantages'], 'string', 'max' => 255],
        ];

        if(class_exists('\wdmg\users\models\Users') && isset(Yii::$app->modules['users']))
            $rules[] = [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \wdmg\users\models\Users::className(), 'targetAttribute' => ['user_id' => 'id']];

        return $rules;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/modules/reviews', 'ID'),
            'user_id' => Yii::t('app/modules/reviews', 'User ID'),
            'name' => Yii::t('app/modules/reviews', 'Name'),
            'email' => Yii::t('app/modules/reviews', 'Email'),
            'phone' => Yii::t('app/modules/reviews', 'Phone'),
            'photo' => Yii::t('app/modules/reviews', 'Photo'),
            'condition' => Yii::t('app/modules/reviews', 'Condition'),
            'review' => Yii::t('app/modules/reviews', 'Review'),
            'rating' => Yii::t('app/modules/reviews', 'Rating'),
            'advantages' => Yii::t('app/modules/reviews', 'Advantages'),
            'disadvantages' => Yii::t('app/modules/reviews', 'Disadvantages'),
            'created_at' => Yii::t('app/modules/reviews', 'Created At'),
            'updated_at' => Yii::t('app/modules/reviews', 'Updated At'),
            'session' => Yii::t('app/modules/reviews', 'Session'),
            'is_published' => Yii::t('app/modules/reviews', 'Is Published'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}

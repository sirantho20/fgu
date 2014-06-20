<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\behaviors;

use yii\db\BaseActiveRecord;
use yii\db\Expression;

/**
 * TimestampBehavior automatically fills the specified attributes with the current timestamp.
 *
 * To use TimestampBehavior, simply insert the following code to your ActiveRecord class:
 *
 * ```php
 * use yii\behaviors\TimestampBehavior;
 *
 * public function behaviors()
 * {
 *     return [
 *         TimestampBehavior::className(),
 *     ];
 * }
 * ```
 *
 * By default, TimestampBehavior will fill the `created_at` and `updated_at` attributes with the current timestamp
 * when the associated AR object is being inserted; it will fill the `updated_at` attribute
 * with the timestamp when the AR object is being updated. The timestamp value is obtained by `time()`.
 *
 * If your attribute names are different or you want to use a different way of calculating the timestamp,
 * you may configure the [[attributes]] and [[value]] properties like the following:
 *
 * ```php
 * use yii\db\Expression;
 *
 * public function behaviors()
 * {
 *     return [
 *         'timestamp' => [
 *             'class' => TimestampBehavior::className(),
 *             'attributes' => [
 *                 ActiveRecord::EVENT_BEFORE_INSERT => 'creation_time',
 *                 ActiveRecord::EVENT_BEFORE_UPDATE => 'update_time',
 *             ],
 *             'value' => new Expression('NOW()'),
 *         ],
 *     ];
 * }
 * ```
 *
 * TimestampBehavior also provides a method named [[touch()]] that allows you to assign the current
 * timestamp to the specified attribute(s) and save them to the database. For example,
 *
 * ```php
 * $this->timestamp->touch('creation_time');
 * ```
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class TimestampBehavior extends AttributeBehavior
{
    /**
     * @var array list of attributes that are to be automatically filled with timestamps.
     * The array keys are the ActiveRecord events upon which the attributes are to be filled with timestamps,
     * and the array values are the corresponding attribute(s) to be updated. You can use a string to represent
     * a single attribute, or an array to represent a list of attributes.
     * The default setting is to update both of the `created_at` and `updated_at` attributes upon AR insertion,
     * and update the `updated_at` attribute upon AR updating.
     */
    public $attributes = [
        BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
        BaseActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
    ];
    /**
     * @var callable|Expression The expression that will be used for generating the timestamp.
     * This can be either an anonymous function that returns the timestamp value,
     * or an [[Expression]] object representing a DB expression (e.g. `new Expression('NOW()')`).
     * If not set, it will use the value of `time()` to set the attributes.
     */
    public $value;

    /**
     * @inheritdoc
     */
    protected function getValue($event)
    {
        if ($this->value instanceof Expression) {
            return $this->value;
        } else {
            return $this->value !== null ? call_user_func($this->value, $event) : time();
        }
    }

    /**
     * Updates a timestamp attribute to the current timestamp.
     *
     * ```php
     * $model->touch('lastVisit');
     * ```
     * @param string $attribute the name of the attribute to update.
     */
    public function touch($attribute)
    {
        $this->owner->updateAttributes(array_fill_keys((array) $attribute, $this->getValue(null)));
    }
}

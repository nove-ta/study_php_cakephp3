<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $item_id
 * @property string $name
 * @property int $category_id
 * @property int $width
 * @property int $depth
 * @property int $height
 * @property int $num
 * @property string $memo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Category $category
 */
class Item extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'category_id' => true,
        'width' => true,
        'depth' => true,
        'height' => true,
        'num' => true,
        'memo' => true,
        'created' => true,
        'modified' => true,
        'category' => true
    ];
}

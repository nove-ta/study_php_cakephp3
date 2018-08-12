<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Want Entity
 *
 * @property int $want_id
 * @property string $name
 * @property int $category_id
 * @property int $width_min
 * @property int $width_max
 * @property int $depth_min
 * @property int $depth_max
 * @property int $height_min
 * @property int $height_max
 * @property int $num
 * @property string $memo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Category $category
 */
class Want extends Entity
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
        'width_min' => true,
        'width_max' => true,
        'depth_min' => true,
        'depth_max' => true,
        'height_min' => true,
        'height_max' => true,
        'num' => true,
        'memo' => true,
        'created' => true,
        'modified' => true,
        'category' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BestItem Entity
 *
 * @property int $user_id
 * @property int $item_id
 * @property int $want_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\Want $want
 */
class BestItem extends Entity
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
        'user_id' => true,
        'item_id' => true,
        'want_id' => true,
        'created' => true,
        'updated' => true,
        'user' => true,
        'item' => true,
        'want' => true
    ];
}

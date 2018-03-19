<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Adv Entity
 *
 * @property int $id
 * @property int $device_id
 * @property string $name
 * @property bool $active_flag
 * @property string $path
 * @property string $url_link
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Device $device
 */
class Adv extends Entity
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
        '*' => true,
        'id' => false
    ];
}

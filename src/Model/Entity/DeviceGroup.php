<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DeviceGroup Entity
 *
 * @property int $id
 * @property int $adgroup_id
 * @property string $device_id
 * @property string $back_ground
 * @property string $path
 * @property string $number_pass
 * @property string $tile_name
 * @property string $device_name
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\Adgroup $adgroup
 * @property \App\Model\Entity\Device $device
 */
class DeviceGroup extends Entity
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

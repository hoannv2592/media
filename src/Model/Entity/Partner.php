<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Partner Entity
 *
 * @property int $id
 * @property int $device_id
 * @property string $client_mac
 * @property string $auth_target
 * @property string $apt_device_number
 * @property string $num_clients_connect
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Device $device
 */
class Partner extends Entity
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

    const ROLE_MALE = 1;
    const ROLE_FEMALE = 2;

    public static $sex = array(
        Partner::ROLE_MALE => 'NAM',
        Partner::ROLE_FEMALE => 'NỮ'
    );
}

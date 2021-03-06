<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Device Entity
 *
 * @property int $id
 * @property string $apt_key
 * @property string $password
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 *
 * @property \App\Model\Entity\User $user
 * @property bool delete_flag
 * @property bool status
 */
class Device extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    const LANDING_ONE = 1;
    const LANDING_TOW = 2;
    const LANDING_THREE = 3;

    public static $langding_page = array(
        Device::LANDING_ONE => 'Quảng Cáo với Facebook',
        Device::LANDING_TOW => 'Quảng cáo với hình ảnh',
        Device::LANDING_THREE => 'Quảng Cáo với voucher',
    );
}

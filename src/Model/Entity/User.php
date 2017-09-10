<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property int $status
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $delete_flag
 * @property int $phone
 * @property int $adgroup_id
 * @property string $address
 * @property int $role
 * @property int $landingpage_id
 * @property int $device_id
 * @property int $service_group_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 *
 * @property \App\Model\Entity\Adgroup $adgroup
 * @property \App\Model\Entity\Landingpage $landingpage
 * @property \App\Model\Entity\Device $device
 * @property \App\Model\Entity\ServiceGroup $service_group
 */
class User extends Entity
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
	
	 protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }

    const ROLE_ONE = 1;
    const ROLE_TOW = 2;

    public static $role = array(
        User::ROLE_ONE => 'Admin',
        User::ROLE_TOW => 'User thường'
    );
}

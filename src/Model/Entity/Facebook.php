<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Facebook Entity
 *
 * @property int $id
 * @property int $campaign_group_id
 * @property int $confirm
 * @property string $mac
 * @property string $name
 * @property string $email
 * @property int $device_id
 * @property string $link_login_only
 * @property string $birthday
 * @property string $client_mac
 * @property string $apt_device_pass
 * @property string $address
 * @property string $phone
 * @property string $auth_target
 * @property string $role
 * @property int $sex
 * @property int $num_clients_connect
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $flag_face
 *
 * @property \App\Model\Entity\CampaignGroup $campaign_group
 * @property \App\Model\Entity\Device $device
 */
class Facebook extends Entity
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

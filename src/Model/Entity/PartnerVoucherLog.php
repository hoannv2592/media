<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PartnerVoucherLog Entity
 *
 * @property int $id
 * @property int $campaign_group_id
 * @property string $num_clients_connect
 * @property string $client_mac
 * @property bool $confirm
 * @property int $user_id
 * @property string $full_name
 * @property string $birthday
 * @property string $telephone
 * @property string $address
 * @property int $device_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\CampaignGroup $campaign_group
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Device $device
 */
class PartnerVoucherLog extends Entity
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

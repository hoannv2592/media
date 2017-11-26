<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Report Entity
 *
 * @property int $id
 * @property string $tile_congratulations
 * @property int $random
 * @property string $name
 * @property string $time
 * @property int $number_voucher
 * @property string $path
 * @property string $device_name
 * @property string $device_id
 * @property int $delete_flag
 * @property string $image_backgroup
 * @property string $tile_name
 * @property int $langdingpage_id
 * @property string $message
 * @property string $slogan
 * @property string $description
 * @property string $apt_device_number
 * @property string $address
 * @property int $user_id_campaign_group
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Device $device
 * @property \App\Model\Entity\Langdingpage $langdingpage
 */
class Report extends Entity
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

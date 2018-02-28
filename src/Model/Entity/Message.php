<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $id
 * @property string $client_mac
 * @property string $phone
 * @property int $options
 * @property int $delete_flag
 * @property int $confirm
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Message extends Entity
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

    const ROLE_ONE = 1;
    const ROLE_TOW = 2;
    const ROLE_THREE = 3;

    public static $opption = array(
        Message::ROLE_ONE => '1 Lựa chọn',
        Message::ROLE_TOW => '2 Lựa chọn',
        Message::ROLE_THREE => '3 Lựa chọn'
    );
}

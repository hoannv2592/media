<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CampaignGroup Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 * @property int $delete_flag
 */
class CampaignGroup extends Entity
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

    const RANDOM_ONE = 1;
    const RANDOM_TOW = 2;

    public static $random = array(
        CampaignGroup::RANDOM_ONE => 'Random thông thường',
        CampaignGroup::RANDOM_TOW => 'Random Fix cứng',
    );
}

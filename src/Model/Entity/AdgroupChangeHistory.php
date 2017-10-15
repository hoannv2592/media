<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdgroupChangeHistory Entity
 *
 * @property int $id
 * @property int $adgroup_id
 * @property string $contents
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Adgroup $adgroup
 */
class AdgroupChangeHistory extends Entity
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
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param $data
     * @return RulesChecker
     * @internal param RulesChecker $rules The rules object to be modified.
     */
    public function saveChangeadGroup($data)
    {
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $change_log = $this->newEntity();
        $change_log = $this->patchEntity($change_log, $data);
        $chk = true;
        if (empty($change_log->errors())) {
            if (!$this->save($change_log)) {
                $chk = false;
            }
        }
        if ($chk) {
            $conn->commit();
            return true;
        } else {
            $conn->rollback();
            return false;
        }

    }
}

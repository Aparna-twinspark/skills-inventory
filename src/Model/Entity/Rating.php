<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rating Entity.
 *
 * @property string $employee_id
 * @property \App\Model\Entity\Employee $employee
 * @property string $skill_id
 * @property \App\Model\Entity\Skill $skill
 * @property string $rating
 */
class Rating extends Entity
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
        'employee_id' => false,
        'skill_id' => false,
    ];
}

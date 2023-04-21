<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ParentType extends Enum
{
    const Father = "Father";
    const Mother = "Mother";
    const Stepfather = "Stepfather";
    const Stepmother = "Stepmother";
    const Grandfather = "Grandfather";
    const Grandmonther = "Grandmonther";
    const Uncle = "Uncle";
    const Aunt = "Aunt";
    const MaleGuardian = "Male Guardian";
    const FemaleGuardian = "Female Guardian";
}

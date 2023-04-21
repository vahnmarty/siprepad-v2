<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class LivingSituationType extends Enum
{
    const LivesWithStudentFullTime = "Lives With Student Full Time";
    const LivesWithStudentPartTime = "Lives With Student Part Time";
    const DoesNotLiveWithStudent = "Does Not Live With Student";
}

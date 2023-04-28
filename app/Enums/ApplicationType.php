<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ApplicationType extends Enum
{
    const NewRegistration = 0;
    const ReRegistration = 1;
    const Transfer = 2;
}

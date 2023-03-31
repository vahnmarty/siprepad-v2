<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RaceType extends Enum
{
    const Asian = 0;
    const Black = 1;
    const White = 2;
}

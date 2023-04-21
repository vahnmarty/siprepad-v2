<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PerformingArtsType extends Enum
{
    const Choir = "Choir";
    const JazzBand = "Jazz Band";
    const Dance = "Dance";
}

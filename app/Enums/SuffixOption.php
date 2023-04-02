<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SuffixOption extends Enum
{
    const Jr = "Jr";
    const Sr = "Sr";
    const II = "II";
    const III = "III";
    const IV = "IV";
    const V = "V";
}

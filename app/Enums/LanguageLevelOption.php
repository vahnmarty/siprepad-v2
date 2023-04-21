<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class LanguageLevelOption extends Enum
{
    const OptionOne = "I speak this language every day";
    const OptionTwo = "I understand this language but do not speak this language";
    const OptionThree = "I speak this language occasionally with family and/or friends";
}

<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class LanguageOption extends Enum
{
    const French = "French";
    const Latin = "Latin";
    const Mandarin = "Mandarin";
    const Spanish = "Spanish";
}

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
    const SpeakEveryDay = "I speak this language every day";
    const UnderstandButNotSpeak = "I understand this language but do not speak this language";
    const SpeakOccasionally = "I speak this language occasionally with family and/or friends";


    public static function asSameArray(): array
    {
        $array = static::asArray();
        $selectArray = [];

        foreach ($array as $value) {
            $selectArray[$value] = $value;
        }

        return $selectArray;
    }
}

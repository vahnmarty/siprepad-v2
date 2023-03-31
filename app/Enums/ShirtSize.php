<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ShirtSize extends Enum
{
    const Small = 'S';
    const Medium = 'M';
    const Large = 'L';
    const ExtraLarge = 'XL';
}

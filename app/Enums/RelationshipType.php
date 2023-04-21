<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RelationshipType extends Enum
{
    const AuntUncle = "Aunt/Uncle";
    const BrotherSister = "Brother/Sister";
    const Grandparent = "Grandparent";
    const Neighbor = "Neighbor";
    const Friend = "Friend";
    const Other = "Other";
}

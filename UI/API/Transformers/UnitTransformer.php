<?php

/**
 * ERP system
 *
 * This file is part of the ERM system package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license     https://kalistratov.ru/licenses/erp Proprietary license
 * @copyright   Copyright (C) kalistratov.ru, All rights reserved ©.
 * @link        https://kalistratov.ru
 * @author      Sergey Kalistratov <sergey@kalistratov.ru>
 */

namespace App\Containers\Vendor\Unit\UI\API\Transformers;

use App\Containers\Vendor\Unit\Foundation\Unit;
use App\Containers\Vendor\Unit\Models\Unit as UnitModel;
use App\Ship\Parents\Transformers\Transformer;

class UnitTransformer extends Transformer
{
    public function transform(UnitModel $unit): array
    {
        return [
            OBJECT => $unit->getResourceKey(),
            ID => $unit->getHashedKey(),
            Unit::NAME => $unit->name,
            DELETED_AT => $this->nullOrTimestamp($unit->deleted_at)
        ];
    }
}

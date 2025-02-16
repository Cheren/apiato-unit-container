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

use App\Containers\Vendor\Unit\Models\Unit as UnitModel;

final class AdminUnitTransformer extends UnitTransformer
{
    public function transform(UnitModel $unit): array
    {
        return parent::transform($unit) +
            [
                $this->realKey(ID) => $unit->id
            ];
    }
}

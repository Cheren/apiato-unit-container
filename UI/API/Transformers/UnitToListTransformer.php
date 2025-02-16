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

use App\Containers\Vendor\Unit\Models\Unit;
use App\Ship\Transformers\ToListTransformer;
use Illuminate\Database\Eloquent\Model;

class UnitToListTransformer extends ToListTransformer
{
    public function getDefaultTitle(Model|Unit $model): string
    {
        return $model->name;
    }
}

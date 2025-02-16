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

namespace App\Containers\Vendor\Unit\Tasks;

use App\Containers\Vendor\Unit\Foundation\Unit;
use Illuminate\Pagination\LengthAwarePaginator;

class GetAllUnitsTask extends UnitTask
{
    public function run(): LengthAwarePaginator
    {
        return $this->repository
            ->orderBy(Unit::NAME)
            ->paginate();
    }
}

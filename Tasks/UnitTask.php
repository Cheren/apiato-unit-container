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

use App\Containers\Vendor\Unit\Data\Repositories\UnitRepository;
use App\Ship\Parents\Tasks\Task;

abstract class UnitTask extends Task
{
    protected UnitRepository $repository;

    public function __construct(UnitRepository $repository)
    {
        $this->repository = $repository;
    }
}

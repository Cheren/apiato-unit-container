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

namespace App\Containers\Vendor\Unit\Actions;

use App\Containers\Vendor\Unit\Models\Unit;
use App\Containers\Vendor\Unit\Tasks\FindUnitByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action;

class FindUnitByIdAction extends Action
{
    /**
     * @param int $id
     * @return Unit
     * @throws NotFoundException
     */
    public function run(int $id): Unit
    {
        return app(FindUnitByIdTask::class)->run($id);
    }
}

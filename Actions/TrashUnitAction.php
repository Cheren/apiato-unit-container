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

use App\Containers\Vendor\Unit\Tasks\TrashUnitTask;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Actions\Action;

class TrashUnitAction extends Action
{
    /**
     * @param int $id
     * @return int|null
     * @throws DeleteResourceFailedException
     */
    public function run(int $id): ?int
    {
        return app(TrashUnitTask::class)->run($id);
    }
}

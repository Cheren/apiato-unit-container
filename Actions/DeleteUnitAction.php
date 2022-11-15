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

use App\Containers\Vendor\Unit\Tasks\DeleteUnitTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Exceptions\DeleteResourceFailedException;

class DeleteUnitAction extends Action
{
    /**
     * @param int $id
     * @return int|null
     * @throws DeleteResourceFailedException
     */
    public function run(int $id): ?int
    {
        return app(DeleteUnitTask::class)->run($id);
    }
}

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
use App\Containers\Vendor\Unit\Tasks\UpdateUnitTask;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action;

class UpdateUnitAction extends Action
{
    /**
     * @param int $id
     * @param string $name
     * @return Unit
     * @throws UpdateResourceFailedException
     */
    public function run(int $id, string $name): Unit
    {
        return app(UpdateUnitTask::class)->run($id, $name);
    }
}

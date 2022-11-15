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

use App\Containers\Vendor\Unit\Models\Unit;
use App\Ship\Exceptions\UpdateResourceFailedException;
use Exception;

class UpdateUnitTask extends UnitTask
{
    /**
     * @param int $id
     * @param string $name
     * @return Unit
     * @throws UpdateResourceFailedException
     */
    public function run(int $id, string $name): Unit
    {
        try {
            return $this->repository->update(['name' => $name], $id);
        } catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}

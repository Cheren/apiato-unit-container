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

namespace App\Containers\Vendor\Unit\Data\Seeders;

use App\Containers\AppSection\Authorization\Dto\CreatePermissionDto;
use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Containers\Vendor\Unit\Access\UnitPermissions;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UnitPermissionsSeeder extends Seeder
{
    /**
     * @return void
     * @throws CreateResourceFailedException
     * @throws UnknownProperties
     */
    public function run(): void
    {
        $createPermissionTask = app(CreatePermissionTask::class);

        (new UnitPermissions())
            ->getList()
            ->each(function (CreatePermissionDto $permissionDto) use ($createPermissionTask) {
                $createPermissionTask->run($permissionDto);
            });
    }
}

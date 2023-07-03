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

namespace App\Containers\Vendor\Unit\Access;

use App\Ship\Access\Permission;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UnitPermissions extends Permission
{
    public const CREATE = 'unit-create';
    public const READ = 'unit-read';
    public const UPDATE = 'unit-update';
    public const DELETE = 'unit-delete';

    /**
     * @return Collection
     * @throws UnknownProperties
     */
    public function getList(): Collection
    {
        return collect([
            $this->createPermissionDto(self::READ),
            $this->createPermissionDto(self::CREATE),
            $this->createPermissionDto(self::UPDATE),
            $this->createPermissionDto(self::DELETE)
        ]);
    }

    public function getRealSection(): string
    {
        return 'vendor';
    }

    public function getSection(): string
    {
        return 'list';
    }

    public function getContainer(): string
    {
        return 'unit';
    }
}

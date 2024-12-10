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

namespace App\Containers\Vendor\Unit\Permissions;

use App\Containers\AppSection\Authorization\Permission\Schema\PermissionsCollection;
use App\Containers\Vendor\Unit\Permissions\Schemas\CreateSchema;
use App\Containers\Vendor\Unit\Permissions\Schemas\DeleteSchema;
use App\Containers\Vendor\Unit\Permissions\Schemas\ReadSchema;
use App\Containers\Vendor\Unit\Permissions\Schemas\UpdateSchema;
use App\Ship\Access\PermissionsSchema;

final class Schema extends PermissionsSchema
{
    /**
     * @return PermissionsCollection
     */
    public function schema(): PermissionsCollection
    {
        return $this->schema
            ->add((new CreateSchema($this))->getSchema())
            ->add((new ReadSchema($this))->getSchema())
            ->add((new UpdateSchema($this))->getSchema())
            ->add((new DeleteSchema($this))->getSchema());
    }
}

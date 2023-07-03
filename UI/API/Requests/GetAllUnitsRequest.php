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

namespace App\Containers\Vendor\Unit\UI\API\Requests;

use Apiato\Core\Abstracts\Models\UserModel as User;
use App\Containers\Vendor\Unit\Access\UnitPermissions;
use App\Containers\Vendor\Unit\Requests\UnitApiRequest;
use App\Containers\Vendor\Unit\UI\API\Transformers\UnitToListTransformer;
use App\Ship\Parents\Transformers\Transformer;

class GetAllUnitsRequest extends UnitApiRequest
{
    protected array $access = [
        'permissions' => UnitPermissions::READ,
        'roles' => ''
    ];

    public function hasAccess(User $user = null): bool
    {
        if ($this->isToList()) {
            $this->clearAccess();
        }

        return parent::hasAccess($user);
    }

    public function getTransformer(): Transformer
    {
        return $this->isToList() ? new UnitToListTransformer() : parent::getTransformer();
    }
}

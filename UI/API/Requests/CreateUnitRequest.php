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

use App\Containers\Vendor\Unit\Permissions\Permissions;
use App\Containers\Vendor\Unit\Requests\UnitApiRequest;
use App\Ship\Collections\ValidationRules;

class CreateUnitRequest extends UnitApiRequest
{
    protected array $access = [
        'permissions' => Permissions::CREATE,
        'roles' => ''
    ];

    public function getUnitNameRules(): ValidationRules
    {
        return parent::getUnitNameRules()->addRequired();
    }

    public function rules(): array
    {
        return [
            'name' => $this->getUnitNameRules()
        ];
    }
}

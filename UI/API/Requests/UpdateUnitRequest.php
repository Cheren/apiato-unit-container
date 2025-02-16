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
use App\Ship\Collections\ValidationRules;
use App\Ship\Traits\Request\HasInputId;
use Illuminate\Validation\Rules\Unique;

class UpdateUnitRequest extends CreateUnitRequest
{
    use HasInputId;

    protected array $access = [
        PERMISSIONS => Permissions::UPDATE
    ];

    protected array $decode = [
        ID
    ];

    protected array $urlParameters = [
        ID
    ];

    public function rules(): array
    {
        return parent::rules() +
            [
                ID => $this->getUnitIdValidationRules()
            ];
    }

    public function getUnitIdValidationRules(): ValidationRules
    {
        return parent::getUnitIdValidationRules()->addRequired();
    }

    public function getUnitNameUniqueValidationRule(): Unique
    {
        return parent::getUnitNameUniqueValidationRule()->ignore($this->getId());
    }
}

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

namespace App\Containers\Vendor\Unit\Traits;

use App\Containers\Vendor\Unit\Foundation\Unit;
use App\Containers\Vendor\Unit\Models\Unit as UnitModel;
use App\Ship\Collections\ValidationRules;
use App\Ship\Parents\Validation\Rule;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Validation\Rules\Unique;

trait HasUnitValidationRules
{
    /**
     * @deprecated Please use getUnitIdValidationRules method.
     */
    public function getUnitIdRules(): ValidationRules
    {
        return $this->getUnitIdValidationRules();
    }

    public function getUnitIdValidationRules(): ValidationRules
    {
        return validation_rules([
            $this->getUnitIdExistsValidationRule()
        ]);
    }

    /**
     * @deprecated Please use getUnitNameValidationRules method.
     */
    public function getUnitNameRules(): ValidationRules
    {
        return $this->getUnitNameValidationRules();
    }

    public function getUnitNameValidationRules(): ValidationRules
    {
        return validation_rules([
            $this->getUnitNameUniqueValidationRule(),
            $this->getUnitNameMaxValidationRule()
        ])->addString();
    }

    public function getUnitIdExistsValidationRule(): Exists
    {
        return Rule::exists(UnitModel::TABLE, ID);
    }

    public function getUnitNameUniqueValidationRule(): Unique
    {
        return Rule::unique(UnitModel::TABLE, Unit::NAME);
    }

    public function getUnitNameMaxValidationRule(): string
    {
        return 'max:' . Unit::NAME_MAX_LENGTH;
    }
}

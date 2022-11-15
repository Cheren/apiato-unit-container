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

use App\Ship\Collections\ValidationRules;

trait HasUnitValidationRules
{
    public function getUnitIdRules(): ValidationRules
    {
        return validation_rules(config('vendor-unit.rules.id'));
    }

    public function getUnitNameRules(): ValidationRules
    {
        return validation_rules(config('vendor-unit.rules.name'));
    }
}

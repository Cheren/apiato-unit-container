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

namespace App\Containers\Vendor\Unit\Requests;

use App\Containers\Vendor\Unit\Traits\HasUnitValidationRules;
use App\Containers\Vendor\Unit\UI\API\Transformers\AdminUnitTransformer;
use App\Containers\Vendor\Unit\UI\API\Transformers\UnitTransformer;
use App\Ship\Contracts\GettableTransformer;
use App\Ship\Parents\Transformers\Transformer;
use App\Ship\Requests\ApiRequest;

abstract class UnitApiRequest extends ApiRequest implements GettableTransformer
{
    use HasUnitValidationRules;

    public function getTransformer(): Transformer
    {
        return $this->isAdminUser() ? new AdminUnitTransformer() : new UnitTransformer();
    }
}

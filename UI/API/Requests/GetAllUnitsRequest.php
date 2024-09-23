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

use App\Containers\Vendor\Unit\Access\UnitPermissions;
use App\Containers\Vendor\Unit\Requests\UnitApiRequest;
use App\Containers\Vendor\Unit\UI\API\Transformers\UnitToListTransformer;
use App\Ship\Contracts\IsListableRequest;
use App\Ship\Traits\Request\ListableTransformerRequest;

class GetAllUnitsRequest extends UnitApiRequest implements IsListableRequest
{
    use ListableTransformerRequest;

    protected array $access = [
        PERMISSIONS => UnitPermissions::READ
    ];

    public function getToListTransformer(): UnitToListTransformer
    {
        return new UnitToListTransformer();
    }
}

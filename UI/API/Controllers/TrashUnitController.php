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

namespace App\Containers\Vendor\Unit\UI\API\Controllers;

use App\Containers\Vendor\Unit\Actions\TrashUnitAction;
use App\Containers\Vendor\Unit\UI\API\Requests\TrashUnitRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class TrashUnitController extends ApiController
{
    /**
     * @param TrashUnitRequest $request
     * @param TrashUnitAction $action
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function __invoke(TrashUnitRequest $request, TrashUnitAction $action): JsonResponse
    {
        $action->run($request->getId());
        return $this->noContent();
    }
}

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

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\Vendor\Unit\Actions\FindUnitByIdAction;
use App\Containers\Vendor\Unit\UI\API\Requests\FindUnitByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class FindUnitByIdController extends ApiController
{
    /**
     * @param FindUnitByIdRequest $request
     * @param FindUnitByIdAction $action
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function __invoke(FindUnitByIdRequest $request, FindUnitByIdAction $action): JsonResponse
    {
        return $this->json(
            $this->transform(
                $action->run($request->getId()),
                $request->getTransformer()
            )
        );
    }
}

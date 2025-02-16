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
use App\Containers\Vendor\Unit\Actions\CreateUnitAction;
use App\Containers\Vendor\Unit\UI\API\Requests\CreateUnitRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateUnitController extends ApiController
{
    /**
     * @param CreateUnitRequest $request
     * @param CreateUnitAction $action
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     */
    public function __invoke(CreateUnitRequest $request, CreateUnitAction $action): JsonResponse
    {
        return $this->created(
            $this->transform(
                $action->run($request->getName()),
                $request->getTransformer()
            )
        );
    }
}

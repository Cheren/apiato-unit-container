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
use App\Containers\Vendor\Unit\Actions\UpdateUnitAction;
use App\Containers\Vendor\Unit\UI\API\Requests\UpdateUnitRequest;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class UpdateUnitController extends ApiController
{
    /**
     * @param UpdateUnitRequest $request
     * @param UpdateUnitAction $action
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function __invoke(UpdateUnitRequest $request, UpdateUnitAction $action): JsonResponse
    {
        $unit = $action->run(
            $request->getId(),
            $request->getName()
        );

        return $this->json(
            $this->transform(
                $unit,
                $request->getTransformer()
            )
        );
    }
}

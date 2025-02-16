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

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\Vendor\Unit\Actions\GetAllUnitsAction;
use App\Containers\Vendor\Unit\UI\API\Requests\GetAllUnitsRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllUnitsController extends ApiController
{
    /**
     * @param GetAllUnitsRequest $request
     * @param GetAllUnitsAction $action
     * @return JsonResponse
     * @throws CoreInternalErrorException
     * @throws InvalidTransformerException
     * @throws RepositoryException
     */
    public function __invoke(GetAllUnitsRequest $request, GetAllUnitsAction $action): JsonResponse
    {
        $unitList = $action->run();
        return $this->json(
            $this->transform(
                $unitList,
                $request->getTransformer(),
                [],
                $this->getBaseMetaResponseForGetAllAction(__CLASS__, $unitList->total())
            )
        );
    }
}

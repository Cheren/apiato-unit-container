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
use App\Containers\Vendor\Unit\Actions\CreateUnitAction;
use App\Containers\Vendor\Unit\Actions\DeleteUnitAction;
use App\Containers\Vendor\Unit\Actions\FindUnitByIdAction;
use App\Containers\Vendor\Unit\Actions\GetAllUnitsAction;
use App\Containers\Vendor\Unit\Actions\UpdateUnitAction;
use App\Containers\Vendor\Unit\UI\API\Requests\CreateUnitRequest;
use App\Containers\Vendor\Unit\UI\API\Requests\DeleteUnitRequest;
use App\Containers\Vendor\Unit\UI\API\Requests\FindUnitByIdRequest;
use App\Containers\Vendor\Unit\UI\API\Requests\GetAllUnitsRequest;
use App\Containers\Vendor\Unit\UI\API\Requests\UpdateUnitRequest;
use App\Containers\Vendor\Unit\UI\API\Transformers\UnitTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class Controller extends ApiController
{
    /**
     * @param CreateUnitRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createUnit(CreateUnitRequest $request): JsonResponse
    {
        $unit = app(CreateUnitAction::class)->run($request->get('name'));
        return $this->created($this->transform($unit, UnitTransformer::class));
    }

    /**
     * @param DeleteUnitRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteUnit(DeleteUnitRequest $request): JsonResponse
    {
        app(DeleteUnitAction::class)->run((int) $request->id);
        return $this->noContent();
    }

    /**
     * @param FindUnitByIdRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findUnitById(FindUnitByIdRequest $request): JsonResponse
    {
        $unit = app(FindUnitByIdAction::class)->run((int) $request->id);
        return $this->json($this->transform($unit, UnitTransformer::class));
    }

    /**
     * @param GetAllUnitsRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function getAllUnits(GetAllUnitsRequest $request): JsonResponse
    {
        $unitList = app(GetAllUnitsAction::class)->run();
        return $this->json($this->transform($unitList, UnitTransformer::class));
    }

    /**
     * @param UpdateUnitRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateUnit(UpdateUnitRequest $request): JsonResponse
    {
        $unit = app(UpdateUnitAction::class)->run((int) $request->id, $request->get('name'));
        return $this->json($this->transform($unit, UnitTransformer::class));
    }
}

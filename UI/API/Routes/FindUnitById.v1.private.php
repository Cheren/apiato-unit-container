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
 *
 * @apiGroup Units
 * @apiName findByUnit
 *
 * @api {get} /v1/units/:id Получить по id
 * @apiDescription Получить единицу измерения по ID
 *
 * @apiVersion 1.0.0
 * @apiPermission Аутентифицированный пользователь
 *
 * @apiParam id Уникальный идентификатор еденицы измерения.
 *
 * @apiUse UnitSuccessSingleResponse
 *
 * @apiSuccessExample  {json} Успешный ответ:
HTTP/1.1 204 No content
 *
 * @apiExample {js} NodeJS Axios:
const axios = require('axios');

let config = {
    method: 'get',
    url: 'api.domain.test/v1/units/NxOpZowo9GmjKqdR',
    headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer {access_token}',
        'Content-Type': 'application/x-www-form-urlencoded',
        'Cookie': 'refreshToken={refresh_token}'
    }
};

axios(config);
 */

use App\Containers\Vendor\Unit\Facades\Container;
use App\Containers\Vendor\Unit\UI\API\Controllers\FindUnitByIdController;
use Illuminate\Support\Facades\Route;

Route::get(Container::getApiUri('{' . ID . '}'), FindUnitByIdController::class)
    ->name('api_unit_find_unit_by_id')
    ->middleware(['auth:api']);

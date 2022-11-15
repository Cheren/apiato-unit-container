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
 * @apiGroup           Units
 * @apiName            deleteUnit
 *
 * @api                {DELETE} /v1/units/:id Удалить
 * @apiDescription     Удалить еденицу измерения
 *
 * @apiVersion         1.0.0
 * @apiPermission      Аутентифицированный администратор
 *
 * @apiSuccessExample  {json} Успешный ответ:
HTTP/1.1 204 No content
 *
 * @apiExample {js} NodeJS Axios:
const axios = require('axios');

let config = {
    method: 'delete',
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

use App\Containers\Vendor\Unit\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::delete('units/{id}', [Controller::class, 'deleteUnit'])
    ->name('api_unit_delete_unit')
    ->middleware(['auth:api']);

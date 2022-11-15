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
 * @apiName            updateUnit
 *
 * @api                {POST} /v1/units/:id Обновить
 * @apiDescription     Обновить единицу измерения
 *
 * @apiVersion         1.0.0
 * @apiPermission      Аутентифицированный администратор
 *
 * @apiParam           {String{1..50}} name Название ед. измерения
 *
 * @apiUse             UnitSuccessSingleResponse
 *
 * @apiExample {js} NodeJS Axios:
const axios = require('axios');
const qs = require('qs');
let data = qs.stringify({
    'name': 'unit'
});

let config = {
    method: 'patch',
    url: 'api.domain.test/v1/units/RVmdrKwB125Q7Ob1',
    headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer {access_token}',
        'Content-Type': 'application/x-www-form-urlencoded',
        'Cookie': 'refreshToken={refresh_token}'
    },
    data: data
};

axios(config);
 */

use App\Containers\Vendor\Unit\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::patch('units/{id}', [Controller::class, 'updateUnit'])
    ->name('api_unit_update_unit')
    ->middleware(['auth:api']);

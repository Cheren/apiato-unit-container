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
 * @apiName            getAllUnits
 *
 * @api                {GET} /v1/units Список
 * @apiDescription     Получить список сотупных едениц измерения.
 *
 * @apiParam           {String="list"} [to] Привести список к формату title, value
 *
 * @apiVersion         1.0.0
 * @apiPermission      Аутентифицированный пользовательт
 *
 * @apiSuccessExample   {json} Успешный ответ:
HTTP/1.1 200 OK
{
    "data": [
        {
            "object": "Unit",
            "id": "pJxe0mwAewonZBMP",
            "name": "Га",
            "deleted_at": null
        },
        {
            "object": "Unit",
            "id": "ax5M1y2g9zKPBJNo",
            "name": "День",
            "deleted_at": null
        }
    ],
    "meta": {
        "include": [],
        "custom": [],
        "pagination": {
            "total": 25,
            "count": 2,
            "per_page": 2,
            "current_page": 1,
            "total_pages": 3,
            "links": {
                "next": "http://api.erp.loc/v1/units?page=2"
            }
        }
    }
}
 * @apiSuccessExample   {json} Успешный ответ для ?to=list:
HTTP/1.1 200 OK
{
    "data": [
        {
            "value": "pJxe0mwAewonZBMP",
            "title": "Га"
        },
        {
            "value": "ax5M1y2g9zKPBJNo",
            "title": "День"
        },
        {
            "value": "AvgPq4zr3Gb07ykZ",
            "title": "Ед."
        }
    ],
    "meta": {
        "include": [],
        "custom": [],
        "pagination": {
            "total": 25,
            "count": 3,
            "per_page": 10,
            "current_page": 1,
            "total_pages": 3,
            "links": {
                "next": "http://api.erp.loc/v1/units?to=list&page=2"
            }
        }
    }
}
 *
 * @apiExample {js} NodeJS Axios:
const axios = require('axios');

let config = {
    method: 'get',
    url: 'api.domain.test/v1/units',
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

Route::get('units', [Controller::class, 'getAllUnits'])
    ->name('api_unit_get_all_units')
    ->middleware(['auth:api']);

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

use App\Containers\Vendor\Unit\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('units', [Controller::class, 'getAllUnits'])
    ->name('api_unit_get_all_units')
    ->middleware(['auth:api']);

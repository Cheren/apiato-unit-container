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

namespace App\Containers\Vendor\Unit\Tests\Unit\Actions;

use App\Containers\Vendor\Unit\Actions\GetAllUnitsAction;
use App\Containers\Vendor\Unit\Tests\UnitTestCase;
use Illuminate\Pagination\LengthAwarePaginator;

final class GetAllUnitsActionTest extends UnitTestCase
{
    public function testSuccess(): void
    {
        $this->assertInstanceOf(LengthAwarePaginator::class, app(GetAllUnitsAction::class)->run());
    }
}

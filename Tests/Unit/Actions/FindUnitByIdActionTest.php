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

use App\Containers\Vendor\Unit\Actions\FindUnitByIdAction;
use App\Containers\Vendor\Unit\Models\Unit;
use App\Containers\Vendor\Unit\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;

final class FindUnitByIdActionTest extends UnitTestCase
{
    public function testFailedWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);
        app(FindUnitByIdAction::class)->run(125325243);
    }

    public function testSuccess(): void
    {
        $unit = Unit::factory()->create();
        $result = app(FindUnitByIdAction::class)->run($unit->id);

        $this->assertInstanceOf(Unit::class, $unit);
        $this->assertSame($unit->id, $result->id);
        $this->assertSame($unit->name, $result->name);
    }
}

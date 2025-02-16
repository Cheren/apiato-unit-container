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

use App\Containers\Vendor\Unit\Foundation\Unit;
use App\Containers\Vendor\Unit\Models\Unit as UnitModel;
use App\Containers\Vendor\Unit\Tasks\CreateUnitTask;
use App\Containers\Vendor\Unit\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;

final class CreateUnitActionTest extends UnitTestCase
{
    public function testSuccess(): void
    {
        $unit = app(CreateUnitTask::class)->run('p/m');
        $this->assertInstanceOf(UnitModel::class, $unit);
        $this->assertSame('p/m', $unit->name);
    }

    public function testFailedWithHasUniqueName(): void
    {
        $this->expectException(CreateResourceFailedException::class);

        $unit = UnitModel::factory()
            ->create([
                Unit::NAME => 'mm/p'
            ]);

        app(CreateUnitTask::class)->run($unit->name);
    }
}

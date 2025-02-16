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

use App\Containers\Vendor\Unit\Actions\UpdateUnitAction;
use App\Containers\Vendor\Unit\Foundation\Unit;
use App\Containers\Vendor\Unit\Models\Unit as UnitModel;
use App\Containers\Vendor\Unit\Tests\UnitTestCase;
use App\Ship\Exceptions\UpdateResourceFailedException;

final class UpdateUnitActionTest extends UnitTestCase
{
    public function testFailedWithInvalidId(): void
    {
        $this->expectException(UpdateResourceFailedException::class);
        app(UpdateUnitAction::class)->run(1123124, 'test');
    }

    public function testFailedWithHasUniqueName(): void
    {
        $this->expectException(UpdateResourceFailedException::class);

        UnitModel::factory()
            ->create([
                Unit::NAME => 'unit'
            ]);

        $unit = UnitModel::factory()
            ->create([
                Unit::NAME => 'm/p'
            ]);

        app(UpdateUnitAction::class)->run($unit->id, 'unit');
    }

    public function testSuccess(): void
    {
        $unit = UnitModel::factory()
            ->create([
                Unit::NAME => 'unit'
            ]);

        $newName = 'unit/test';
        $unit = app(UpdateUnitAction::class)->run($unit->id, $newName);

        $this->assertInstanceOf(UnitModel::class, $unit);
        $this->assertSame($newName, $unit->name);
    }
}

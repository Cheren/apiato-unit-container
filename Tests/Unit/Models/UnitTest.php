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

namespace App\Containers\Vendor\Unit\Tests\Unit\Models;

use App\Containers\Vendor\Unit\Foundation\Unit;
use App\Containers\Vendor\Unit\Models\Unit as UnitModel;
use App\Containers\Vendor\Unit\Tests\UnitTestCase;

final class UnitTest extends UnitTestCase
{
    protected UnitModel $model;

    public function setUp(): void
    {
        parent::setUp();
        $this->model = new UnitModel();
    }

    public function testTimestamp(): void
    {
        $this->assertFalse($this->model->timestamps);
    }

    public function testModelTableName(): void
    {
        $this->assertSame(UnitModel::TABLE, $this->model->getTable());
    }

    public function testGetResourceKey(): void
    {
        $this->assertSame(UnitModel::RESOURCE_KEY, $this->model->getResourceKey());
    }

    public function testFillable(): void
    {
        $this->assertArrayValues($this->model->getFillable(), [
            Unit::NAME
        ]);
    }

    public function testAttributesCast(): void
    {
        $unit = UnitModel::factory()
            ->create([
                Unit::NAME => 1
            ]);

        $this->assertIsString($unit->name);
        $this->assertSame('1', $unit->name);
    }
}

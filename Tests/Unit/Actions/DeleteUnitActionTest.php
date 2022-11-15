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

use App\Containers\Vendor\Unit\Actions\DeleteUnitAction;
use App\Containers\Vendor\Unit\Models\Unit;
use App\Containers\Vendor\Unit\Tests\TestCase;
use App\Ship\Exceptions\DeleteResourceFailedException;

class DeleteUnitActionTest extends TestCase
{
    public function testFailedWithInvalidId(): void
    {
        $this->expectException(DeleteResourceFailedException::class);
        app(DeleteUnitAction::class)->run(123135);
    }

    public function testSuccess(): void
    {
        $unit = Unit::factory()->create();
        $this->assertSame(1, app(DeleteUnitAction::class)->run($unit->id));
        $this->isSoftDeletableModel($unit);
        $this->assertSoftDeleted(Unit::TABLE, ['id' => $unit->id]);
    }
}

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

namespace App\Containers\Vendor\Unit\Tests\Functional\API;

use App\Containers\Vendor\Unit\Facades\Container;
use App\Containers\Vendor\Unit\Foundation\Unit;
use App\Containers\Vendor\Unit\Models\Unit as UnitModel;
use App\Containers\Vendor\Unit\Permissions\Permissions;
use App\Containers\Vendor\Unit\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

final class UpdateUnitTest extends ApiTestCase
{
    protected array $access = [
        PERMISSIONS => Permissions::UPDATE
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->endpoint = 'patch@v1/' . Container::getApiUri('{' . ID . '}');
    }

    public function testFailedWithNoAccess(): void
    {
        $this->getTestingUser(null, [
            PERMISSIONS => ''
        ]);

        $unit = UnitModel::factory()
            ->create([
                Unit::NAME => 'tu'
            ]);

        $this->makeCall([
            Unit::NAME => $unit->name
        ]);

        $this->assertActionIsUnauthorized();
    }

    public function testSuccess(): void
    {
        $unit = UnitModel::factory()
            ->create([
                Unit::NAME => 'tu'
            ]);

        $newName = 'new-name';

        $this
            ->injectId($unit->id)
            ->makeCall([
                Unit::NAME => $newName
            ]);

        $this->response->assertOk();

        $this->response->assertJson(
            fn (AssertableJson $json): AssertableJson => $json
                ->has('data')
                ->where('data.' . OBJECT, UnitModel::RESOURCE_KEY)
                ->where('data.' . ID, $unit->getHashedKey())
                ->where('data.' . Unit::NAME, $newName)
                ->etc()
        );
    }
}

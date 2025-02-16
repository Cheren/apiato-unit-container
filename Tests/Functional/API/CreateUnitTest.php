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

final class CreateUnitTest extends ApiTestCase
{
    protected array $access = [
        PERMISSIONS => Permissions::CREATE
    ];
    
    public function setUp(): void
    {
        parent::setUp();
        $this->endpoint = 'post@v1/' . Container::getApiUri();
    }

    public function testStringValidationRule(): void
    {
        $this->makeCall([
            Unit::NAME => 123
        ]);

        $this->assertGivenDataWasInvalid();

        $this->response->assertJson(
            fn (AssertableJson $json): AssertableJson => $json
                ->has('errors')
                ->where('errors.' . Unit::NAME, [
                    __('validation.custom.name.string')
                ])
                ->etc()
        );
    }

    public function testMaxValidationRule(): void
    {
        $this->makeCall([
            Unit::NAME => $this->faker->text()
        ]);

        $this->assertGivenDataWasInvalid();

        $this->response->assertJson(
            fn (AssertableJson $json): AssertableJson => $json
                ->has('errors')
                ->where('errors.' . Unit::NAME, [
                    __('validation.custom.name.max', [
                        'max' => Unit::NAME_MAX_LENGTH
                    ])
                ])
                ->etc()
        );
    }

    public function testUniqueValidationRule(): void
    {
        $unit = UnitModel::factory()
            ->create([
                Unit::NAME => 'unit'
            ]);

        $this->makeCall([
            Unit::NAME => $unit->name
        ]);

        $this->assertGivenDataWasInvalid();

        $this->response->assertJson(
            fn (AssertableJson $json): AssertableJson => $json
                ->has('errors')
                ->where('errors.' . Unit::NAME, [
                    __('validation.custom.name.unique')
                ])
                ->etc()
        );
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
        $this->makeCall([
            Unit::NAME => 'b/p'
        ]);

        $this->response->assertCreated();

        $this->response->assertJson(
            fn (AssertableJson $json): AssertableJson => $json
                ->has('data')
                ->where('data.' . OBJECT, UnitModel::RESOURCE_KEY)
                ->where('data.' . Unit::NAME, 'b/p')
                ->where('data.' . DELETED_AT, null)
                ->etc()
        );
    }
}

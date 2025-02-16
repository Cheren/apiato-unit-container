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
use App\Containers\Vendor\Unit\Models\Unit;
use App\Containers\Vendor\Unit\Permissions\Permissions;
use App\Containers\Vendor\Unit\Tests\Functional\ApiTestCase;
use App\Ship\Requests\ApiRequest;
use Illuminate\Support\Collection;
use Illuminate\Testing\Fluent\AssertableJson;

final class GetAllUnitsTest extends ApiTestCase
{
    protected array $access = [
        PERMISSIONS => Permissions::READ
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->endpoint = 'get@v1/' . Container::getApiUri();
    }

    public function test(): void
    {
        $defaultCount = Unit::count();

        $units = Unit::factory()
            ->count(10)
            ->create();

        $this->makeCall();

        $this->response->assertOk();

        $this->response->assertJson(
            fn(AssertableJson $json): AssertableJson => $json
                ->has('meta')
                ->where('meta.pagination.total', $units->count() + $defaultCount)
                ->etc()
        );
    }

    public function testWithToList(): void
    {
        Unit::factory()
            ->count(12)
            ->create();

        $this
            ->endpoint($this->endpoint . '?to=' . ApiRequest::TO_LIST_VALUE)
            ->makeCall();

        $this->response->assertOk();

        $this->response->assertJson(
            fn(AssertableJson $json): AssertableJson => $json
                ->has('meta')
                ->where('data', function (Collection $units) {
                    $units->each(function ($unit) {
                        $this->assertSame([
                            VALUE,
                            TITLE,
                        ], array_keys($unit));
                    });

                    return true;
                })
                ->etc()
        );
    }
}

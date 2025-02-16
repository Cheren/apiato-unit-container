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
use Illuminate\Testing\Fluent\AssertableJson;

final class TrashUnitTest extends ApiTestCase
{
    protected array $access = [
        PERMISSIONS => Permissions::DELETE
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->endpoint = 'delete@v1/' . Container::getApiUri('{' . ID . '}');
    }

    public function testInvalidId(): void
    {
        $this
            ->injectId(142643)
            ->makeCall();

        $this->assertGivenDataWasInvalid();

        $this->response->assertJson(
            fn (AssertableJson $json): AssertableJson => $json
                ->has('errors')
                ->where('errors.' . ID, [
                    __('validation.custom.id.exists')
                ])
                ->etc()
        );
    }

    public function testSuccess(): void
    {
        $unit = Unit::factory()->create();

        $this
            ->injectId($unit->id)
            ->makeCall();

        $this->response->assertNoContent();

        $this->assertSoftDeleted(Unit::TABLE, [
            ID => $unit->id
        ]);
    }

    public function testFailedWithNoAccess(): void
    {
        $this->getTestingUser(null, [
            PERMISSIONS => ''
        ]);

        $unit = Unit::factory()->create();

        $this
            ->injectId($unit->id)
            ->makeCall();

        $this->assertActionIsUnauthorized();
    }
}

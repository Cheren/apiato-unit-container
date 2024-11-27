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

namespace App\Containers\Vendor\Unit\UI\API\Tests\Functional;

use App\Containers\Vendor\Unit\Permissions\Permissions;
use App\Containers\Vendor\Unit\Models\Unit;
use App\Containers\Vendor\Unit\Tests\ApiTestCase;
use Illuminate\Http\Response;

class CreateUnitTest extends ApiTestCase
{
    protected array $access = [
        'permissions' => Permissions::CREATE,
        'roles' => ''
    ];

    protected string $endpoint = 'post@v1/units';

    public function testStringValidationRule(): void
    {
        $response = $this->makeCall([
            'name' => 123
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $this->assertValidationErrorContain([
            'name' => __('validation.custom.name.string')
        ]);
    }

    public function testMaxValidationRule(): void
    {
        $response = $this->makeCall([
            'name' => $this->faker->text()
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $this->assertValidationErrorContain([
            'name' => __('validation.custom.name.max', [
                'max' => 50
            ])
        ]);
    }

    public function testUniqueValidationRule(): void
    {
        $unit = Unit::factory()->create(['name' => 'unit']);

        $response = $this->makeCall([
            'name' => $unit->name
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $this->assertValidationErrorContain([
            'name' => __('validation.custom.name.unique')
        ]);
    }

    public function testFailedWithNoAccess(): void
    {
        $this->getTestingUser(null, [
            'permissions' => '',
            'roles' => ''
        ]);

        $unit = Unit::factory()->create(['name' => 'tu']);

        $response = $this->makeCall([
            'name' => $unit->name
        ]);

        $response->assertStatus(Response::HTTP_FORBIDDEN);

        $this->assertResponseContainKeyValue([
            'message' => 'This action is unauthorized.'
        ]);
    }

    public function testSuccess(): void
    {
        $response = $this->makeCall([
            'name' => 'b/p'
        ]);

        $response->assertStatus(Response::HTTP_CREATED);

        $this->assertResponseContainKeyValue([
            'object' => 'Unit',
            'name' => 'b/p',
            'deleted_at'=> null
        ]);
    }
}

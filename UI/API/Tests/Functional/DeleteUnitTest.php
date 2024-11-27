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

class DeleteUnitTest extends ApiTestCase
{
    protected array $access = [
        'permissions' => Permissions::DELETE,
        'roles' => ''
    ];

    protected string $endpoint = 'delete@v1/units/{id}';

    public function testWithEmptyId(): void
    {
        $response = $this->makeCall();

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $this->assertValidationErrorContain([
            'id' => __('validation.custom.id.required')
        ]);
    }

    public function testInvalidId(): void
    {
        $response = $this->injectId(142643)->makeCall();

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $this->assertValidationErrorContain([
            'id' => __('validation.custom.id.exists')
        ]);
    }

    public function testSuccess(): void
    {
        $unit = Unit::factory()->create();

        $response = $this->injectId($unit->id)->makeCall();
        $response->assertStatus(Response::HTTP_NO_CONTENT);
        $this->assertSoftDeleted(Unit::TABLE, ['id' => $unit->id]);
    }

    public function testFailedWithNoAccess(): void
    {
        $this->getTestingUser(null, [
            'permissions' => '',
            'roles' => ''
        ]);

        $unit = Unit::factory()->create(['name' => 'tu']);

        $response = $this->injectId($unit->id)->makeCall();

        $response->assertStatus(Response::HTTP_FORBIDDEN);

        $this->assertResponseContainKeyValue([
            'message' => 'This action is unauthorized.'
        ]);
    }
}

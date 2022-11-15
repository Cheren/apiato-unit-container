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

use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\Vendor\Unit\Models\Unit;
use App\Containers\Vendor\Unit\Tests\ApiTestCase;
use Illuminate\Http\Response;

class UpdateUnitTest extends ApiTestCase
{
    protected array $access = [
        'permissions' => '',
        'roles' => Role::ADMIN
    ];

    protected string $endpoint = 'patch@v1/units/{id}';

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
        $unit = Unit::factory()->create(['name' => 'tu']);

        $newName = 'new-name';
        $response = $this->injectId($unit->id)->makeCall(['name' => $newName]);

        $response->assertStatus(Response::HTTP_OK);

        $this->assertResponseContainKeyValue([
            'object' => 'Unit',
            'id' => $unit->getHashedKey(),
            'name' => $newName,
            'deleted_at'=> null
        ]);
    }
}

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

namespace App\Containers\Vendor\Unit\Data\Factories;

use App\Containers\Vendor\Unit\Models\Unit;
use App\Ship\Database\Eloquent\Collection;
use App\Ship\Parents\Factories\Factory;
use App\Ship\Parents\Models\Model;

/**
 * @method Model|Unit|Collection create($attributes = [], ?Model $parent = null)
 */
class UnitFactory extends Factory
{
    protected $model = Unit::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name
        ];
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function deleted(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'deleted_at' => $this->faker->dateTime
            ];
        });
    }
}

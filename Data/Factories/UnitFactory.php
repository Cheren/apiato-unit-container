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

use App\Containers\Vendor\Unit\Foundation\Unit;
use App\Containers\Vendor\Unit\Models\Unit as UnitModel;
use App\Ship\Database\Eloquent\Collection;
use App\Ship\Parents\Factories\Factory;
use App\Ship\Parents\Models\Model;
use App\Ship\Traits\Factory\HasTrashedState;

/**
 * @method Model|UnitModel|Collection create($attributes = [], ?Model $parent = null)
 */
final class UnitFactory extends Factory
{
    use HasTrashedState;

    protected $model = UnitModel::class;

    public function definition(): array
    {
        return [
            Unit::NAME => $this->faker->name
        ];
    }
}

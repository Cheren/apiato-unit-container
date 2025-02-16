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

namespace App\Containers\Vendor\Unit\Models;

use Apiato\Core\Contracts\HasResourceKey;
use App\Containers\Vendor\Unit\Data\Factories\UnitFactory;
use App\Containers\Vendor\Unit\Foundation\Unit as BaseUnit;
use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property-read int $id Уникальный идентификатор.
 * @property-read string $name Название.
 * @property-read null|Carbon $deleted_at Дата и время удаления.
 *
 * @method static UnitFactory factory(...$parameters)
 * @method static int count()
 */
class Unit extends Model implements HasResourceKey
{
    use SoftDeletes;

    public const TABLE = 'units';
    public const RESOURCE_KEY = 'Unit';

    public $timestamps = false;

    protected $table = self::TABLE;
    protected string $resourceKey = self::RESOURCE_KEY;

    protected $casts = [
        BaseUnit::NAME => 'string'
    ];

    protected $fillable = [
        BaseUnit::NAME
    ];
}

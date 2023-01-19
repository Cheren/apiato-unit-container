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

use App\Containers\Vendor\Unit\Data\Factories\UnitFactory;
use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property-read int $id
 * @property-read string $name
 * @property-read null|Carbon $deleted_at
 *
 * @method static UnitFactory factory(...$parameters)
 * @method static int count()
 */
class Unit extends Model
{
    use SoftDeletes;

    public const TABLE = 'units';

    public $timestamps = false;

    protected $table = self::TABLE;

    protected $casts = [
        'name' => 'string'
    ];

    protected $fillable = [
        'name'
    ];
}

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

use App\Containers\Vendor\Unit\Foundation\Unit;
use App\Containers\Vendor\Unit\Models\Unit as UnitModel;
use App\Ship\Parents\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

// @codingStandardsIgnoreStart

return new class extends Migration
{
    public function up(): void
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            $table->id();
            $table->string(Unit::NAME, Unit::NAME_MAX_LENGTH)
                ->unique($this->getFieldIndexName(Unit::NAME));
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->getTableName());
    }

    public function getTableName(): string
    {
        return UnitModel::TABLE;
    }
};

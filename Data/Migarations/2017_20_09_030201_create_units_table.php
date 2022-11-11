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

use App\Containers\Vendor\Unit\Model\Unit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

// @codingStandardsIgnoreStart

class CreateUnitsTable extends Migration
{
    public function up(): void
    {
        Schema::create(Unit::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->boolean('published')->default(true);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(Unit::TABLE);
    }
}

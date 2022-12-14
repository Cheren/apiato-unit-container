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

namespace App\Containers\Vendor\Unit\UI\API\Transformers;

use App\Containers\Vendor\Unit\Models\Unit;
use App\Ship\Contracts\TransformToList;
use App\Ship\Parents\Transformers\Transformer;
use Illuminate\Support\Carbon;

class UnitTransformer extends Transformer implements TransformToList
{
    public function transform(Unit $unit): array
    {
        if ($this->isToList()) {
            return $this->transformToList($unit);
        }

        $response = [
            'object' => $unit->getResourceKey(),
            'id' => $unit->getHashedKey(),
            'name' => $unit->name,
            'deleted_at' => $unit->deleted_at instanceof Carbon ? $unit->deleted_at->getTimestamp() : null
        ];

        return $this->ifAdmin([
            'real_id' => $unit->id
        ], $response);
    }

    /**
     * @param Unit $unit
     * @return array
     */
    public function transformToList($unit): array
    {
        return [
            'value' => $unit->getHashedKey(),
            'title' => $unit->name
        ];
    }
}

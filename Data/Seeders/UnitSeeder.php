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

namespace App\Containers\Vendor\Unit\Data\Seeders;

use App\Containers\Vendor\Unit\Tasks\CreateUnitTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * @throws CreateResourceFailedException
     */
    public function run(): void
    {
        $task = app(CreateUnitTask::class);
        foreach ($this->getDefaultUnits() as $unitName) {
            $task->run($unitName);
        }
    }

    protected function getDefaultUnits(): array
    {
        return [
            'Шт.',
            'Л.',
            'Кв.м.',
            'Куб.м.',
            'Пог.м.',
            'Сотка',
            'Га',
            'См',
            'Мм',
            'Кг',
            'Тонн',
            'Рейс',
            'Опер.',
            'Компл.',
            'Чел.',
            'Чел/час',
            'Час',
            'Мин.',
            'Сек.',
            'День',
            'Сут.',
            'Мес.',
            'Ед.',
            'мЛ.',
            'Упак.'
        ];
    }
}

<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Parents;
use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StudentsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Students', Student::count()),
            Card::make('Parents', Parents::count()),
            Card::make('Accounts', User::count()),
        ];
    }
}

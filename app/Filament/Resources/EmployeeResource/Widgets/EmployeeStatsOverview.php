<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $id = Country::where('country_code', 'ID')->withCount('employees')->first();
        $au = Country::where('country_code', 'AU')->withCount('employees')->first();
        $jpn = Country::where('country_code', 'JPN')->withCount('employees')->first();

        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make('ID Employees', $id ? $id->employees_count : 0),
            Card::make('AU Employees', $au ? $au->employees_count : 0),
            Card::make('JPN Employees', $jpn ? $jpn->employees_count : 0),
        ];
    }
}

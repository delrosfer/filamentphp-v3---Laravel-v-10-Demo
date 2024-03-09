<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Enums\OrderStatusEnum;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected static bool $isLazy = false;

    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Customers', Customer::count())
                ->description('Increasing Customers')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([6, 4, 9, 5, 3, 0, 7]),

            Stat::make('Total Products', Product::count())
                ->description('Total Products')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->chart([6, 14, 9, 25, 3, 0, 17]),

            Stat::make('Pending Orders', Order::where('status', OrderStatusEnum::PENDING->value)->count())
                ->description('Pending Orders')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('info')
                ->chart([26, 14, 39, 25, 3, 0, 17]),
        ];
    }
}

<?php

namespace App\Filament\Resources\LeaveRequestResource\Pages;

use App\Filament\Resources\LeaveRequestResource;
use EightyNine\Approvals\Models\ApprovableModel;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\Action;

class ListLeaveRequests extends ListRecords
{
    use  \EightyNine\Approvals\Traits\HasApprovalHeaderActions;

    protected static string $resource = LeaveRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getOnCompletionAction(): Action
    {
        return Action::make("Done")
            ->color("success")
            // Do not use the visible method, since it is being used internally to show this action if the approval flow has been completed.
            // Using the hidden method add your condition to prevent the action from being performed more than once
            ->hidden(fn(ApprovableModel $record)=> $record->shouldBeHidden());
    }
}

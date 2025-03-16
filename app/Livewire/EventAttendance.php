<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class EventAttendance extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $event_id;
    public $event_name;

    public function mount()
    {
        $this->event_id = request('id');
        $this->event_name = \App\Models\Event::find($this->event_id)->name;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\EventAttendance::query()->where('event_id', $this->event_id))
            ->columns([
                TextColumn::make('inmate.fullname')->label('INMATE NAME'),
                TextColumn::make('time_in')->label('TIME IN')->date('h:i A'),
                TextColumn::make('time_out')->label('TIME OUT')->date('h:i A'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading(heading: 'No Attendance yet');
    }

    public function render()
    {
        return view('livewire.event-attendance');
    }
}

<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Message;
use Illuminate\Database\Eloquent\Builder;

class MessageTable extends DataTableComponent
{
    protected $model = Message::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("Message", "message")
                ->sortable(),
                Column::make("Message", "message")
                ->sortable()
                ->view('messages.action'),
        ];
    }

    public function builder(): Builder
    {
        return Message::where('to_id', auth()->user()->id);
    }
}

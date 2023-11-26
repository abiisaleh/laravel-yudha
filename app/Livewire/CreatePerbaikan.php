<?php

namespace App\Livewire;

use App\Models\Perbaikan;
use Filament\Actions\Action as ActionsAction;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Support\Enums\ActionSize;
use IbrahimBougaoua\FilamentRatingStar\Actions\RatingStar;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreatePerbaikan extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    public $tokoId;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('email')
                    ->default(auth()->user()->email ?? null),
                FileUpload::make('gambar'),
                Textarea::make('detail_kerusakan')
                    ->rows(5),
            ])
            ->model(Perbaikan::class)
            ->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();
        $data['toko_id'] = $this->tokoId;
        $data['user_id'] = auth()->id();
        Perbaikan::create($data);

        $this->form->fill();

        Notification::make()
            ->title('Success')
            ->success()
            ->send();
    }

    protected function createAction()
    {
        return ActionsAction::make('create')
            ->label('Submit')
            ->submit('create')
            ->size(ActionSize::Large)
            ->extraAttributes([
                'class' => 'w-full',
            ])
            ->keyBindings(['mod+s']);
    }

    public function render()
    {
        return view('livewire.create-perbaikan');
    }
}

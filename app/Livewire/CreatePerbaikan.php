<?php

namespace App\Livewire;

use App\Models\Perbaikan;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use IbrahimBougaoua\FilamentRatingStar\Actions\RatingStar;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreatePerbaikan extends Component implements HasForms
{
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
                TextInput::make('email')
                    ->default(auth()->user()->email ?? null)
                    ->email()
                    ->required(),
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
        $data['user_id'] = auth()->id;
        Perbaikan::create($data);
    }

    public function render()
    {
        return view('livewire.create-perbaikan');
    }
}

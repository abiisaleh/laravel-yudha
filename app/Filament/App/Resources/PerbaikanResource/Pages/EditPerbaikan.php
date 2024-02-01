<?php

namespace App\Filament\App\Resources\PerbaikanResource\Pages;

use App\Filament\App\Resources\PerbaikanResource;
use App\Models\Perbaikan;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\HtmlString;

class EditPerbaikan extends EditRecord
{
    protected static string $resource = PerbaikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $record = Perbaikan::find($this->data['id']);

        $recipient = $record->user()->get();
        $toko = $record->toko->nama;
        $biaya = number_format($record->biaya);

        Notification::make()
            ->info()
            ->title('Konfirmasi pesananmu')
            ->body(new HtmlString('Pesananmu dari toko <span class="font-bold">' . $toko . '</span> telah diterima. Kerusakan yang diperiksa yaitu ' . $data['hasil_pemeriksaan'] . '. biaya yang diperlukas sebesar <span class="font-bold">Rp. ' . $biaya) . '</span>')
            ->sendToDatabase($recipient);

        return $data;
    }
}

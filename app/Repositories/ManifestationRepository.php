<?php

namespace App\Repositories;

use App\Mail\ManifestationSentMail;
use App\Models\Document;
use App\Models\Manifestation;
use App\Models\ManifestationStatus;
use Exception;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class ManifestationRepository
{
    public static function create($data, $manifestationType)
    {
        try {
            $protocolNumber = random_int(100000000000, 999999999999);

            $manifestation = Manifestation::create([
                'protocol_number' => $protocolNumber,
                'manifestation_status_id' => ManifestationStatus::first()->id,
                'manifestation_type_id' => $manifestationType,
                'name' => isset($data['name']) ? $data['name'] : null,
                'cpf' => isset($data['cpf']) ? $data['cpf'] : null,
                'address' => isset($data['address']) ? $data['address'] : null,
                'phone' => isset($data['phone']) ? $data['phone'] : null,
                'email' => isset($data['email']) ? $data['email'] : null,
                'reported' => isset($data['reported']) ? $data['reported'] : null,
                'description' => $data['description'],
                'comunication_type' => isset($data['comunication_type']) ? $data['comunication_type'] : 'public',
                'request_reason_id' => $manifestationType == 4 ? $data['request_reason_id'] : null,
            ]);


            if (count($data['files']) > 0) {
                foreach ($data['files'] as $key => $value) {
                    Document::create([
                        'manifestation_id' => $manifestation->id,
                        'path' => $value,
                        'created_at' => now()
                    ]);
                }
            }

            // Envia email para a empresa
            Mail::to('privacidade@mitren.com.br')->send(new ManifestationSentMail());

            Notification::make()
                ->title('Sucesso!')
                ->body('Dados enviados com sucesso!')
                ->success()
                ->send();

            return redirect()->route("form-selection-with-id", ['id' => $manifestation->protocol_number]);
        } catch (Exception $e) {
            Notification::make()
                ->title('Erro!')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }
}

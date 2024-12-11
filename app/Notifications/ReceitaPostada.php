<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Receita;

class ReceitaPostada extends Notification
{
    protected $receita;

    // Passa a receita para a notificação
    public function __construct(Receita $receita)
    {
        $this->receita = $receita;
    }

    // Determina como a notificação será entregue
    public function via($notifiable)
    {
        return ['mail'];  // Definindo que será enviado por e-mail
    }

    // Define o conteúdo do e-mail
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Olá ' . $notifiable->name)  // Saudações ao usuário
                    ->line('Você publicou uma nova receita: "' . $this->receita->titulo . '"')
                    ->action('Ver Receita', route('receitas.show', $this->receita->id))  // Link para a receita
                    ->line('Obrigado por usar nosso sistema!');
    }

    // Definindo outras formas de entrega, como database, se necessário
    public function toArray($notifiable)
    {
        return [
            'receita_id' => $this->receita->id,
        ];
    }
}

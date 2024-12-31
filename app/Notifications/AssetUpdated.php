<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AssetUpdated extends Notification
{
    use Queueable;

    protected $asset;
    
    public function __construct($asset)
    {
        $this->asset = $asset;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // Mengirim melalui email dan database
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Asset Updated')
                    ->line('An asset has been updated.')
                    ->action('View Asset', url('/aset/'.$this->asset->id))
                    ->line('Thank you for managing your assets with us!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Asset ' . $this->asset->name . ' has been updated.',
            'asset_id' => $this->asset->id
        ];
    }
}

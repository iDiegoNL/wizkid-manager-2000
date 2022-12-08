<?php

namespace App\Notifications;

use App\Models\Wizkid;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WizkidFired extends Notification
{
    use Queueable;

    public Wizkid $wizkid;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Wizkid $wizkid)
    {
        $this->wizkid = $wizkid;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Sorry, you have been fired :/')
            ->greeting("Dear {$this->wizkid->name}")
            ->line('We regret to inform you that your services are no longer needed at this time. Don\'t worry, you\'ll have plenty of time to pursue your true passion - unemployment.')
            ->line('We wish you the best of luck in your future endeavors.')
            ->salutation("Sincerely, \r\n\r\n" . config('app.name'));
    }
}

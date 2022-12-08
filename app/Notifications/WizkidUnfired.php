<?php

namespace App\Notifications;

use App\Models\Wizkid;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WizkidUnfired extends Notification
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
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('You\'ve been unfired. Say what?')
            ->greeting("Dear {$this->wizkid->name}")
            ->line('We are happy to inform you that your services are once again required at this time. Congratulations on your successful un-firing! It\'s clear that you have a unique and valuable perspective that we simply cannot do without.')
            ->salutation("Welcome back, \r\n\r\n" . config('app.name'));
    }
}

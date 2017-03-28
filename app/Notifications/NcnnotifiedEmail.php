<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Ncnnotified;

class NcnnotifiedEmail extends Notification
{
    use Queueable;

    protected $ncnnotified;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Ncnnotified $ncnnotified)
    {
        $this->ncnnotified = $ncnnotified;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->success()
                    ->subject('Non-conformance Notification: Approved')
                    ->greeting('Good day!')
                    ->line('Your requested NCN have immediate action.')
                    // ->line('Immediate Action: '.$this->ncnnotified->name)
                    ->line('Thank you, have a nice day!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

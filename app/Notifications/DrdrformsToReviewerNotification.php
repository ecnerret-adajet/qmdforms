<?php

namespace App\Notifications;

use App\Drdrform;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DrdrformsToReviewerNotification extends Notification
{
    use Queueable;

    protected $drdrform;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Drdrform $drdrform)
    {
        $this->drdrform = $drdrform;
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
                    ->subject('Document review and distribution')
                    ->greeting('Good day!')
                    ->line($this->drdrform->name.' has submitted a Document Request for your review and approval')
                    ->action('Visit the portal now',  url('/drdrforms/reviewer/create/'.$this->drdrform->id))
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

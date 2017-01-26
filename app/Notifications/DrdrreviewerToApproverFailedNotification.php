<?php

namespace App\Notifications;

use App\Drdrreviewer;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DrdrreviewerToApproverFailedNotification extends Notification
{
    use Queueable;

    protected $drdrreviewer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Drdrreviewer $drdrreviewer)
    {
        $this->drdrreviewer = $drdrreviewer;
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
                    ->subject('Document Review & Document Request: Deny!')
                    ->greeting('Good day!')
                    ->line($this->drdrreviewer->name.' has denied your document request.')
                    ->line('Remarks: '.$this->drdrreviewer->remarks)
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

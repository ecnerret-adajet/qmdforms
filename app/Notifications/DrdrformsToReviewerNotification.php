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
        foreach($this->drdrform->types as $type){
            $request_type = $type->name;
        }

        return (new MailMessage)
                    ->success()
                    ->subject('Document Review and Distribution Request: Reviewer')
                    ->greeting('Good day!')
                    ->line($this->drdrform->name.' has submited a request under your review and approval. Please confirm within 3 working days. ')

                    ->line('Type of Request: '.$request_type)
                    ->line('Title: '.$this->drdrform->document_title)
                    ->line('Revision No: '.$this->drdrform->revision_number)
                    ->line('Reason of change: '.$this->drdrform->reason_request)


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

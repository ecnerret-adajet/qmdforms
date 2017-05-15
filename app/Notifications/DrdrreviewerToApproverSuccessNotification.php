<?php

namespace App\Notifications;

use App\Drdrreviewer;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DrdrreviewerToApproverSuccessNotification extends Notification
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

        foreach($this->drdrreviewer->drdrform->types as $type){
            $request_type = $type->name;
        }

        return (new MailMessage)
                ->success()
                    ->subject('Document Review and Ristribution Request: Approver')
                    ->greeting('Good day!')
                    ->line($this->drdrreviewer->name.' has submited a request under your review and approval. Please confirm within 24 hours.')

                    ->line('Type of Request: '.$request_type)
                    ->line('Title: '.$this->drdrreviewer->drdrform->document_title)
                    ->line('Revision No: '.$this->drdrreviewer->drdrform->revision_number)
                    ->line('Reason of change: '.$this->drdrreviewer->drdrform->reason_request)
                    
                    ->action('Visit the portal now',  url('/drdrforms/approver/create/'.$this->drdrreviewer->drdrform->id))
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

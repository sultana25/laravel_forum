<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewReplyAdded extends Notification
{
    use Queueable;
    
     public $d;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($discussion)
    {
        $this->d=$discussion;
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
                    ->greeting('Hello from Laraforum.')
                    ->line('New reply left on a discussion you are watching.')
                    ->action('View Discussion', route('Discussion',['slug'=>$this->d->slug]))
                    ->line('Thank you for using our application!');
    }

 
}

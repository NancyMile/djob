<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewApplicant extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $vacancy_id;
    public $vacancy_title;
    public $user_id;

    public function __construct($vacancy_id, $vacancy_title, $user_id)
    {
        $this->vacancy_id = $vacancy_id;
        $this->vacancy_title = $vacancy_title;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notifications/'.$this->vacancy_id);

        return (new MailMessage)
                    ->line('A new developer has applied to your vacancy')
                    ->line('The vacancy is '.$this->vacancy_title)
                    ->action('Applicants details', $url)
                    ->line('Thank you for using our application!');
    }


    // saves notifications on database
    // to create the table notifications
    //please run: php artisan notifications:table
    public function toDatabase($notifiable)
    {
        //this  will be save on column data of the table notifications
        return [
            'vacancy_id' => $this->vacancy_id,
            'vacancy_title' => $this->vacancy_title,
            'user_id' => $this->user_id
        ]; 
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

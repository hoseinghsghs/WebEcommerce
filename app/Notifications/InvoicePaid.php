<?php

namespace App\Notifications;

use App\Channels\SmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification
{
    use Queueable;

    public array $pattern_variables;
    public array $numbers;
    public string $pattern_code;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($pattern_variables, $pattern_code, $numbers = [])
    {
        $this->pattern_variables = $pattern_variables;
        $this->numbers = $numbers;
        $this->pattern_code = $pattern_code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [SmsChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [

        ];
    }

    public function toSms($notifiable)
    {
        return ['numbers' => $this->numbers, 'pattern_code' => $this->pattern_code, 'pattern_variables' => $this->pattern_variables];
    }
}

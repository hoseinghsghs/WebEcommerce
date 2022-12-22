<?php

namespace App\Notifications;

use App\Channels\SmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OtpSms extends Notification
{
    use Queueable;

    public array $pattern_variable;
    public string $pattern_code;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($pattern_variable)
    {
        $this->pattern_variable = $pattern_variable;
        $this->pattern_code="w7crq4x8hwp667i";
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [SmsChannel::class];
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
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [];
    }

    public function toSms($notifiable)
    {
        return ['numbers'=>[],'pattern_code'=>$this->pattern_code,'pattern_variables'=>$this->pattern_variable];
    }
}

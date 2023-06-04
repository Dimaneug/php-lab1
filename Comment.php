<?php

require_once 'vendor/autoload.php';

class Comment
{
    public User $user;
    public string $textComment;

    public function __construct($user, $textComment)
    {
        $this->user = $user;
        $this->textComment = $textComment;
    }

    public function returnAfterDate(DateTime $dateTime): bool
    {
        return $this->user->userCreateDateTime > $dateTime;
    }
}
<?php

namespace App\Events;

class ReviewRegistered
{
    private $id;
    private $title;
    private $content;
    private $userId;
    private $tags = [];
    private $createdAt;

    public function __construct(
        int $id,
        string $title,
        string $content,
        int $userId,
        string $createdAt,
        array $tags
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->userId = $userId;
        $this->createdAt = $createdAt;
        $this->tags = $tags;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getCreatedAtEpoch()
    {
        $datetime = new \DateTime($this->createdAt);
        return $datetime->format('U');
    }

    public function getTags()
    {
        return $this->tags;
    }
}

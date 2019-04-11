<?php

namespace App\Http\Resources;

class ItemResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'title' => $this->when(
                $this->isA('story', 'job', 'poll'),
                $this->getAttribute('title')
            ),
            'body' => $this->when(
                $this->isA('comment', 'poll') || $this->isAsk(),
                $this->getAttribute('text')
            ),
            'url' => $this->when(
                $this->isA('job') || $this->isStory(),
                $this->getAttribute('url')),
            'score' => $this->when(
                $this->isA('story', 'pollopt'),
                $this->getAttribute('score')
            ),
            'pollId' => $this->when(
                $this->isA('pollopt'),
                $this->getAttribute('poll')
            ),
            'comments' => $this->when(
                $this->isA('comment', 'story', 'poll'),
                $this->getAttribute('kids') ?? []
            ),
            'items' => $this->when(
                $this->isA('poll'),
                $this->getAttribute('parts')
            ),
            'commentsCount' => $this->when(
                $this->isA('story', 'poll'),
                $this->getAttribute('descendants')
            ),
            'parentId' => $this->when(
                $this->isA('comment'),
                $this->getAttribute('parent')
            ),
            'author' => $this->getAttribute('by'),
            'isDead' => $this->getAttribute('dead') ?? false,
            'isDeleted' => $this->getAttribute('deleted') ?? false,
            'createdAt' => $this->formatTime(),
        ];
    }

    private function formatTime()
    {
        $time = $this->getAttribute('time');

        if (!$time) {
            return;
        }

        return now()->createFromTimestamp($time)->format('Y-m-d H:i:s');
    }

    private function isStory()
    {
        $this->type === 'story' && is_null($this->getAttribute('text'));
    }

    private function isAsk()
    {
        $this->type === 'story' && is_null($this->getAttribute('url'));
    }

    private function isA(...$types)
    {
        return in_array($this->type, $types);
    }
}

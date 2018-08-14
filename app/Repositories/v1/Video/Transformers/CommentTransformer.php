<?php

namespace ArbaFilm\Repositories\v1\Video\Transformers;

use ArbaFilm\Repositories\v1\Comment\Models\Comment;
use League\Fractal\TransformerAbstract;

class CommentTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Comment $comment)
    {
        return [
            'id' => $comment->id,
            'user' => [
                'id' => $comment->user_id,
                'name' => !is_null($comment->user) ? $comment->user->full_name : null,
                'email' => !is_null($comment->user) ? $comment->user->email : null
            ],
            'parent' => $comment->parent_comment_id,
            'comment' => $comment->comment,
            'date' => $comment->date,
            'time' => $comment->time
        ];
    }

}

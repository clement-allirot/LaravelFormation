<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $postIdFirst = Post::orderBy('id')
            ->take(1)
            ->get();

        $postIdLast = Post::orderBy('id', 'desc')
            ->take(1)
            ->get();

        return [
            'body' => $this->faker->sentence,
            'commentable_id' => $this->faker->numberBetween($postIdFirst[0]->id, $postIdLast[0]->id),
            'commentable_type' => 'App\Models\Post'
        ];
    }
}

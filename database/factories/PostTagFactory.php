<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostTag>
 */
class PostTagFactory extends Factory
{

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

        $tagIdFirst = Tag::orderBy('id')
            ->take(1)
            ->get();

        $tagIdLast = Tag::orderBy('id', 'desc')
            ->take(1)
            ->get();

        return [
            'post_id' => $this->faker->numberBetween($postIdFirst[0]->id, $postIdLast[0]->id),
            'tag_id' => $this->faker->numberBetween($tagIdFirst[0]->id, $tagIdLast[0]->id)
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $post = $this->route('post');

        $postId = is_object($post) ? $post->id : $post;

        return [
            'user_id' => 'required|exists:users,id',
            'category_id' => 'nullable|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $postId,
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
        ];
    }
}

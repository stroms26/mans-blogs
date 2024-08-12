<?php
namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any posts.
     */
    public function viewAny(?User $user)
    {
        return true; // Allow everyone to view posts, including guests
    }

    /**
     * Determine whether the user can view the post.
     */
    public function view(?User $user, Post $post)
    {
        return true; // Allow everyone to view individual posts
    }

    /**
     * Determine whether the user can create posts.
     */
    public function create(User $user)
    {
        return $user->role === 'admin'; // Only allow admins to create posts
    }

    /**
     * Determine whether the user can update the post.
     */
    public function update(User $user, Post $post)
    {
        return $user->role === 'admin'; // Only allow admins to update posts
    }

    /**
     * Determine whether the user can delete the post.
     */
    public function delete(User $user, Post $post)
    {
        return $user->role === 'admin'; // Only allow admins to delete posts
    }
}

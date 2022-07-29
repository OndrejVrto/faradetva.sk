<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\News;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy {
    use HandlesAuthorization;

    public function viewAny(User $user) {
        //
    }

    public function view(User $user, News $news) {
        return $news->user_id == $user->id or $user->isAdmin();
    }

    public function create(User $user) {
        //
    }

    public function update(User $user, News $news) {
        return $news->user_id == $user->id or $user->isAdmin();
    }

    public function delete(User $user, News $news) {
        return $news->user_id == $user->id or $user->isAdmin();
    }

    public function restore(User $user, News $news) {
        //
    }

    public function forceDelete(User $user, News $news) {
        //
    }
}

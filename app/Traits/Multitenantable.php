<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


trait Multitenantable {

    protected static function bootMultitenantable()
    {
        if (Auth::check()) {
            static::creating(function ($model) {
                $user = \Auth::user();
                $model->project_cd = $user->project_cd;
            });

            static::addGlobalScope('project_cd', function (Builder $builder) {
                $user = \Auth::user();
                $builder->where('project_cd', $user->project_cd);
            });
        }
    }

}
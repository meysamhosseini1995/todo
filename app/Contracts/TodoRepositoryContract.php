<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface TodoRepositoryContract extends EloquentRepositoryContract {

    /**
     * Filter models.
     *
     * @param Request $request
     * @return self
     */
    public function filter(Request $request) : self;
}

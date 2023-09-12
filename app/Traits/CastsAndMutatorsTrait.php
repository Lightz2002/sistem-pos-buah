<?php

namespace App\Traits;

trait CastsAndMutatorsTrait
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $traitGuarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $traitCasts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Define mutators here.
     *
     * For example:
     * public function setSomeAttribute($value)
     * {
     *     $this->attributes['some_attribute'] = someLogic($value);
     * }
     */
}

<?php

namespace App\Models;

use App\Traits\CastsAndMutatorsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, CastsAndMutatorsTrait;

    /**
     * The attributes that are not mass assignable, merged with the trait's guarded.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    protected $casts = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Merge the trait's guarded with the model's guarded
        $this->guarded = array_merge($this->guarded, $this->traitGuarded);
        $this->casts = array_merge($this->casts, $this->traitCasts);
    }
}

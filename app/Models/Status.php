<?php

namespace App\Models;

use App\Traits\CastsAndMutatorsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory, CastsAndMutatorsTrait;
    protected $table = 'status';

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

    public function scopePaid($query) {return $query->where('name', 'paid');}
    public function scopeRejected($query) {return $query->where('name', 'rejected');}
    public function scopeVerifying($query) {return $query->where('name', 'verifying');}
    public function scopeDelivering($query) {return $query->where('name', 'delivering');}
    public function scopeCompleted($query) {return $query->where('name', 'completed');}
}

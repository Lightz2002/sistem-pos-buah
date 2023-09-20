<?php

namespace App\Models;

use App\Traits\CastsAndMutatorsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

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

    public function payment(): BelongsTo {
        return $this->belongsTo(Payment::class);
    }

    public function customer(): BelongsTo {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function order_items(): HasMany {
        return $this->hasMany(CartItems::class);
    }

    public function scopeToday($query) {
        return $query->where('date', now()->format('Y-m-d'));
    }

    public function scopeFilter($query, string $search, string $status) {
        $query = $query->join('status', 'status.id', '=', 'orders.status_id')
            ->join('users', 'users.id', '=', 'orders.customer_id')
            ->select(DB::raw("orders.*, users.name AS customer_name,status.name AS status, CONCAT('Rp', FORMAT(orders.total_amount, 0)) AS total"))
            ->where(function ($query) use ($search) {
                $query->where('date', 'like', '%' . $search . '%')
                ->orWhere('customer_address', 'like', '%' . $search . '%')
                ->orWhere('users.name', 'like', '%' . $search . '%');
            });

        if ($status !== 'all') $query->where('status.name', 'like', '%' . $status . '%');
        if (auth()->user()->hasRole('customer')) $query->where('customer_id', auth()->user()->id);
        return $query;
    }
}

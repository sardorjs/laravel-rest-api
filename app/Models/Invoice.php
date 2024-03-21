<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $customer_id
 * @property int $amount
 * @property string $status
 * @property Carbon $billed_date
 * @property Carbon|null $paid_date
 * @method static Builder|Customer query()
 */

class Invoice extends Model
{
    use HasFactory;

    protected $casts = [
        'billed_date' => 'datetime',
        'paid_date' => 'datetime',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}

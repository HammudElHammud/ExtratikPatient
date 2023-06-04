<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;


class Patient extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'Name',
            'gender',
            'address',
            'surname',
            'card_id',
            'post_code',
            'date_of_birth',
            'contact_number_1',
            'contact_number_2',
        ];

    /**
     * @return HasMany
     */
    public function next_of_kin(): HasMany
    {
        return $this->hasMany(NextOfKin::class);
    }

    /**
     * @return HasMany
     */
    public function alergies(): HasMany
    {
        return $this->hasMany(Alergy::class);
    }

    /**
     * @return HasMany
     */
    public function conditions(): HasMany
    {
        return $this->hasMany(Condition::class);
    }

    /**
     * @return HasMany
     */
    public function medications(): HasMany
    {
        return $this->hasMany(Medication::class);
    }

    public function age(): int
    {
        return Carbon::parse($this->attributes['date_of_birth'])->age;
    }

}

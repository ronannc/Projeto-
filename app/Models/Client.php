<?php

namespace App\Models;

use App\Scopes\CompanyGlobalScope;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * Class Client.
 *
 * @package App\Models
 *
 * @property string   id
 * @property string   name
 * @property string   email
 * @property string   cpf
 * @property string   sex
 * @property string   avatar
 * @property string   birthday
 * @property string   street
 * @property string   neighborhood
 * @property string   number
 * @property string   complement
 * @property string   zipcode
 * @property boolean  is_active
 * @property DateTime last_access
 * @property DateTime created_at
 * @property DateTime updated_at
 *
 * @property City     city
 * @property Company  company
 *
 */
class Client extends Model implements AuditableContract
{
    use Auditable;
    use CompanyGlobalScope;

    public const VERIFIED = 0;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'sex',
        'phone',
        'blood_type',
        'birthday',
        'avatar',
        'street',
        'neighborhood',
        'number',
        'complement',
        'zipcode',
        'is_active',
        'city_id',
        'company_id'
    ];

    public function workout()
    {
        return Workout::where('client_id', $this->id)->with('client')->with('goal')->get();
    }

    public function lastWorkout()
    {
        return Workout::where('client_id', $this->id)->with('client')->with('goal')->orderBy('start', 'ASC')->first();
    }

    public function physicalAssessment()
    {
        return $this->hasMany(PhysicalAssessment::class);
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }
}



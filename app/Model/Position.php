<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Candidate;

/**
 * App\Model\Position
 *
 * @property int $id
 * @property string $position_name
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Candidate[] $candidate
 * @property-read int|null $candidate_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Position newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Position newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Position query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Position whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Position whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Position wherePositionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Position whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Position extends Model
{
    protected $table = "positions";
    public $timestamps = false;

    public function candidate()
    {
        return $this->hasMany('App\Model\Candidate','position_id','id');
    }

}

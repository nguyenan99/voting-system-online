<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Vote;
use App\Model\Position;

/**
 * App\Model\Candidate
 *
 * @property int $id
 * @property string $candidate_name
 * @property int $position_id
 * @property-read \App\Model\Position $position
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Vote[] $vote
 * @property-read int|null $vote_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Candidate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Candidate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Candidate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Candidate whereCandidateName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Candidate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Candidate wherePositionId($value)
 * @mixin \Eloquent
 */
class Candidate extends Model
{
    protected $table = "candidates";
    public $timestamps = false;
    public function vote(){
      return  $this->hasMany(Vote::class);
    }
    public function position(){
        return $this->belongsTo(Position::class,'position_id','id');
    }
}

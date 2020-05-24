<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Model\Candidate;

/**
 * App\Model\Vote
 *
 * @property int $id
 * @property int $voter_id
 * @property int $cadidate_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Candidate $candidate
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Vote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Vote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Vote query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Vote whereCadidateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Vote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Vote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Vote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Vote whereVoterId($value)
 * @mixin \Eloquent
 */
class Vote extends Model
{
    protected $table = "votes";
    public $timestamps = true;

    protected $fillable =['voter_id','cadidate_id','created_at','updated_at'];
    public function user(){
        return $this->belongsTo('App\User','voter_id','id');
    }
    public function candidate(){
        return $this->belongsTo('App\Model\Candidate','cadidate_id','id');
    }

}

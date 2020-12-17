<?php

namespace App\Domains\Track;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Track
 *
 * @property int $id
 * @property int $user_id 유저 ID
 * @property string $title 제목
 * @property string $artwork_url 썸네일 이미지 경로
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Track newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Track newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Track query()
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereArtworkUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereUserId($value)
 * @mixin \Eloquent
 */
class Track extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'artwork_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

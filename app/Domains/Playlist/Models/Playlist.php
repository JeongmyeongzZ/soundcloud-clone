<?php

namespace App\Domains\Playlist\Models;

use App\Domains\Track\Models\Track;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * App\Domains\Playlist\Models\Playlist
 *
 * @property int $id
 * @property int $user_id
 * @property string $title 플레이리스트 제목
 * @property string $genre 장르
 * @property string $artwork_url 썸네일 이미지 경로
 * @property string $description 썸네일 이미지 경로
 * @property int $is_private 공개 여부
 * @property string $release_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Track[] $tracks
 * @property-read int|null $tracks_count
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist query()
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereArtworkUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereGenre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereIsPrivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereUserId($value)
 * @mixin \Eloquent
 */
class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'genre',
        'artwork_url',
        'description',
        'is_private',
        'release_date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tracks(): BelongsToMany
    {
        return $this->belongsToMany(Track::class);
    }

//    public function tags(): BelongsToMany
//    {
//        return $this->belongsToMany(Tag::class);
//    }
}

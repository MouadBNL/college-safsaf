<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Resource extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const TYPE_SELECT = [
        '0' => 'Cours',
        '1' => 'Exercices',
        '2' => 'Devoir',
        '3' => 'Vidéos Youtube',
    ];

    public const TYPE_ICON = [
        '0' => '
            <svg class="h-full w-full fill-current" width="35" height="46" viewBox="0 0 35 46" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M34.6056 11.1634L23.8366 0.394423C23.5852 0.142962 23.2422 0 22.8846 0H4.03846C1.81165 0 0 1.81165 0 4.03846V41.9103C0 44.1371 1.81165 45.9487 4.03846 45.9487H30.9615C33.1883 45.9487 35 44.1371 35 41.9103V12.1154C35 11.7483 34.8459 11.4036 34.6056 11.1634ZM24.2308 4.59604L30.404 10.7692H25.5769C24.8347 10.7692 24.2308 10.1653 24.2308 9.42308V4.59604ZM30.9615 43.2564H4.03846C3.29619 43.2564 2.69231 42.6525 2.69231 41.9103V4.03846C2.69231 3.29619 3.29619 2.69231 4.03846 2.69231H21.5385V9.42308C21.5385 11.6499 23.3501 13.4615 25.5769 13.4615H32.3077V41.9103C32.3077 42.6525 31.7038 43.2564 30.9615 43.2564Z" />
            <path d="M25.5769 19.0257H9.42306C8.67962 19.0257 8.0769 19.6284 8.0769 20.3718C8.0769 21.1152 8.67962 21.718 9.42306 21.718H25.5769C26.3203 21.718 26.9231 21.1152 26.9231 20.3718C26.9231 19.6284 26.3203 19.0257 25.5769 19.0257Z" />
            <path d="M25.5769 24.4103H9.42306C8.67962 24.4103 8.0769 25.013 8.0769 25.7564C8.0769 26.4999 8.67962 27.1026 9.42306 27.1026H25.5769C26.3203 27.1026 26.9231 26.4999 26.9231 25.7564C26.9231 25.013 26.3203 24.4103 25.5769 24.4103Z" />
            <path d="M25.5769 29.7949H9.42306C8.67962 29.7949 8.0769 30.3976 8.0769 31.141C8.0769 31.8845 8.67962 32.4872 9.42306 32.4872H25.5769C26.3203 32.4872 26.9231 31.8845 26.9231 31.141C26.9231 30.3976 26.3203 29.7949 25.5769 29.7949Z" />
            <path d="M20.1923 35.1795H9.42306C8.67962 35.1795 8.0769 35.7822 8.0769 36.5257C8.0769 37.2691 8.67962 37.8718 9.42306 37.8718H20.1923C20.9357 37.8718 21.5384 37.2691 21.5384 36.5257C21.5384 35.7822 20.9357 35.1795 20.1923 35.1795Z" />
            </svg>
        ',
        '1' => '
            <svg class="h-full w-full fill-current" width="35" height="46" viewBox="0 0 35 46" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M34.6056 11.1634L23.8366 0.394423C23.5852 0.142962 23.2422 0 22.8846 0H4.03846C1.81165 0 0 1.81165 0 4.03846V41.9103C0 44.1371 1.81165 45.9487 4.03846 45.9487H30.9615C33.1883 45.9487 35 44.1371 35 41.9103V12.1154C35 11.7483 34.8459 11.4036 34.6056 11.1634ZM24.2308 4.59604L30.404 10.7692H25.5769C24.8347 10.7692 24.2308 10.1653 24.2308 9.42308V4.59604ZM30.9615 43.2564H4.03846C3.29619 43.2564 2.69231 42.6525 2.69231 41.9103V4.03846C2.69231 3.29619 3.29619 2.69231 4.03846 2.69231H21.5385V9.42308C21.5385 11.6499 23.3501 13.4615 25.5769 13.4615H32.3077V41.9103C32.3077 42.6525 31.7038 43.2564 30.9615 43.2564Z" />
            <path d="M25.5769 19.0257H9.42306C8.67962 19.0257 8.0769 19.6284 8.0769 20.3718C8.0769 21.1152 8.67962 21.718 9.42306 21.718H25.5769C26.3203 21.718 26.9231 21.1152 26.9231 20.3718C26.9231 19.6284 26.3203 19.0257 25.5769 19.0257Z" />
            <path d="M25.5769 24.4103H9.42306C8.67962 24.4103 8.0769 25.013 8.0769 25.7564C8.0769 26.4999 8.67962 27.1026 9.42306 27.1026H25.5769C26.3203 27.1026 26.9231 26.4999 26.9231 25.7564C26.9231 25.013 26.3203 24.4103 25.5769 24.4103Z" />
            <path d="M25.5769 29.7949H9.42306C8.67962 29.7949 8.0769 30.3976 8.0769 31.141C8.0769 31.8845 8.67962 32.4872 9.42306 32.4872H25.5769C26.3203 32.4872 26.9231 31.8845 26.9231 31.141C26.9231 30.3976 26.3203 29.7949 25.5769 29.7949Z" />
            <path d="M20.1923 35.1795H9.42306C8.67962 35.1795 8.0769 35.7822 8.0769 36.5257C8.0769 37.2691 8.67962 37.8718 9.42306 37.8718H20.1923C20.9357 37.8718 21.5384 37.2691 21.5384 36.5257C21.5384 35.7822 20.9357 35.1795 20.1923 35.1795Z" />
            </svg>
        ',
        '2' => '
            <svg class="h-full w-full fill-current" width="35" height="46" viewBox="0 0 35 46" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M34.6056 11.1634L23.8366 0.394423C23.5852 0.142962 23.2422 0 22.8846 0H4.03846C1.81165 0 0 1.81165 0 4.03846V41.9103C0 44.1371 1.81165 45.9487 4.03846 45.9487H30.9615C33.1883 45.9487 35 44.1371 35 41.9103V12.1154C35 11.7483 34.8459 11.4036 34.6056 11.1634ZM24.2308 4.59604L30.404 10.7692H25.5769C24.8347 10.7692 24.2308 10.1653 24.2308 9.42308V4.59604ZM30.9615 43.2564H4.03846C3.29619 43.2564 2.69231 42.6525 2.69231 41.9103V4.03846C2.69231 3.29619 3.29619 2.69231 4.03846 2.69231H21.5385V9.42308C21.5385 11.6499 23.3501 13.4615 25.5769 13.4615H32.3077V41.9103C32.3077 42.6525 31.7038 43.2564 30.9615 43.2564Z" />
            <path d="M25.5769 19.0257H9.42306C8.67962 19.0257 8.0769 19.6284 8.0769 20.3718C8.0769 21.1152 8.67962 21.718 9.42306 21.718H25.5769C26.3203 21.718 26.9231 21.1152 26.9231 20.3718C26.9231 19.6284 26.3203 19.0257 25.5769 19.0257Z" />
            <path d="M25.5769 24.4103H9.42306C8.67962 24.4103 8.0769 25.013 8.0769 25.7564C8.0769 26.4999 8.67962 27.1026 9.42306 27.1026H25.5769C26.3203 27.1026 26.9231 26.4999 26.9231 25.7564C26.9231 25.013 26.3203 24.4103 25.5769 24.4103Z" />
            <path d="M25.5769 29.7949H9.42306C8.67962 29.7949 8.0769 30.3976 8.0769 31.141C8.0769 31.8845 8.67962 32.4872 9.42306 32.4872H25.5769C26.3203 32.4872 26.9231 31.8845 26.9231 31.141C26.9231 30.3976 26.3203 29.7949 25.5769 29.7949Z" />
            <path d="M20.1923 35.1795H9.42306C8.67962 35.1795 8.0769 35.7822 8.0769 36.5257C8.0769 37.2691 8.67962 37.8718 9.42306 37.8718H20.1923C20.9357 37.8718 21.5384 37.2691 21.5384 36.5257C21.5384 35.7822 20.9357 35.1795 20.1923 35.1795Z" />
            </svg>
        ',
        '3' => '
            <svg class="h-full w-full fill-current" width="48" height="37" viewBox="0 0 48 37" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M31.7765 17.0887L20.5265 10.0575C20.0929 9.78656 19.5466 9.77222 19.0995 10.02C18.6523 10.2678 18.3749 10.7388 18.3749 11.25V25.3125C18.3749 25.8237 18.6523 26.2946 19.0995 26.5425C19.3119 26.6602 19.5467 26.7187 19.7811 26.7187C20.0402 26.7187 20.2988 26.6472 20.5264 26.505L31.7764 19.4737C32.1876 19.2168 32.4374 18.7661 32.4374 18.2812C32.4374 17.7964 32.1877 17.3457 31.7765 17.0887ZM21.1875 22.7752V13.7872L28.3779 18.2812L21.1875 22.7752Z" />
            <path d="M40.9688 0H7.03125C3.15422 0 0 3.15422 0 7.03125V29.5312C0 33.4083 3.15422 36.5625 7.03125 36.5625H40.9688C44.8458 36.5625 48 33.4083 48 29.5312V7.03125C48 3.15422 44.8458 0 40.9688 0ZM45.1875 29.5312C45.1875 31.8575 43.295 33.75 40.9688 33.75H7.03125C4.70503 33.75 2.8125 31.8575 2.8125 29.5312V7.03125C2.8125 4.70503 4.70503 2.8125 7.03125 2.8125H40.9688C43.295 2.8125 45.1875 4.70503 45.1875 7.03125V29.5312Z" />
            </svg>
        ',
    ];

    public const TYPE_IMAGE = [
        '0' => '/images/resource/cours.png',
        '1' => '/images/resource/homework.png',
        '2' => '/images/resource/homework.png',
        '3' => '/images/resource/ytb.png',
    ];

    public $table = 'resources';

    protected $appends = [
        'file',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'type',
        'link',
        'lesson_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getFileAttribute()
    {
        return $this->getMedia('file')->last();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getType(): string
    {
        return self::TYPE_SELECT[$this->type];
    }

    public function getIcon(): string
    {
        return self::TYPE_ICON[$this->type];
    }

    public function getImage(): string
    {
        return self::TYPE_IMAGE[$this->type];
    }
}

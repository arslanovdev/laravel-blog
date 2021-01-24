<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class BlogCategory
 *
 * @package App\Models
 *
 * @property-read BlogCategory $parentCategory
 * @property-read string       $parentTitle
 */
class BlogCategory extends Model
{
    use SoftDeletes;

    /**
     * Id корневой категории
     */
    const ROOT = 1;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description'
    ];

    /**
     * Получить родительскую категорию
     *
     * @return BelongsTo
     */
    public function parentCategory ()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     * Accessor
     *
     * @return string
     */
    public function getParentTitleAttribute ()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'Корень'
                : 'EXCEPTION');

        return $title;
    }

    /**
     * Является ли объект корневым
     *
     * @return bool
     */
    public function isRoot ()
    {
        return $this->id == BlogCategory::ROOT;
    }
}

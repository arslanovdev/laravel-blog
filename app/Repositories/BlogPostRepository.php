<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;

/**
 * Class BlogPostRepository
 * @package App\Repositories
 */
class BlogPostRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить посты для вывода пагинатором.
     *
     * @param int|null $perPage
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = 25) {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            // TODO: переделать в join`ы
            ->with([
                'category:id,title',
                'user:id,name',
            ])
            ->paginate($perPage);

        return $result;
    }

    /**
     * Получить модель для редактирования в админке
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }
}

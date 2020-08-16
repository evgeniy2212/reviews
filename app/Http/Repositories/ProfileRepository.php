<?php

namespace App\Repositories;

use App\User as Model;
use Illuminate\Database\Eloquent\Collection;


/**
 * Class ProfileRepository
 *
 * @package App\Repositories
 */
class ProfileRepository extends CoreRepository {

    /**
     * @return string
     */
    public function getModelClass()
    {
        return Model::class;
    }

    public function getProfileInfo()
    {
        return auth()->user();
    }

//    /**
//     * Получить модель для редактирования в админке.
//     *
//     * @param int $id
//     * @return Model
//     */
//    public function getProfileById($id)
//    {
//        return $this->startConditions()
//            ->find($id);
//    }

//    public function getOldImgSrc($news_id, $img_src)
//    {
//        $result = $this->startConditions()
//            ->find($news_id)
//            ->item_image()
//            ->where('src', $img_src)
//            ->first();
//
//        return $result;
//    }
//
//    public function getOldImgs($news_id)
//    {
//        return $this->startConditions()
//            ->find($news_id)
//            ->item_image()
//            ->where('is_new', 0)
//            ->get();
//    }
//
//    /**
//     * Получить модель для редактирования в админке.
//     *
//     * @param string $id
//     * @return Model
//     */
//    public function getNewsBySlug($slug)
//    {
//        return $this->startConditions()
//            ->whereSlug($slug)
//            ->first();
//    }
//
//    /**
//     * @param null $perPage
//     * @return mixed
//     */
//    public function getAllWithPaginate($perPage = 10)
//    {
//        $columns = ['id', 'slug', 'caption', 'is_published', 'created_at'];
//
//        $result = $this->startConditions()
//            ->select($columns)
//            ->orderBy('id', 'DESC')
//            ->paginate($perPage);
//
//        return $result;
//    }
//
//    /**
//     * Получить список новостей
//     *
//     * @return Collection
//     */
//    public function getAll($paginate = 8)
//    {
//        return $this->startConditions()
//            ->paginate($paginate);
//    }
//
//    public function getTableName()
//    {
//        return $this->startConditions()
//            ->getTable();
//    }
}

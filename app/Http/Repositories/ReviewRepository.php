<?php

namespace App\Repositories;

use App\Models\Review as Model;
use Illuminate\Support\Facades\DB;


/**
 * Class ReviewRepository
 *
 * @package App\Repositories
 */
class ReviewRepository extends CoreRepository {
    /**
     * CoreRepository constructor.
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return string
     */
    public function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param null $perPage
     * @param null $category
     * @return mixed
     */
    public function getAllWithPaginateByCategory($category, $perPage = 5)
    {
        $columns = ['id', 'user_id', 'review', 'review_category_id', 'name', 'second_name', 'created_at', 'rating', 'likes', 'dislikes', 'user_sign'];

        $result = $this->startConditions()
            ->select($columns)
            ->whereHas('category', function ($query) use($category) {
                $query->where('slug', $category);
            })
            ->with(['characteristics:name'])
            ->with(['comments'])
            ->orderBy('created_at', 'DESC')
            ->paginate($perPage);

        return $result;
    }

    /**
     * @param null $perPage
     * @param null $category
     * @return mixed
     */
    public function getSearchWithPaginate($search, $category, $perPage = 5)
    {
        $columns = ['id', 'user_id', 'review', 'review_category_id', 'name', 'second_name', 'created_at', 'rating', 'likes', 'dislikes', 'user_sign'];

        $result = $this->startConditions()
            ->select($columns)
            ->whereHas('category', function ($query) use($category) {
                $query->where('slug', $category);
            })
            ->where(DB::raw('CONCAT_WS(" ", name, second_name)'), 'like', "%{$search}%")
            ->with(['characteristics:name'])
            ->with(['comments'])
            ->orderBy('created_at', 'DESC')
            ->paginate($perPage);

        return $result;
    }

    /**
     * @param null $perPage
     * @return mixed
     */
    public function getAllUserReviews($perPage = 5)
    {
        $columns = ['id', 'user_id', 'review', 'review_category_id', 'name', 'second_name', 'created_at', 'rating', 'likes', 'dislikes', 'user_sign'];

        $result = $this->startConditions()
            ->select($columns)
            ->whereUserId(auth()->user()->id)
            ->with(['characteristics:name'])
            ->with(['user'])
            ->orderBy('created_at', 'DESC')
            ->paginate($perPage);

        return $result;
    }

    /**
     * @param null $perPage
     * @return mixed
     */
    public function getAllUserReviewWithMessages($perPage = 5)
    {
        $columns = ['id', 'user_id', 'review', 'review_category_id', 'name', 'second_name', 'created_at', 'rating', 'likes', 'dislikes', 'user_sign'];

        $userId = auth()->user()->id;

        $result = $this->startConditions()
            ->select($columns)
            ->with(['characteristics:name'])
            ->with(['user'])
            ->whereHas('messages', function ($query) use($userId){
                $query->where('from', $userId)
                    ->orWhere('to', $userId);
            })
            ->paginate($perPage);

        return $result;
    }
}

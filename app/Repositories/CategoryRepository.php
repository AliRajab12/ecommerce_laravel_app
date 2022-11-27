<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class CategoryRepository.
 */
class CategoryRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Category::class;
    }
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCategories(string $order='id', string $sort='desc',array $columns= ['*']){
        return $this->all($columns,$order,$sort);
    }

      /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

     public function findCategoryById(int $id){
        try{
            return $this->findOneOrFail($id);
        }catch(ModelNotFoundException $exception){
            throw new ModelNotFoundException($exception);
        }
     }
    /**
     * @param array $params
     * @return Category|mixed
     */
    public function createCategory(array $params){
        try{
            $collection = collect($params);

            $category->save();

            return $category;
        }catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    /**
     * @param array $params
     * @return mixed
     */
    public function updateCategory(array $params){
        $category = $this->findCategoryById($params['id']);

        $collection = collect($params)->except('_token');

        $category->update($collection);
        return $category;
    }
     /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteCategory(int $id){
        $category = $this->findCategoryById($id);

        $category->delete();

        return $category;
    }

    public function findBySlug($slug)
    {
        return Category::with('products')
            ->where('slug', $slug)
            ->first();
    }

}

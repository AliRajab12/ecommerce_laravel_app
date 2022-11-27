<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{

    /*
    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
    */
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Product::class;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }


    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findProductById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

     /**
     * @param array $params
     * @return Product|mixed
     */
    public function createProduct(array $params){
        try{
            // create a collection
            $collection = collect($params);

            // check if the featured attribute has a value or not
            $featured = $collection->has('featured') ? 1 : 0;

            $mergedCollection = $collection->merge('featured');

            $product = new Product($mergedCollection->all());

            $product->save();
            if($collection->has('categories')){
                $product->categories()->sync($params['categories']);
            }

            return $product();
        }catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProduct(array $params){
        $product = $this->findProductById($params['product_id']);

        $collection = collect($params)->except('_token');
        $featured = $collection->has('featured') ? 1 : 0;

        $mergedCollection = $collection->merge('featured');

        $product->update($merge->all());

        if ($collection->has('categories')) {
            $product->categories()->sync($params['categories']);
        }

        return $product;
    }
    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteProduct($id){
        $product = $this->findProductById($id);

        $product->delete();

        return $product;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findProductBySlug($slug){
        $product = Product::where('slug',$slug)->first();

        return $product;
    }
}

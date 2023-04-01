<?php

namespace App\Http\Controllers\API;

use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{
    //
    use apiResponse;

    /**
     * @OA\Get(
     *      path="/categories",
     *      operationId="getCategories",
     *      tags={"General"},
     *      summary="Get categories API",
     *      description="Get categories service",
     *      @OA\Response(
     *         response=200,
     *         description="OK",
     *         ),
     * )
     */
    public function index()
    {

        return $this->apiResponse(CategoryResource::collection(Category::all()), "تم تنفيذ الأمر بنجاح", Response::HTTP_OK);
    }
    public function show($id)
    {

        return $this->apiResponse(new CategoryResource(Category::findOrFail($id)), 'Done', Response::HTTP_OK);
    }
}

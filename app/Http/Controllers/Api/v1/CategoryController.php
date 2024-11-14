<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =  $this->category->paginate(10);

        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        $category = $this->category->create($request->all());

        return (new CategoryResource($category));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Verifico se existe esse $id no banco
        if(!$this->category->find($id)) {

            return response()->json([
                'message' => 'Categoria não encontrada!'
            ], 404);
        }

        $category = $this->category->find($id);

        return (new CategoryResource($category));

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Verifico se existe esse $id no banco
        if(!$this->category->find($id)) {

            return response()->json([
                'message' => 'Categoria não encontrada!'
            ], 404);
        }

        $category = $this->category->find($id);

        $update =  $category->update($request->all());

        if(!$update) {
            return response()->json([
                'message' => 'Não foi possível atualizar a categoria!'
            ], 401);
        }

        return response()->json([
            'message' => 'Categoria atualizada com sucesso!'
        ], 401);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //Verifico se existe esse $id no banco
         if(!$this->category->find($id)) {

            return response()->json([
                'message' => 'Categoria não encontrada!'
            ], 404);
        }

        $category = $this->category->find($id);

        $delete = $category->delete();

        if(!$delete) {
            return response()->json([
                'message' => 'Não foi possível deletar a categoria!'
            ], 401);
        }

        return response()->json([
            'message' => 'Categoria deletada com sucesso!'
        ], 401);
    }
}

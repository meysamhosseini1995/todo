<?php

namespace App\Http\Controllers\Api\Application\V1;


use App\Contracts\TodoRepositoryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Application\V1\Todo\StoreTodoRequest;
use App\Http\Requests\Api\Application\V1\Todo\UpdateTodoRequest;
use App\Http\Resources\Api\Application\V1\TodoResource;
use App\Models\Todo;
use App\Services\HttpResponse\Facades\HttpResponse;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


class TodoController extends Controller
{
    private TodoRepositoryContract $todoRepository;

    public function __construct(TodoRepositoryContract $todoRepository)
    {
        $this->todoRepository = $todoRepository;
        $this->middleware(["auth:sanctum"]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $result = $this->todoRepository->filter($request)->paginate(['user']);
        return TodoResource::collection($result);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request): TodoResource
    {
        $todo = $this->todoRepository->create($request->validated());
        return new TodoResource($todo);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): TodoResource
    {
        $todo = $this->todoRepository->findById($id,relations: ['user']);
        return new TodoResource($todo);
    }


    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(UpdateTodoRequest $request, Todo $todo): TodoResource
    {
        $this->authorize('update', $todo);
        $todo = $this->todoRepository->update($todo,$request->validated());
        return new TodoResource($todo);
    }

    /**
     * Remove the specified resource from storage.
     * @throws AuthorizationException
     */
    public function destroy(Todo $todo): JsonResponse
    {
        $this->authorize('delete', $todo);
        $this->todoRepository->deleteById($todo);
        return HttpResponse::success(['deleted_item' => $todo]);
    }
}

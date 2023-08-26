<?php

namespace App\Http\Controllers\Api;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupport;
use App\Http\Resources\SupportResource;
use App\Services\SupportService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SupportApiController extends Controller
{
    public function __construct(
        protected SupportService $service
        )
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $supports = Support::paginate();
        $supports = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 5),
            filter: $request->filter,
        );
        // dd($supports->items());
            return SupportResource::collection(collect($supports->items()))
            ->additional([
                'meta' => [
                    'total' => $supports->total(),
                    'is_first_page' => $supports->isFirstPage(),
                    'is_last_page' => $supports->isLastPage(),
                    'current_page' => $supports->currentPage(),
                    'next_page' => $supports->getNumberNextPage(),
                    'previous_page' => $supports->getNumberPreviousPage(),
                ]
            ]) ;
    }    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupport $request)
    {
        $support = $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );
        return (new SupportResource($support))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);;
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) //int?
    {
        if(!$support = $this->service->findSupportOne($id)) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new SupportResource($support);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSupport $request, string $id)
    {
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request, $id)
        );

        if (!$support) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new SupportResource($support);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->findSupportOne($id)) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}

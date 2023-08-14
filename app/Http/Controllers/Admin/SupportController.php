<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function __construct(protected SupportService $service)
    {

    }
    public function index(Request $request)
    {
        $supports = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 5),
            filter: $request->filter,
    );

    $filters = ['filter' => $request->get('filter', '')];
         //   dd($supports->items());
        return view('admin/supports/index', compact('supports', 'filters'));
    }


    public function create()
    {
        return view('admin/supports/create');
    }

    
    public function store(StoreSupport $request, Support $support)
    {
        $this->service->new(CreateSupportDTO::makeFromRequest($request));

      //  $support =  $support->create($data);
        //  dd($data);
        return redirect()->route('supports.index');
    }


    public function show(int $id)
    {
        $support = $this->service->getSupportOne($id);
        return view('admin/supports/show', compact('support'));
    }


    public function edit(Support $support, int $id)
    {
        // if(!$support = $support->where('id', $id)->first()){
        if(!$support = $this->service->getSupportOne($id)){
            return back();
        }

        return view('admin/supports/edit', compact('support'));
    }    

    public function update(StoreSupport $request, Support $support, int $id)
    {
        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));

        if(!$support){
            return back();
        }
       
        return redirect()->route('supports.index');
    }

    public function delete( int $id)
    {
        // $support = Support::find($id);
        // $support->delete();
        $this->service->delete($id);


        return redirect()->route('supports.index');
    }
}

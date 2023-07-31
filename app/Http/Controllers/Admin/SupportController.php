<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupport;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {

        $supports = $support->all();

        return view('admin/supports/index', compact('supports'));
    }


    public function create()
    {
        return view('admin/supports/create');
    }

    
    public function store(StoreSupport $request, Support $support)
    {
        $data = $request->all();
        $data['status'] = 'a';

        $support =  $support->create($data);
        //  dd($data);
        return redirect()->route('supports.index');
    }


    public function show(int $id)
    {
        $support = Support::find($id);
        return view('admin/supports/show', compact('support'));
    }


    public function edit(Support $support, int $id)
    {
        if(!$support = $support->where('id', $id)->first()){
            return back();
        }

        return view('admin/supports/edit', compact('support'));
    }    

    public function update(StoreSupport $request, Support $support, int $id)
    {
        if(!$support = $support->find($id)){
            return back();
        }
        // $support->update($request->only([
        //     'subject', 'body'
        // ]));
        // $support->fill($request->all())->save();

        $support->update($request->validated());
        return redirect()->route('supports.index');
    }

    public function delete( int $id)
    {
        $support = Support::find($id);
        $support->delete();

        return redirect()->route('supports.index');
    }
}

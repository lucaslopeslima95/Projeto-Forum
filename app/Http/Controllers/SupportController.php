<?php

namespace App\Http\Controllers;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Models\Support;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Services\SupportService;
use Illuminate\Http\Request;


class SupportController extends Controller{

    public function __construct(protected SupportService $service){}


    public function index(Request $request){
        $supports = $this->service->paginate(
            page:$request->get('page',1),
            totalPerpage:$request->get('per_page',1),
            filter:$request->filter
        );
        $filters = ['filter'=>$request->get('filter','')];

        return view('admin/supports/index',compact('supports','filters'));
    }

    public function show(string|int $id){
        if(!$support = $this->service->findOne($id)){
            return back();
        }
        return view('admin/supports/show',compact('support'));
    }

    public function create(){
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupportRequest $request){
        $this->service->new(CreateSupportDTO::makeFromRequest($request));
        return redirect()->route('supports.index');
    }

    public function edit(Support $support,string|int $id){

        if(!$support = $this->service->findOne($id)){
            return back();
        }
        return view('admin.supports.edit',compact('support'));
    }

    public function update(StoreUpdateSupportRequest $request){

        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));
        if(!$support){
            return back();
        }
        return redirect()->route('supports.index');
    }

    public function destroy(string|int $id){
        $this->service->delete($id);
        return redirect()->route('supports.index');

    }


}

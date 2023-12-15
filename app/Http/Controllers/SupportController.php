<?php

namespace App\Http\Controllers;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Models\Support;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Services\SupportService;
use Illuminate\Support\Facades\Request;

class SupportController extends Controller{

    public function __construct(protected SupportService $service){}


    public function index(Request $request){
        $supports = $this->service->getAll($request->filter);
        return view('admin/supports/index',compact('supports'));
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

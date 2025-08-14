<?php
namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    public function index(){ return Service::where('status','active')->get(); }
    public function store(ServiceRequest $request){return Service::create($request->validated()); }
    public function update(ServiceRequest $request,$id){
        $service = Service::findOrFail($id);
        $service->update($request->validated());
        return $service;
    }
    public function destroy($id){
        Service::findOrFail($id)->delete();
        return response()->json(['message'=>'Service deleted']);
    }
}

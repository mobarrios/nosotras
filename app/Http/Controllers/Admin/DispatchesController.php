<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Admin\Items;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Configs\BranchesRepo;
use App\Http\Repositories\Admin\BrandsRepo;
use App\Http\Repositories\Admin\ColorsRepo;
use App\Http\Repositories\Admin\DispatchesInvoicesRepo;
use App\Http\Repositories\Admin\DispatchesItemsRepo;
use App\Http\Repositories\Admin\DispatchesRepo as Repo;
use App\Http\Repositories\Admin\ItemsRepo;
use App\Http\Repositories\Admin\ModelsRepo;
use App\Http\Repositories\Admin\ProvidersRepo;
use App\Http\Repositories\Admin\PurchasesOrdersRepo;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;


class DispatchesController extends Controller
{
    protected $purchasesOrdersRepo ;
    public function __construct(Request $request, Repo $repo, Route $route, PurchasesOrdersRepo $purchasesOrdersRepo,
                                ModelsRepo $modelsRepo, ColorsRepo $colorsRepo, BrandsRepo $brandsRepo, ProvidersRepo $providersRepo,
                                BranchesRepo $branchesRepo)
    {

        $this->request = $request;
        $this->repo = $repo;
        $this->route = $route;

        $this->section = 'dispatches';
        $this->data['section'] = $this->section;

        //$this->data['purchasesOrders'] = $purchasesOrdersRepo->ListsData('id','name');

        $this->data['models_types'] = $modelsRepo->ListsData('name', 'id');
        $this->data['models_lists'] = $modelsRepo->ListsData('name', 'id');
        $this->data['colors'] = $colorsRepo->ListsData('name', 'id');
        

        $this->data['brands'] = $brandsRepo->getAllWithModels();
        $this->data['branches'] = $branchesRepo->ListsData('name', 'id');

        //$this->data['providers']    = $providersRepo->getModel()->with('PurchasesOrdersConfirmed')->get();
        $this->data['providers'] = $providersRepo->ListsData('name', 'id');


        $this->purchasesOrdersRepo = $purchasesOrdersRepo;
        $this->modelsRepo = $modelsRepo;


    }

    public function purchasesItems()
    {
        $this->data['section']=  'purchasesOrders';
        $this->data['activeBread'] = 'Items Orden de Compra';
        $this->data['purchasesOrders'] =  $this->purchasesOrdersRepo->find($this->route->getParameter('purchasesOrdersId'))->PurchasesOrdersItems;
        $this->data['dispatchesId'] =  $this->route->getParameter('dispatchesId');

        return view('admin.dispatches.formPurchasesOrders')->with($this->data);
    }


    public function edit()
    {
        $model = $this->repo->find($this->route->getParameter('id'));
        $modelos = $model->Providers->ModelsByProviders->toArray();

        $purchases = $this->purchasesOrdersRepo->getModel()->where('providers_id', $model->providers_id)->get()->lists('id', 'id');

        //$modelos->put(0,'Seleccione...');

        $modelos[0] = "Seleccione...";

        ksort($modelos);

        $this->data['modelos'] = $modelos;
        $this->data['providers_dispatches'] = $purchases;


        return parent::edit(); // TODO: Change the autogenerated stub
    }

    public function addItems(DispatchesItemsRepo $dispatchesItemsRepo, ItemsRepo $itemsRepo)
    {
        // $item_data = ['serial_number'=> $this->request->serial_number or null,'models_id' => $this->request->models_id, 'n_motor' => $this->request->n_motor, 'n_cuadro' => $this->request->n_cuadro, 'talle' => $this->request->talle, 'colors_id' => $this->request->colors_id, 'status' => '1'];
        $item_data = ['serial_number'=> $this->request->serial_number ,'models_id' => $this->request->models_id,  'status' => '1'];

        //$item = new Items();
        //$item->fill($item_data);
        //$item->save();

        $item = $itemsRepo->create($item_data);

        // AGREGA BRANCHEABLES
       // $item->brancheables()->create(['branches_id' => Auth::user()->branches_active_id]);

        $this->request['items_id'] = $item->id;


        if ($this->request->ajax) {

            $dItems = $dispatchesItemsRepo->find($this->request->dispatches_items_id);
            $dItems->dispatches_id = $this->request->dispatches_id;
            $dItems->items_id = $item->id;
            $dItems->save();

            //return response()->json($dItems);

            return redirect()->back();
        } else {
            // $dispatchesItemsRepo->create($this->request);

           // return redirect()->route('moto.dispatches.edit', $this->request->dispatches_id);
            return redirect()->back();
        }
    }

    public function editItems(DispatchesItemsRepo $dispatchesItemsRepo)
    {
        $this->data['modelItems'] = $dispatchesItemsRepo->find($this->route->getParameter('item'));

        return parent::edit();
    }

    public function updateItems(DispatchesItemsRepo $dispatchesItemsRepo, $id)
    {
        $dispatchesItemsRepo->update($id, $this->request);

        return parent::edit();
    }

    public function deleteItems(DispatchesItemsRepo $dispatchesItemsRepo)
    {
        $dispatchesItemsRepo->destroy($this->route->getParameter('item'));

        return parent::edit();
    }


    public function findItems($purchasesOrdersItemsId, DispatchesItemsRepo $dispatchesItemsRepo)
    {
        // dispatches items where dispatches items is not asigned

        //dd($dispatchesItemsRepo->getModel()->where('purchases_orders_items_id',$purchasesOrdersItemsId)->get());

        $items = $dispatchesItemsRepo->getModel()
            ->whereHas('PurchasesOrdersItems', function ($q) use ($purchasesOrdersItemsId) {
                $q->where('purchases_orders_id', $purchasesOrdersItemsId);
            })
            ->with('PurchasesOrdersItems')
            ->with('PurchasesOrdersItems.DispatchesItems')
            ->with('PurchasesOrdersItems.Models')
            ->with('PurchasesOrdersItems.Models.Brands')
           // ->with('PurchasesOrdersItems.Colors')
            ->where('dispatches_id', null)
            ->get();

        return response()->json($items);
    }


    public function invoice(DispatchesInvoicesRepo $dispatchesInvoicesRepo)
    {

            $dispatchesInvoicesRepo->create($this->request);

        return redirect()->back();
        
    }





}
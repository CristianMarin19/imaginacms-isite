<?php

namespace Modules\Isite\Http\Livewire\Index;

use Livewire\Component;
use Livewire\WithPagination;
use App;

use Illuminate\Http\Request;

class ItemsList extends Component
{

    use WithPagination;

   
    private $firstRequest;

    public $moduleName;
    public $repository;
    public $itemComponentName;
    public $entityName;
    public $responsiveTopContent;

    public $totalItems = 0;

    public $search = '';

    private $order;
    // OrderBy to URL
    public $orderBy;

    public $configs;
    public $itemListLayout;
    public $layoutClass;

    public $wrapperClass;
    public $pagination;
    public $showTitle;
    public $amount;

    public $take;

    public $moduleParams = [];
    public $filter = [];

    protected $paginationTheme = 'bootstrap';
    protected $emitItemListRendered;


    /**
    * Listeners
    */
    protected $listeners = ['getData','itemsListClearValues'];
    

    /**
    * Query String
    */
    protected $queryString = [
        'search' => ['except' => ''],
        'filter' => ['except' => []],
        'page' => ['except' => 1]
    ];
    
	/*
    * Runs once, immediately after the component is instantiated,
    * but before render() is called
    */
	public function mount( Request $request, $itemListLayout = null, $moduleName = "isite", $entityName = "item", $itemComponentName = "isite::item-list", $params = [] , $responsiveTopContent = null, $showTitle = true, $pagination = null
    ){


        $this->moduleName = strtolower($moduleName);
        $this->entityName = strtolower($entityName);
        $this->itemComponentName = $itemComponentName;

        $this->repository = "Modules\\". ucfirst($this->moduleName) . "\Repositories\\" . ucfirst($entityName).'Repository';

        $this->moduleParams = $params;

        $this->page = $this->moduleParams['page'] ?? 1;
        $this->take = $this->moduleParams['take'] ?? 12;
       
        $this->responsiveTopContent = $responsiveTopContent ?? ["mobile" =>  true, "desktop" => true];

        $this->showTitle = $showTitle;
      
        $this->pagination = $pagination ? array_merge(['show' => true , 'type' => 'normal'],$pagination) : ['show' => true , 'type' => 'normal'];

        $this->initConfigs();
        $this->initValuesOrderBy();
        $this->initValuesLayout($itemListLayout);
        $this->initRequest();
       
	}

    /*
    * Init Configs
    *
    */
    public function initConfigs(){

        $this->configs['orderBy'] = config("asgard.{$this->moduleName}.config.orderBy") ?? config("asgard.isite.config.orderBy");
        $this->configs['itemListLayout'] = config("asgard.{$this->moduleName}.config.layoutIndex") ?? config("asgard.isite.config.layoutIndex");
    }

    /*
    * Init Values Orderby
    *
    */
    public function initValuesOrderBy(){

        // OrderBy to URL
        $this->orderBy = $this->configs['orderBy']['default'] ?? "nameaz";
        $this->order = $this->configs['orderBy']['options'][$this->orderBy]['order'];

    }

    /*
    * Init Values To ChangeLayout
    *
    */
    public function initValuesLayout($itemListLayout){

        $this->itemListLayout = $itemListLayout ?? $this->configs['itemListLayout']['default'] ?? "four";
        $this->layoutClass = $this->configs['itemListLayout']['options'][$this->itemListLayout]['class'];

        $this->wrapperClass = $this->configs['itemListLayout']['options'][$this->itemListLayout]['wrapperClass'] ?? 'row';
    } 


    /*
    * Listener - GET DATA FROM FILTERS
    *
    */
    public function getData($params){

        //\Log::info("ITEMLIST - GETDATA - PARAMS: ".json_encode($params));

        if(isset($params["filter"])){
            $this->emitItemListRendered = true;
            $this->filter = array_merge($this->filter, $params["filter"]);
            $this->resetPage();
        }
        
        if(isset($params["order"])){
            $this->emitItemListRendered = false;
            $this->orderBy = $params['order'];
            $this->resetPage();
        }

        /*
        if(isset($params["layout"])){
            array_merge($this->layout, $params["layout"]);
        
        }
        */

    }

    /*
    * Init Request
    *
    */
    public function initRequest(){
        $this->firstRequest = true;
        $this->emitItemListRendered = false;
        $this->fill(request()->only('search', 'filter','page','orderBy'));
    }

    /*
    * Function Frontend - When change the layout
    *
    */
    public function changeLayout($c){
        $this->itemListLayout = $c;
        $this->layoutClass = $this->configs['itemListLayout']['options'][$this->itemListLayout]['class'];
    }

    /*
    * Listener 
    * Clear Values
    */
    public function itemsListClearValues(){
        //\Log::info($this->name."- CLEAR VALUES FILTER");
        $this->filter = [];
        $this->emitItemListRendered = true;

    }

    /*
    * Function Frontend - Load More Button
    *
    */
    public function loadMore(){
        $this->take += $this->moduleParams['take'];
    }

     /*
    * Make params to Repository
    * before execcute the query
    */
    public function makeParamsToRepository(){

        if($this->firstRequest)
            $this->firstRequest = false;

        // To First Time and Others
        $this->order = $this->configs['orderBy']['options'][$this->orderBy]['order'];
        
        if(is_string($this->search) && $this->search){
          $this->filter["search"] = $this->search;
          $this->filter["locale"] = App::getLocale();
        }

        $params = [
            "include" => $this->moduleParams['include'] ?? [],
            "take" => $this->take,
            "page" => $this->page,
            "filter" => $this->filter,
            "order" =>  $this->order
        ];
       
        if(isset($this->moduleParams['filter']) && !empty($this->moduleParams['filter']) ){
             $params["filter"] = array_merge_recursive($params["filter"], $this->moduleParams['filter']); 
        }

        return $params;
        
    }

    /*
    * Get Item Repository
    *
    */
    private function getItemRepository(){
        return app($this->repository);
    }

   
    /*
    * Render
    *
    */
    public function render(){
        
        
        if(!$this->firstRequest && !in_array('orderBy', $this->queryString)){
            array_push($this->queryString, 'orderBy');
        }

        $params = $this->makeParamsToRepository();

        //\Log::info("ITEM LIST - RENDER - PARAMS QUERY ".json_encode($params));
        
        $items = $this->getItemRepository()->getItemsBy(json_decode(json_encode($params)));

        $this->totalItems = $items->total();

        $tpl = 'isite::frontend.livewire.index.items-list';

        // Add value name to order on Filter
        $params ['orderBy'] = $this->orderBy;

        // Emit Finish Render
        //\Log::info("Emit list rendered: ".json_encode($this->emitItemListRendered));
        $this->emitItemListRendered ? $this->emit('itemListRendered', $params) : false;

        return view($tpl,['items'=> $items, 'params' => $params]);
        
    }

}
<?php namespace Shohabbos\RestaurantMenu\Controllers\Api;

use Cms\Classes\Controller;
use BackendMenu;

use Illuminate\Http\Request;
use Shohabbos\RestaurantMenu\Helpers\Helpers;
use Shohabbos\RestaurantMenu\Models\Item;
class ItemController extends Controller
{
    protected $Item;

    protected $helpers;

    public function __construct(Item $Item, Helpers $helpers)
    {
        parent::__construct();
        $this->Item    = $Item;
        $this->helpers          = $helpers;
    }

    
    public function index(){ 
        $data = $this->Item->with(
                array(
                    'photos'=>function($query){
                        $query->select('*');
                    },
                    'category'=>function($query){
		                $query->select('*');
		            },
                )
            )->select('*')->get()->toArray();
        return $this->helpers->apiArrayResponseBuilder(200, 'success', $data);
    }

    
    public function show($id){ 
        $data = $this->Item->with(array(
            'category'=>function($query){
                $query->select('*');
            },
            'photos'=>function($query){
                $query->select('*');
            }, ))->select('*')->where('id', '=', $id)->first();
        return $this->helpers->apiArrayResponseBuilder(200, 'success', $data);
    }

    public function store(Request $request){

        $arr = $request->all();

        while ( $data = current($arr)) {
            $this->Item->{key($arr)} = $data;
            next($arr);
        }

        $validation = Validator::make($request->all(), $this->Item->rules);
        
        if( $validation->passes() ){
            $this->Item->save();
            return $this->helpers->apiArrayResponseBuilder(201, 'created', ['id' => $this->Item->id]);
        }else{
            return $this->helpers->apiArrayResponseBuilder(400, 'fail', $validation->errors() );
        }

    }

    public function update($id, Request $request){

        $status = $this->Item->where('id',$id)->update($data);
    
        if( $status ){
            
            return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been updated successfully.');

        }else{

            return $this->helpers->apiArrayResponseBuilder(400, 'bad request', 'Error, data failed to update.');

        }
    }

    public function delete($id){

        $this->Item->where('id',$id)->delete();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been deleted successfully.');
    }

    public function destroy($id){

        $this->Item->where('id',$id)->delete();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been deleted successfully.');
    }


    public static function getAfterFilters() {return [];}
    public static function getBeforeFilters() {return [];}
    public static function getMiddleware() {return [];}
    public function callAction($method, $parameters=false) {
        return call_user_func_array(array($this, $method), $parameters);
    }
    
}

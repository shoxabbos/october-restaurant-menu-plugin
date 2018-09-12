<?php namespace shohabbos\RestaurantMenu\Controllers\Api;

use Cms\Classes\Controller;
use BackendMenu;

use Illuminate\Http\Request;
use shohabbos\RestaurantMenu\Helpers\Helpers;
use shohabbos\RestaurantMenu\Models\Category;
class CategoryController extends Controller
{
    protected $Category;

    protected $helpers;

    public function __construct(Category $Category, Helpers $helpers)
    {
        parent::__construct();
        $this->Category    = $Category;
        $this->helpers          = $helpers;
    }

    
    public function index(){ 
        $data = $this->Category->with(
                array(
                    'photo'=>function($query){
                        $query->select('*');
                    }
                )
            )->select('*')->get()->toArray();
        return $this->helpers->apiArrayResponseBuilder(200, 'success', $data);
    }

    
    public function show($id){ 
        $data = $this->Category->with(array(
            'items'=>function($query){
                $query->select('*')->with([
                    'photos'=>function($query){
                        $query->select('*');
                    }
                ]);
            },
            'photo'=>function($query){
                $query->select('*');
            }, ))->select('*')->where('id', '=', $id)->first();
        return $this->helpers->apiArrayResponseBuilder(200, 'success', $data);
    }

    public function store(Request $request){

        $arr = $request->all();

        while ( $data = current($arr)) {
            $this->Category->{key($arr)} = $data;
            next($arr);
        }

        $validation = Validator::make($request->all(), $this->Category->rules);
        
        if( $validation->passes() ){
            $this->Category->save();
            return $this->helpers->apiArrayResponseBuilder(201, 'created', ['id' => $this->Category->id]);
        }else{
            return $this->helpers->apiArrayResponseBuilder(400, 'fail', $validation->errors() );
        }

    }

    public function update($id, Request $request){

        $status = $this->Category->where('id',$id)->update($data);
    
        if( $status ){
            
            return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been updated successfully.');

        }else{

            return $this->helpers->apiArrayResponseBuilder(400, 'bad request', 'Error, data failed to update.');

        }
    }

    public function delete($id){

        $this->Category->where('id',$id)->delete();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been deleted successfully.');
    }

    public function destroy($id){

        $this->Category->where('id',$id)->delete();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been deleted successfully.');
    }


    public static function getAfterFilters() {return [];}
    public static function getBeforeFilters() {return [];}
    public static function getMiddleware() {return [];}
    public function callAction($method, $parameters=false) {
        return call_user_func_array(array($this, $method), $parameters);
    }
    
}

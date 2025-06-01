<?php
namespace system\router;
use application\model\Products as ProductsModel;
use application\model\Category;
use ReflectionMethod;
use system\traits\Mytrait;

class Routing{
    use Mytrait;
    private $current_route;
    public function __construct()
    {
        global $current_url;
        $current_route = $this->current_route = explode('/',$current_url);
        if ($current_route[0] == ""){
            $product=new ProductsModel();
            $products = $product->all();
            $category=new Category();
            $categories = $category->all();
            $this->view('app.index',compact('products'));
//            $this->view('app.index');
            die();
        }
    }

    public function run()
    {
        $path=realpath(dirname(__FILE__)."/../../application/controller/".$this->current_route[0].".php");
        if (!file_exists($path)){
            echo "404 - صفحه مور نظر پیدا نشد";
            die();
        }
        sizeof($this->current_route) == 1 ? $method='index' : $method=$this->current_route[1];
        $class="application\controller\\".$this->current_route[0];
        $object=new $class();
        if (method_exists($object,$method)) {
            $reflection=new ReflectionMethod($class,$method);
            $parametercount= $reflection->getNumberOfRequiredParameters();
            if($parametercount <=  count(array_slice($this->current_route,2))){
                call_user_func_array(array($object,$method), array_slice($this->current_route,2));
            }
            else {
                echo "404 - پارامتری برای متد وجود ندارد";
            }
        }
        else{
            echo "404 - متد مورد نظر وجود ندارد";
        }
    }
}

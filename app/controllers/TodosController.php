<?php
namespace controllers;
use Ubiquity\attributes\items\router\Route;

 /**
 * Controller TodosController
 **/
class TodosController extends ControllerBase{

    const CACHE_KEY = 'datas/lists/';
    const EMPTY_LIST_ID='not saved';
    const LIST_SESSION_KEY='list';
    const ACTIVE_LIST_SESSION_KEY='active-list';

	#[Route(path: "todos/delete/{index}", name:'todos.delete', methods:['get'])]
	    public function deleteElement($index){
		
	    }

    #[Route(path: "todos/add", name:'todos.add', methods:['post'])]
    	public function addElement(){

    	}

    #[Route(path: "todos/edit/{index}", name:'todos.edit', methods:['post'])]
    	public function editElement($index){

    	}

    #[Route(path: "todos/loadList/{index}", name:'todos.loadList', methods:['get'])]
    	public function loadList($uniqid){

    }

    #[Route(path: "todos/loadList", name:'todos.loadListPost', methods:['post'])]
    	public function loadListFromForm(){

    }

    #[Route(path: "todos/new/{index}", name:'todos.new', methods:['get'])]
    	public function newlist($force){

    	}

    #[Route(path: "todos/saveList", name:'todos.save', methods:['get'])]
    	public function saveList(){

    	}

     #[Route(path:"_default", name:'home' )]
        public function index(){
           if(USession::exists(self::LIST_SESSION_KEY)) {
               $list = USession::get(self::LIST_SESSION_KEY, []);
               return $this->display($list);
           }
           $this->showMessage('Bienvenue !','TodoLists permet de gerer des listes...','info','info circle outline');
        }

    private function menu(){

        $this->loadView(viewName: 'TodosController/menu.html');


    }


}

<?php
namespace controllers;
 use models\Organization;
 use Ubiquity\orm\DAO;

 /**
  * Controller OrgaController
  */
class OrgaController extends ControllerBase{

    #[Route(path: "orga",name: "orga.index2")]
	public function index(){
		$orgas=DAO::getAll(  Organization::class,  "", "name like '%uni%'", ['groupes.users']);
		var_dump($orgas);
		$this->loadView( "OrgaController/index.html", ['orgas'=> $orgas]);
	}

	
	public function getOne($idOrga){
		
		$this->loadView('OrgaController/getOne.html');

	}

}

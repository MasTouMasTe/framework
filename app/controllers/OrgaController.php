<?php
namespace controllers;
 use models\Organization;
 use models\User;
 use Ubiquity\orm\DAO;
 use Ubiquity\utils\http\URequest;

 /**
  * Controller OrgaController
  */
 class OrgaController extends ControllerBase{
     #[Route('orga')]
     public function index(){
         //$orgas=DAO::getAll(Organization::class, "like '%uni%'",true);
         //$this->loadView("OrgaController/index.html",['orga'=>$orgas]);
     }

     #[Route(path: "orga",name: "orga.index2")]
     public function index2(){
         $orgas=DAO::getAll(Organization::class, "",false);
         $this->loadView("OrgaController/index.html",['orgas'=>$orgas]);
     }


     #[Route(path: "orga/{idOrga}",name: "orga.getOne")]
     public function getOne($idOrga){
         $orga=DAO::getById(Organization::class, $idOrga,['groupe.users']);
         $this->loadDefaultView(['orga'=>$orga]);
     }

     #[Route()]
     public function getOrga($name, $aliases){
        $orga = DAO::getOne(Organization::classe,"name= ? and aliases= ?",false, parameters:[$name, $aliases]);
     }

     public function testInsert(){
         $groupe = new Groupe();
         URequest::setValuesToObject($groupe);
         $idOrga=URequest::post('idOrga');
         $orga=DAO::getById(Organization::class,$idOrga);
         $groupe->setOrganization($orga);
         DAO::insert($orga);
     }

     public function testUpdate(){
         $groupe=DAO::getById(Groupe::class,URequest::post('idGroupe'));
         URequest::setValuesToObject($groupe);
         $idOrga=URequest::post('idOrga');
         $orga=DAO::getById(Organization::class,$idOrga);
         $groupe->setOrganization($orga);
         $idUsers=explode(',',URequest::post('idUsers'));
         $users=DAO::getAllByIds(User::class,$idUsers);
         foreach($users as $user){
             $groupe->addUsers($user);
         }
         DAO::update($orga, true);
     }

 }
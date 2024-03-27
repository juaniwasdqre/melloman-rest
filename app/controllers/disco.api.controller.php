<?php
    require_once 'app/controllers/api.controller.php';
    require_once 'app/models/albums.model.php';

    class AlbumApiController extends ApiController {
        private $model;

        function __construct() {
            parent::__construct();
            $this->model = new DiscosModel();
        }

        function verificarParametro($parametro) {
            $discos = $this->model->getDiscos();
            $disco=$discos[0];
            return array_key_exists($parametro, $disco);      
        }

        //GET
        function get($params = []) {
            if (empty($params)){
                //Doy la opción de mostrar albums ordenados por cada campo de la tabla
                if(isset($_GET['sort'])&&(isset($_GET['order']))){                    
                    $ordenador = $_GET['sort'];
                    $orden = $_GET['order']; 
                    //controlo que lo ingresado en $ordenador sea una de las columnas
                    if ($this->verificarParametro($ordenador)){
                        //verifico si $orden esta correctamente ingresado
                        if($orden=='asc'||$orden=='desc'||$orden=='ASC'||$orden=='DESC'){
                            $discos = $this->model->getDiscosOrdered($ordenador, $orden);
                            $this->view->response($discos, 200);
                        }
                        else{
                            $this->view->response('el valor de ORDER no es correcto.', 400);
                        }
                    }
                    else{
                        $this->view->response(
                            'La tabla no posee ese valor!.'
                            , 404);
                    }                                     
                }
            }
        }

        //DELETE
        function delete($params = []) {
            $id = $params[':ID'];
            $disco = $this->model->getDiscoById($id);
            if($disco) {
                $this->model->borrarDisco($id);
                $this->view->response('El disco '.$disco[0]->title.' de '.$disco[0]->artist.' se borro.', 200);
            } else {
                $this->view->response('El album no existe.', 404);
            }
        }
    }

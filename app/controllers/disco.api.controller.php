<?php
    require_once 'app/controllers/api.controller.php';
    require_once 'app/models/discos.model.php';
    require_once 'app/models/model.php';
    require_once 'app/views/api.view.php';

    class DiscosApiController extends ApiController {
        private $model;
        function __construct() {
            parent::__construct();
            $this->model = new DiscosModel();
        }

        //GET
        function get($params = []) {
            if (empty($params)) {
                $discos = $this->model->getDiscos();
                $this->view->response($discos, 200);
            } else {
                $disco = $this->model->getDiscoById($params[':ID']);
                if (!empty($disco)) {
                    $this->view->response($disco, 200);
                } else {
                    $this->view->response(['msg'=>'el disco con el id:'.$params[':ID'].' no existe'], 404);
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
                $this->view->response('El disco con id:'.$id.' no existe.', 404);
            }
        }

        //POST
        function create($params = []) {
            $body = $this->getData();

            $title = $body->title;
            $artist = $body->artist;
            $dyear = $body->dyear;
            $producer = $body->producer;
            $genre = $body->genre;

            $id = $this->model->agregarDisco($title, $artist, $dyear, $producer, $genre);

            $this->view->response('El disco fue agregado con el id:'.$id,201);
        }

        function verificarParametro($parametro) {
            $discos = $this->model->getDiscos();
            $disco=$discos[0];
            return array_key_exists($parametro, $disco);      
        }

        /* //GET
        function get($params = null) {
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
        } */
    }

<?php
class DiscosModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_melloman;charset=utf8', 'root', '');
    }

    /* obtiene y devuelve la base de datos con LOS DISCOS */
    function getDiscos() {
        $query = $this->db->prepare('SELECT * FROM discos');
        $query->execute();
        //envia la consulta prepare y execute

        //$discos es un arreglo de discos
        //y obtengo la respuesta con un fetchAll
        $discos = $query->fetchAll(PDO::FETCH_OBJ);

        return $discos;
    }

    /* INSERTA un nuevo disco (solo admin) */
    function agregarDisco($title, $artist, $year, $producer, $genre) {
        $query = $this->db->prepare('INSERT INTO discos (title,artist,dyear,producer,genre) VALUES(?,?,?,?,?)');
        $query->execute([$title, $artist, $year, $producer, $genre]);

        return $this->db->lastInsertId();
    }

    function borrarDisco($id) {
        $query = $this->db->prepare('DELETE FROM discos WHERE album_id = ?');
        $query->execute([$id]);
    }

    function getGeneros() {
        $query = $this->db->prepare('SELECT DISTINCT genre FROM discos');
        $query->execute();
        $generos = $query->fetchAll(PDO::FETCH_OBJ);
        return $generos;
    }

    function getByGenre($genero) {
        $query = $this->db->prepare('SELECT * FROM discos WHERE genre = ?');
        $query->execute([$genero]);
        $discos = $query->fetchAll(PDO::FETCH_OBJ);
        return $discos;
    }
    
    function getDiscoById($id) {
        $query = $this->db->prepare('SELECT * FROM discos WHERE album_id = ?');
        $query->execute([$id]);
        $disco = $query->fetchAll(PDO::FETCH_OBJ);
        return $disco;

    }

    public function getDiscosOrdered($ordenador, $orden){
        $query = $this->db->prepare('SELECT * FROM discos ORDER BY '.$ordenador.' '.$orden);
        $query->execute();
        $albums = $query->fetchAll(PDO::FETCH_OBJ);
        return $albums;
    }

}
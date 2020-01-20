<?php
interface GETSET{
    public function __GET($parametro);
    public function __SET($parametro,$valor);
}

interface Crud{    
    public function Obtener($parametro);
    public function Eliminar($parametro);      
}

interface Semestres{
    public function Obtener($parametro);
}

interface InterfaceListar{
    public function Listar();
    public function ListarxParametro($pidp);
}

interface PorTablas{
    public function ListarxTablas();   
}

interface MateriasProgramas{
    public function ListarMateriasPrograma($pcodprograma,$pcodsemestre);
}


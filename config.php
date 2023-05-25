
<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("db.php");
class Config{

    private $id;
    private $nombre;
    private $direccion;
    private $logros;
    private $skills;
    private $ser;
    private $ingles;
    private $review;
    protected $dbCnx;

    public function __construct($id=0, $nombre="", $direccion="", $logros="", $skills="", $ser="", $ingles="", $review=""){
        
        $this->id=$id;
        $this->nombre=$nombre;
        $this->direccion = $direccion;
        $this->logros=$logros;
        $this->skills=$skills;
        $this->ser=$ser;
        $this->ingles=$ingles;
        $this->review=$review;
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setDireccion($direccion){
        $this->direccion=$direccion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setLogros($logros){
        $this->logros=$logros;
    }
    public function getLogros(){
        return $this->logros;
    }
    public function setSkills($skills){
        $this->skills=$skills;
    }
    public function getSkills(){
        return $this->skills;
    }
    public function setSer($ser){
        $this->ser=$ser;
    }
    public function getSer(){
        return $this->ser;

    } public function setIngles($ingles){
        $this->ingles=$ingles;
    }
    public function getIngles(){
        return $this->ingles;
    }
    public function setReview($review){
        $this->review=$review;
    }
    public function getReview(){
        return $this->review;
    }

    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO campers (nombre, direccion , logros, skills , ser, ingles , review) VALUES (?,?,?,?,?,?,?)");
            $stm -> execute([$this->nombre , $this->direccion , $this->logros, $this->skills, $this->ser, $this->ingles, $this->review]); 
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
    } 
    public function obtainAll(){
        try {
            $stm= $this->dbCnx->prepare("SELECT * FROM campers");
            $stm-> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function delete(){
        try{
            $stm = $this->dbCnx->prepare("DELETE FROM campers WHERE id = ?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
            echo "<script> alert('Los datos fueron guardados satisfactoriamente');document.location='estudiantes.php'</script>";
        } catch(Exception $e){
            return $e->getMessage();
        }
    }
    public function selectOne(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM campers WHERE id= ?");
            $stm->execute([$this->id]);
            return $stm -> fetchAll();
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->dbCnx->prepare("UPDATE campers SET nombre=?, direccion=?, logros=? WHERE id=?");
            $stm->execute([$this->nombre , $this->direccion , $this->logros,$this->id]);
        } catch(Exception $e){
            return $e->getMessage();
        }
    }
}
?>
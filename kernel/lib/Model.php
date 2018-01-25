<?php
require LIB."DB.php";
abstract class Model extends DB{
	private $table;
	private $primaryKey;
	private $arraysys;
	private $defaultOrder;
	protected $belongTo = array();
	protected $primarySerial = true;

	public function __construct($table,$primaryKey){
		$this->table = $table;
		$this->primaryKey = $primaryKey;
		$this->arraysys = array_keys(get_class_vars(__CLASS__));
		if(is_array($primaryKey)){
            $this->defaultOrder = array_values($primaryKey)[0];
        }else{
            $this->defaultOrder = $primaryKey;
        }

	}

    /*
     * Fucntion create
     * Add a new row in the table
     */
	public function create(){
		foreach (get_object_vars($this) as $k => $v){
			if(!in_array($k,$this->arraysys) AND $v !== null AND (is_array($this->primaryKey) OR ($k != $this->primaryKey OR !$this->primarySerial))){
                $varKey[] = $k;
				$varValue[":".$k] = $v;
			}
        }
        if(isset($this->created)){
            if(!in_array("created",$varKey)) {
                $varKey[] = "created";
            }
            $varValue[":created"] = date('Y-m-d H:i:s');
        }
        if(isset($this->updated)){
		    if(!in_array("updated",$varKey)) {
                $varKey[] = "updated";
            }
            $varValue[":updated"] = date('Y-m-d H:i:s');
        }
		$req = "INSERT INTO \"$this->table\" (\"".implode("\",\"",$varKey)."\") VALUES (:".implode(",:",$varKey).")";
//		foreach($varValue as $k => $v){
//		    $req = str_replace($k,"'".$v."'",$req);
//        }
//		echo $req;
        $this->connect();
		$res = $this->db->prepare($req);
		$bool = $res->execute($varValue);
		$this->disconnect();
		return($bool);
	}

    /*
     * Function update
     * Update a row in the table
     */
	public function update(){
		$id = $this->primaryKey;
	    $req = "UPDATE \"$this->table\" SET ";
		$varTabs = array();
		$varVals = array();
	    foreach (get_object_vars($this) as $k => $v){
	        if(!in_array($k,$this->arraysys) AND $k != $this->primaryKey){
                $varTabs[] = "\"$k\"=:$k";
				$varVals[":".$k] = $v;
            }
        }
        if(isset($this->modified)){
            $varKey[] = "modified";
            $varVals[":modified"] = date('Y-m-d H:i:s');
        }
        if(is_array($id) && count($id) == count( $id)){
            $i = 0;
            foreach($id as $a){
                $varPrimary[] = "\"". $a."\"=:". $a;
                $varVals[":". $a] = $this->$a;
                $i++;
            }
        }else{
            $varPrimary[] = "\"".$id."\"=:".$id;
            $varVals[":".$id] = $this->$id;
        }
		$req = $req.implode(",",$varTabs)." WHERE ".implode(" AND ",$varPrimary);
//		foreach($varVals as $k => $v){
//		    $req = str_replace($k,"'".$v."'",$req);
//        }
//		echo $req;
		$this->connect();
		$res = $this->db->prepare($req);
		$res->execute($varVals);
		$this->disconnect();
	}

    /*
      * Function read
      * @param $id int
      * Set all attributs of this object by reading in the table with the id given in param
      */
	public function read($id){
        $varTabs = array();
        $varVals = array();
	    if(is_array($id) && count($id) == count($this->primaryKey)){

           $i = 0;
            foreach($id as $a){
                $varTabs[] = "\"".$this->primaryKey[$i]."\"=:".$this->primaryKey[$i];
                $varVals[":".$this->primaryKey[$i]] = $a;
                $i++;
            }
        }else{
            $varTabs[] = "\"$this->primaryKey\"=:$this->primaryKey";
            $varVals[":".$this->primaryKey] = $id;
        }
		$req = "SELECT * FROM \"$this->table\" WHERE ".implode(" AND ",$varTabs);

		$this->connect();
        $res = $this->db->prepare($req);
        $res->execute($varVals);
		$this->disconnect();
		if($res){
            $data = $res->fetch(PDO::FETCH_ASSOC);
        }
		if($data == null){
		    $stat = false;
        }else{
		    $stat = true;
            foreach($data as $key => $value){
                $this->$key = $value;
            }
        }
        return($stat);
	}

    /*
     * Function delete
     * @param $id int
     * Delete in the table the row with id given in param
     */
	public function delete($id){
        $varTabs = array();
        $varVals = array();
        if(is_array($id) && count($id) == count($this->primaryKey)){
            $i = 0;
            foreach($id as $a){
                $varTabs[] = "\"".$this->primaryKey[$i]."\"=:".$this->primaryKey[$i];
                $varVals[":".$this->primaryKey[$i]] = $a;
                $i++;
            }
        }else{
            $varTabs[] = "\"$this->primaryKey\"=:$this->primaryKey";
            $varVals[":".$this->primaryKey] = $id;
        }
		$req = "DELETE FROM \"$this->table\" WHERE ".implode(" AND ",$varTabs);
		$this->connect();
        $res = $this->db->prepare($req);
        $res->execute($varVals);
		$this->disconnect();
	}

    /*
     * Function readAll
     * @param $cond string sql condition
     * Return all row that match to the condition given in param
     */
	public function readAll($cond = "1=1"){
		$req = "SELECT * FROM \"$this->table\" WHERE $cond ORDER BY $this->defaultOrder";
        $this->connect();
        $res = $this->db->query($req);
        $this->disconnect();
        if($res) {
            while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
                $tmp[] = $data;
            }
        }
        return($tmp);
	}
	public function postToObj(){
	    foreach($_POST as $k => $v){
	        if(isset($this->$k)){
	            $this->$k = $v;
            }
        }
    }
    /*
 * Function getAll
 * Return all atributs of the current object in array
 */
	public function getAll(){
	    $vars = get_object_vars($this);
	    $realVars = array();
        foreach($vars as $k => $v){
            if(!in_array($k,$this->arraysys)){
                $realVars[$k] = $v;
            }
        }
	    return($realVars);
    }
    public function execSql($req){
        $this->connect();
        $res = $this->db->query($req);
        $this->disconnect();
        if($res) {
            while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
                $tmp[] = $data;
            }
        }else{
            $tmp = false;
        }
        return($tmp);
    }
    public function getBelongTo(){
        return($this->belongTo);
    }

}

?>
<?php
require_once(LIB."Controller.php");
class ApiController extends Controller
{
    public function __construct()
    {
        $this->layout = "Json";
        $this->models = array("Skill", "Level","Candidate","Experience");
        parent::__construct();
    }
    public function index(){

    }
    public function skill($query = null){
        if($query){
            $tmp = $this->Skill->readAll('"label" LIKE \'%'.htmlentities(strtolower($query)).'%\'');
            if($tmp) {
                foreach ($tmp as $skill) {
                    $res['items'][] = array(
                        'id_skill' => $skill['id_skill'],
                        'label' => ucwords($skill['label'])
                    );
                }
            }else{
                $res['items'] = array();
            }
            $this->set(array("json" => json_encode($res)));
            $this->render("json");
        }
    }
    public function candidateUsername($query = null,$strict = 0){
        if($query){
            if($strict == 0){
                $where = '"username" LIKE \'%'.htmlentities(strtolower($query)).'%\'';
            }else{
                $where = '"username" = \''.htmlentities(strtolower($query)).'\'';
            }
            $tmp = $this->Candidate->readAll($where);
            if($tmp) {
                foreach ($tmp as $user) {
                    $res['items'][] = $user['username'];
                }
            }else{
                $res['items'] = array();
            }
            $this->set(array("json" => json_encode($res)));
            $this->render("json");
        }
    }
    public function candidate($id = null){
        if($id){
            if($this->Candidate->read($id)) {
                if($_POST['firstname'] && $_POST['lastname'] && $_POST['email'] && $_POST['address'] && $_POST['city'] && $_POST['postalcode']){
                    $this->Candidate->postToObj();
                    $this->Candidate->update();
                }

                $tmp = $this->Candidate->getAll();
                unset($tmp['password']);
            }else{
                $res = array();
            }
            $this->set(array("json" => json_encode($tmp)));
            $this->render("json");
        }
    }
    public function experience($id = null){
        if($id){
            if($_POST['label'] && id == $_SESSION['id_candidate']){
                $this->Experience->setLabel($_POST['label']);
                $this->Experience->setCandidate($id);
                $this->Experience->create();
            }
            if($tmp = $this->Experience->readAll("candidate = ".$id)) {
                $res = $tmp;
            }else{
                $res = array();
            }
            $this->set(array("json" => json_encode($tmp)));
            $this->render("json");
        }
    }
    public function experienceById($id = null,$param = null){
        if($id){
            if($param){
                if ($this->Experience->read($id) && $this->Experience->getCandidate() == $_SESSION['id_candidate']) {
                    $this->Experience->delete($id);
                    $res = true;
                }else{
                    $res = false;
                }
            }else {
                if ($this->Experience->read($id) && $this->Experience->getCandidate() == $_SESSION['id_candidate']) {
                    if ($_POST['label']) {
                        $this->Experience->setLabel($_POST['label']);
                        $this->Experience->update();
                    }
                    $res = $this->Experience->getAll();
                } else {
                    $res = array();

                }
            }
            $this->set(array("json" => json_encode($res)));
            $this->render("json");
        }
    }
    public function getExperiences(){
        if($_SESSION['id_candidate'] && $this->Candidate->read($_SESSION['id_candidate'])){
            if($tmp = $this->Experience->readAll("candidate = ".$_SESSION['id_candidate'])) {
            foreach($tmp as $experience){

                ?>

                <span class="fields">
                        <span class="twelve wide field" id="exp<?php echo $experience['id_experience'];?>">
                            <?php echo $experience['label'];?>
                        </span>
                        <button  data-id="<?php echo $experience['id_experience'];?>" class="two wide field edit-exp ui icon button" tabindex="0">
                            <i id="exp-icon1-<?php echo $experience['id_experience'];?>" class="edit icon"></i>
                        </button >
                        <button  data-id="<?php echo $experience['id_experience'];?>" class="two wide field cancel-exp ui icon button" tabindex="0">
                            <i id="exp-icon2-<?php echo $experience['id_experience'];?>" class="trash icon"></i>
                        </button>
                    </span>
                <div class="ui divider"></div>
                <?php
            }
            }
        }
    }
    public function getUserInfo(){
        if($_SESSION['id_candidate'] && $this->Candidate->read($_SESSION['id_candidate'])){
            $user = $this->Candidate->getAll();
            ?>
            Nom d'utilisateur : <span id="username"><?php echo $user['username'];?></span>
            <div class="ui divider"></div>
            Nom : <span id="lastname"><?php echo $user['lastname'];?></span>
            <div class="ui divider"></div>
            Prenom : <span id="firstname"><?php echo $user['firstname'];?></span>
            <div class="ui divider"></div>
            Adresse mail : <span id="email"><?php echo $user['email'];?></span>
            <div class="ui divider"></div>
            Adresse : <span id="address"><?php echo $user['address'];?></span>
            <div class="ui divider"></div>
            Ville : <span id="city"><?php echo $user['city'];?></span>
            <div class="ui divider"></div>
            Code postal : <span id="postalcode"><?php echo $user['postalcode'];?></span>
<?php
        }
    }
}
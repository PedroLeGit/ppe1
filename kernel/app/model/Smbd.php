<?php
/**
 * Created by PhpStorm.
 * User: pplaud
 * Date: 18/01/2018
 * Time: 11:39
 */

class Smbd extends Model
{
    protected $id_sm;
    protected $username;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $address;
    protected $city;
    protected $postalcode;
    protected $password;
    protected $created;
    protected $updated;

    public function __construct(){
        parent::__construct("sm","id_sm");
        $this->id_sm = null;
        $this->username = "";
        $this->firstname = "";
        $this->lastname = "";
        $this->email = "";
        $this->address = "";
        $this->city = "";
        $this->postalcode = "";
        $this->password = "";
        $this->created = "";
        $this->updated = "";
    }



    /**
     * @return null
     */
    public function getIdSm()
    {
        return $this->id_sm;
    }
    /**
     * @param null $id_sm
     */
    public function setIdSm($id_sm)
    {
        $this->id_sm = $id_sm;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }


    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }
    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }
    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }
    /**
     * @param string $postalcode
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}
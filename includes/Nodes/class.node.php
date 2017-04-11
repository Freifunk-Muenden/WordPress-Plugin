<?php

/**
 * @author Kristian Stöckel <kristian@freifunk-muenden.de>
 */
class FF_Node {

    private $name;
    private $id;
    //Location
    private $position_long;
    private $position_lat;
    //Status
    private $clients;
    private $isOnline;
    private $lastContact;

    public function __construct($json) {
        $this->name = $json->name;
        $this->id = $json->id;
        $this->position_long = $json->position->long;
        $this->position_lat = $json->position->lat;
        $this->clients = (int) $json->status->clients;
        $this->isOnline = (boolean) $json->status->online;
        $this->lastContact = strtotime($json->status->lastcontact);
    }

    /**
     * @return string
     */
    public function getHostname() {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getID() {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getPositionLong() {
        return $this->position_long;
    }

    /**
     * @return float
     */
    public function getPositionLat() {
        return $this->position_long;
    }

    /**
     * @return int
     */
    public function getClientCount() {
        return $this->clients;
    }

    /**
     * @return boolean
     */
    public function isOnline() {
        return $this->isOnline;
    }

    /**
     * @return long
     */
    public function getLastContact() {
        return $this->lastContact;
    }

}

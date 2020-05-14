<?php

namespace Model\Misc;

use Database\ConnectDb;

class State {

  protected $id;

  /**
   * State constructor.
   */
  public function __construct() {
    // Connecting to database.
    $connection = new ConnectDb();
    $this->db = $connection->connectToDatabase();
    $this->id = '';
  }

  public function setStateId($id) {
    $this->id = $id;

    return $this;
  }

  public function getStateId() {
    return $this;
  }

  public function listStates() {
    $output = [];
    $query = "SELECT * from states";
    try {
      $result = $this->db->query($query);
    } catch (\Exception $e) {
      return $e->getMessage();
    }
    if ($result->num_rows > 0) {
      while ($rows = $result->fetch_assoc()) {
        $output[] = $rows;
      }
    }

    return $output;
  }

  public function listCitiesByStates() {
    $output = [];
    $query = "SELECT * from city WHERE state_id = {$this->id}";
    try {
      $result = $this->db->query($query);
    } catch (\Exception $e) {
      return $e->getMessage();
    }
    if ($result->num_rows > 0) {
      while ($rows = $result->fetch_assoc()) {
        $output[] = $rows;
      }
    }

    return $output;
  }

}
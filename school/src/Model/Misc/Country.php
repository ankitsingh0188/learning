<?php

namespace Model\Misc;

use Model\Database\ConnectDb;
class Country {

  protected $id;

  /**
   * Misc constructor.
   */
  public function __construct() {
    // Connecting to database.
    $this->db = ConnectDb::getInstance()->connectToDatabase();
    $this->id = '';
  }

  public function setCountryId($id) {
    $this->id = $id;

    return $this;
  }

  public function getCountryId() {
    return $this;
  }

  public function listCountries() {
    $output = [];
    $query = "SELECT * from country";
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

  public function listStatesByCountry() {
    $output = [];
    $query = "SELECT * from states WHERE country_id = {$this->id}";
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
<?php
  class DonorTransaction {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function addDonorTransaction($data) {
      // Prepare Query
      $this->db->query('INSERT INTO donortransaction (id, donor_id, fullname, amount, currency, status) VALUES(:id, :donor_id, :fullname, :amount, :currency, :status)');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':donor_id', $data['donor_id']);
      $this->db->bind(':fullname', $data['fullname']);
      $this->db->bind(':amount', $data['amount']);
      $this->db->bind(':currency', $data['currency']);
      $this->db->bind(':status', $data['status']);

      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    public function getDonorTransaction() {
      $this->db->query('SELECT * FROM donortransaction ORDER BY created_at DESC');

      $results = $this->db->resultset();

      return $results;
    }
  }
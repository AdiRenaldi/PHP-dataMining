<?php
class TambahModel extends Database
{
   private $db;
   public function __construct()
   {
      $this->db = new Database();
   }

   public function tambah($ns1, $ns2, $ns3, $ns4, $ns5, $ns6, $ns7, $ns8, $kata_baku)
   {
      $query = "INSERT INTO normalisasi(ns1, ns2, ns3, ns4, ns5, ns6, ns7, ns8, kata_baku)
         VALUES(:ns1, :ns2, :ns3, :ns4, :ns5, :ns6, :ns7, :ns8, :kata_baku)";
      $this->db->query($query);
      $this->db->bind('ns1', $ns1);
      $this->db->bind('ns2', $ns2);
      $this->db->bind('ns3', $ns3);
      $this->db->bind('ns4', $ns4);
      $this->db->bind('ns5', $ns5);
      $this->db->bind('ns6', $ns6);
      $this->db->bind('ns7', $ns7);
      $this->db->bind('ns8', $ns8);
      $this->db->bind('kata_baku', $kata_baku);

      $this->db->execute();

      return $this->db->rowCount();
   }
}   
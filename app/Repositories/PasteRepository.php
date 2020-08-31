<?php
 namespace App\Repositories;

 use App\Models\Paste;

 class PasteRepository {

     /**
      * @param string $link
      * @return Paste
      */
     public function getPasteByLink(string $link) {
         return Paste::where('link', $link);
     }

     public function getLastPublicPastes() {
         return Paste::public()
             ->orderBy('id', 'desc')
             ->take(10)
             ->get();
     }
 }
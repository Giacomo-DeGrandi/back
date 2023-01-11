<?php

function card($produits,$test): string {
    $html='';
    foreach($produits as $produit){

        $html .= '<div class="card p-3 shadow mb-2 mt-2 p-3" style="width: 18rem;">';
        $html .= '  <div class="card-body p-2">';
        $html .= '    <img src="'.$produit['img_url'].'" class="card-img-top" alt="imgtop">' ;
        $html .= '    <h5 class="card-title p-1">' . $produit['titre'] . '</h5>';
        $html .= '    <p class="card-text p-1">' . $produit['description'] . '</p>';
        $html .= '    <p class="card-text p-1">prix: €' . $produit['prix']. '</p>';
        $html .= '    <p class="card-text p-1">date: ' . $produit['date']. '</p>';
        if($test){
            $html .= '    <a class="btn small text-danger" href="modifier.php?effacer='. $produit['id'].'"> effacer</a>';
            $html .= '    <a class="btn small text-warning" href="modifier.php?modifier='. $produit['id'].'"> modifier </a>';
        }
        $html .= '  </div>';
        $html .= '</div>';
    }
    return $html ;

}
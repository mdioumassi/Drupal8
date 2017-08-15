<?php

namespace Drupal\barago;

use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

class ProduitListBuilder extends EntityListBuilder {
    public function buildHeader() {
        $header['image'] = t('Photo');
        $header['nom'] = t('Nom produit');
        $header['prix'] = t('Prix produit');
        $header['categorie'] = t('Categorie');
        
        return $header + parent::buildHeader();
    }
    
    public function buildRow(EntityInterface $entity) {
        $row['image'] = $entity->image->value;
        $row['nom'] = $entity->nom->value;
        $row['prix'] = $entity->prix->value;
        $row['categorie'] = $entity->categorie->value;
  
        
        return $row + parent::buildRow($entity);
    }
}

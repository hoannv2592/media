<?php
// src/Model/Table/FilesTable.php

namespace App\Model\Table;

use Cake\ORM\Table;

class FilesTable extends Table
{
    public function initialize(array $config){
        $this->addBehavior('Timestamp');
    }
}
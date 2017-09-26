<?php
// src/Model/Table/FilesTable.php

namespace App\Model\Table;

use Cake\ORM\Table;

class FileAttachmentsTable extends Table
{
    public function initialize(array $config){
        $this->addBehavior('Timestamp');
    }
}